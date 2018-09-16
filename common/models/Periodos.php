<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "periodos".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $fini
 * @property string $fclose
 * @property boolean $status
 * @property string $saldo_bm_ini
 * @property string $saldo_bu_ini
 * @property string $saldo_in_bm
 * @property string $saldo_in_bu
 * @property string $saldo_out_bm
 *
 * @property DesincorporacionesBm[] $desincorporacionesBms
 * @property Movimientos[] $movimientos
 * @property PeriodosDt[] $periodosDts
 */
class Periodos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fini', 'fclose','descripcion'], 'required'],
            [['status'], 'boolean'],
            [['saldo_bm_ini', 'saldo_bu_ini', 'saldo_in_bm', 'saldo_in_bu'], 'number'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'descripcion' => 'Descripcion',
            'fini' => 'Fecha de Inicio',
            'fclose' => 'Fecha de Cierres',
            'status' => 'Estado',
            'saldo_bm_ini' => 'Saldo Bienes Muebles',
            'saldo_bu_ini' => 'Saldo Bienes de Uso',
            'saldo_in_bm' => 'Saldo In Bm',
            'saldo_in_bu' => 'Saldo In Bu',
            'saldo_out_bm' => 'Desincorporaciones del Mes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesBms()
    {
        return $this->hasMany(DesincorporacionesBm::className(), ['periodo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimientos::className(), ['periodo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodosDts()
    {
        return $this->hasMany(PeriodosDt::className(), ['codperiodo' => 'id']);
    }

    public static function getActivo()
    {
      $model=Periodos::find()->where(['status'=>true])->one();


              return $model;

    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="badge badge-default"><b>Cerrado</b></span>';
      }

      if ($this->status==1){
        return '<span class="badge badge-warning">En Curso</span>';
      }



    }

    public function getTotals(){
      return ($this->saldo_bm_ini+$this->saldo_in_bm-$this->saldo_out_bm);
    }

}
