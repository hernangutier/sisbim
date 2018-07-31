<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sa_ordenes_salida".
 *
 * @property int $id
 * @property int $motivo 0: SALIDA A TALLER  O SERVICIO TECNICO ESPECIALIZADO  1: ACTIVIDAD INSTITUSIONAL 2: PRESTAMO TEMPORAL DEL BIEN 3: OTRO MOTIVO
 * @property int $id_resp
 * @property string $motivo_descripcion
 * @property string $date_creation
 * @property int $status 0: PENDIENTE 1: PROCESADA
 * @property int $id_user
 * @property int $max_dias
 * @property string $ncontrol
 *
 * @property SaOrdenesSalidaDt[] $saOrdenesSalidaDts
 */
class SaOrdenesSalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_ordenes_salida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motivo', 'id_resp', 'status', 'id_user', 'max_dias'], 'default', 'value' => null],
            [['motivo', 'id_resp', 'status', 'id_user', 'max_dias'], 'integer'],
            [['date_creation'], 'safe'],
            [['motivo_descripcion','id_resp'], 'required'],
            [['motivo_descripcion'], 'string', 'max' => 400],
            [['ncontrol'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'motivo' => 'Motivo',
            'id_resp' => 'Id Resp',
            'motivo_descripcion' => 'Motivo Descripcion',
            'date_creation' => 'Date Creation',
            'status' => 'Status',
            'id_user' => 'Id User',
            'max_dias' => 'Max Dias',
            'ncontrol' => 'Ncontrol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaOrdenesSalidaDts()
    {
        return $this->hasMany(SaOrdenesSalidaDt::className(), ['id_os' => 'id']);
    }


    public static function getListMotivos(){
      return [
            '0'=>'SALIDA A TALLER  O SERVICIO TECNICO ESPECIALIZADO',
            '1'=>'ACTIVIDAD INSTITUSIONAL',
            '2'=>'PRESTAMO TEMPORAL DEL BIEN',
            '3'=>'OTRO MOTIVO',


        ];
    }

    public static function getItemsMotivo(){

            if ($this->motivo=='0') { return 'SALIDA A TALLER  O SERVICIO TECNICO ESPECIALIZADO'; };
            if ($this->motivo=='1') { return 'ACTIVIDAD INSTITUSIONAL'; };
            if ($this->motivo=='2') { return 'PRESTAMO TEMPORAL DEL BIEN'; };
            if ($this->motivo=='3') { return 'OTRO MOTIVO'; };
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
