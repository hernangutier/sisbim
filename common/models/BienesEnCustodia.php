<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bienes_en_custodia".
 *
 * @property int $id
 * @property string $num_bien Numero de Bien si no tiene asignarle uno solo para control
 * @property string $descripcion
 * @property int $id_lin
 * @property int $id_class_sudebip Clasificacion Sudebip
 * @property int $status_fisico_sdb Estado Fisico Sudebip
 * @property int $status_uso_sdb Estado de Uso SUDEBIP
 * @property int $id_und_actual
 * @property int $id_resp_directo
 * @property string $date_creation
 *
 * @property Responsables $respDirecto
 * @property UnidadesAdmin $undActual
 */
class BienesEnCustodia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes_en_custodia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lin', 'id_class_sudebip', 'status_fisico_sdb', 'status_uso_sdb', 'id_und_actual', 'id_resp_directo'], 'default', 'value' => null],
            [['id_lin', 'id_class_sudebip', 'status_fisico_sdb', 'status_uso_sdb', 'id_und_actual', 'id_resp_directo'], 'integer'],
            [['date_creation'], 'safe'],
            [['num_bien'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 200],
            [['num_bien'], 'unique'],
            [['id_resp_directo'], 'exist', 'skipOnError' => true, 'targetClass' => Responsables::className(), 'targetAttribute' => ['id_resp_directo' => 'id']],
            [['id_und_actual'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadesAdmin::className(), 'targetAttribute' => ['id_und_actual' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_bien' => 'Num Bien',
            'descripcion' => 'Descripcion',
            'id_lin' => 'Id Lin',
            'id_class_sudebip' => 'Id Class Sudebip',
            'status_fisico_sdb' => 'Status Fisico Sdb',
            'status_uso_sdb' => 'Status Uso Sdb',
            'id_und_actual' => 'Id Und Actual',
            'id_resp_directo' => 'Id Resp Directo',
            'date_creation' => 'Date Creation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespDirecto()
    {
        return $this->hasOne(Responsables::className(), ['id' => 'id_resp_directo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUndActual()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['id' => 'id_und_actual']);
    }

    public function getEstadoUso(){
      if ($this->estado_uso==1){
        return 'En Uso';
      }
      if ($this->estado_uso==2){
        return 'En Comodato';
      }
      if ($this->estado_uso==3){
        return 'En Arrendamiento';
      }
      if ($this->estado_uso==4){
        return 'En Mantenimiento';
      }
      if ($this->estado_uso==5){
        return 'En Reparación';
      }
      if ($this->estado_uso==6){
        return 'En proceso de disposición';
      }
      if ($this->estado_uso==7){
        return 'En Desuso por Obsolecencia';
      }
      if ($this->estado_uso==8){
        return 'En Desuso por Inservibilidad';
      }
      if ($this->estado_uso==9){
        return 'En Desuso por Obsolecencia e Inservibilidad';
      }
      if ($this->estado_uso==10){
        return 'En Almacen o Deposito para su Asignación';
      }
      if ($this->estado_uso==11){
        return 'Otro Uso';
      }

    }

    public static function getListEstadosUso(){
      return [
            '1'=>'En Uso',
            '2'=>'En Comodato',
            '3'=>'En Arrendamiento',
            '4'=>'En Mantenimiento',
            '4'=>'En Reparación',
            '6'=>'En proceso de disposoción',
            '7'=>'En Desuso por Obsolecencia',
            '8'=>'En Desuso por Inservibilidad',
            '9'=>'En Desuso por Obsolecencia e Inservibilidad',
            '10'=>'En Almacen o Deposito para su Asignación',
            '11'=>'Otro Uso',
        ];
    }
}
