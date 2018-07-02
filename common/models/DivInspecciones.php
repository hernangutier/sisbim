<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "div_inspecciones".
 *
 * @property int $id
 * @property string $ncontrol
 * @property string $descripcion
 * @property string $f_ini
 * @property string $f_fin
 * @property string $date_creation
 * @property int $status 0: abierta 1: cerrada 2: anulada
 * @property int $id_user
 * @property string $sitio
 * @property string $ubicacion
 *
 * @property UserBm $user
 * @property DivSemovientes[] $divSemovientes
 */
class DivInspecciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'div_inspecciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion','sitio','ubicacion'], 'required'],
            [['f_ini', 'f_fin','date_creation'], 'safe'],
            [['status', 'id_user'], 'default', 'value' => null],
            [['status', 'id_user'], 'integer'],
            [['ncontrol'], 'string', 'max' => 10],
            [['descripcion','ubicacion'], 'string', 'max' => 400],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserBm::className(), 'targetAttribute' => ['id_user' => 'id_bm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ncontrol' => 'Referencia',
            'descripcion' => 'Motivo de la Inspección',
            'sitio'=>'Sitio de Inspección',
            'ubicación'=>'Direccion o Ubicación',
            'f_ini' => 'Fecha de Inicio',
            'f_fin' => 'Fecha de Cierre',
            'date_creation' => 'Creado el',
            'status' => 'Estatus',
            'ubicacion'=>'Dirección o Ubicacion Geografica',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivSemovientes()
    {
        return $this->hasMany(DivSemovientes::className(), ['id_insp' => 'id']);
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
