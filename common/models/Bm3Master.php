<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bm3_master".
 *
 * @property int $id
 * @property string $date_creation
 * @property string $date_close
 * @property string $date_ini
 * @property int $id_periodo
 * @property int $id_user
 * @property string $observaciones
 * @property int $ncontrol
 * @property integer $status
 *
 * @property Bm3Detail[] $bm3Details
 * @property Periodos $periodo
 * @property UserBm $user
 */
class Bm3Master extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bm3_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_creation', 'date_close', 'date_ini'], 'safe'],
            [['id_periodo', 'id_user', 'ncontrol'], 'default', 'value' => null],
            [['id_periodo', 'id_user', 'ncontrol','status'], 'integer'],
            [['observaciones'], 'string', 'max' => 400],
            [['id_periodo'], 'unique'],
            [['observaciones','date_ini'], 'required'],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['id_periodo' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserBm::className(), 'targetAttribute' => ['id_user' => 'id_bm']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_creation' => 'Date Creation',
            'date_close' => 'Fecha de Cierre',
            'date_ini' => 'Fecha',
            'id_periodo' => 'Periodo de Inventario',
            'id_user' => 'Id User',
            'observaciones' => 'Observaciones',
            'ncontrol' => 'N° de Comprobante',
            'status' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBm3Details()
    {
        return $this->hasMany(Bm3Detail::className(), ['id_bm3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo()
    {
        return $this->hasOne(Periodos::className(), ['id' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }

    public function getNControlFormat()
    {
        return str_pad($this->ncontrol,10,'0',STR_PAD_LEFT);
    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="badge badge-warning"><b>Pendiente</b></span>';
      }

      if ($this->status==1){
        return '<span class="badge badge-success">Procesado</span>';
      }

      if ($this->status==2){
        return '<span class="badge badge-danger">Anulado</span>';
      }

    }




}
