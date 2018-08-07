<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movimientos".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $id_und_origen
 * @property string $observaciones
 * @property integer $id_user
 * @property string $ncontrol
 * @property integer $tipo
 * @property integer $status
 * @property integer $periodo
 * @property integer $ano
 * @property string $fecha_process
 * @property string $fecha_creation
 *
 * @property Periodos $periodo0
 * @property UnidadesAdmin $idUndOrigen
 * @property MovimientosDt[] $movimientosDts
 */
class Movimientos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_und_origen'],'required'],
            [['fecha', 'fecha_process', 'fecha_creation'], 'safe'],
            [['id_und_origen', 'id_user', 'tipo', 'status', 'periodo', 'ano'], 'integer'],
            [['observaciones'], 'string'],
            [['ncontrol'], 'string', 'max' => 100],
            [['periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['periodo' => 'id']],
            [['id_und_origen'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadesAdmin::className(), 'targetAttribute' => ['id_und_origen' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'id_und_origen' => 'Origen del Inventario',

            'observaciones' => 'Observaciones',
            'id_user' => 'Usuario',
            'ncontrol' => 'N°. de Control',
            'tipo' => 'Tipo',
            'status' => 'Estatus',
            'periodo' => 'Periodo',
            'ano' => 'Ano',
            'fecha_process' => 'Fecha Process',
            'fecha_creation' => 'Fecha de Creación',
        ];
    }




    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo0()
    {
        return $this->hasOne(Periodos::className(), ['id' => 'periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUndOrigen()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['id' => 'id_und_origen']);
    }

    public function getNControlFormat()
    {
        return str_pad($this->ncontrol,10,'0',STR_PAD_LEFT);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosDts()
    {
        return $this->hasMany(MovimientosDt::className(), ['codmov' => 'id']);
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

    public static function getEstatusList(){
      $date=[
        '0'=>'Pendiente',
        '1'=>'Procesado',
        '2'=>'Anulado'

      ];
    return $data;
    }
}
