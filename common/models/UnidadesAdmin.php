<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%unidades_admin}}".
 *
 * @property string $descripcion
 * @property integer $id_resp
 * @property string $ubicacion
 * @property string $telefono
 * @property string $codigo
 * @property integer $default_active
 * @property integer $categoria
 * @property integer $disponible_inc
 * @property integer $id
 * @property integer $id_sede
 * @property string $email
 * @property SdbCatUnidadesAdmin $categoria0
 * @property SdbSedes $idsede
 * @property string $tel_ext
 * @property Responsables $idresp
 * @property string $nomenclatura
 */
class UnidadesAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%unidades_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'ubicacion',  'disponible_inc', 'id_sede','categoria','codigo','nomenclatura'], 'required'],
            [['id_resp', 'default_active', 'categoria', 'disponible_inc', 'id_sede'], 'integer'],
            [['descripcion', 'ubicacion'], 'string', 'max' => 150],
            [['telefono'], 'string', 'max' => 70],
            [['codigo'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['tel_ext'], 'string', 'max' => 10],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => 'Descripción',
            'id_resp' => 'Encargado o Responsable Administrativo',
            'ubicacion' => 'Ubicación',
            'telefono' => 'Telefono',
            'codigo' => 'Código',
            'default_active' => 'Ubicacion por Defecto',
            'categoria' => 'Categoria (SUDEBIP)',
            'disponible_inc' => 'Funciona como Ubicacion de Entrada',
            'id' => 'Id',
            'id_sede' => 'Sede de Adscripción',
            'email'=>'e-mail',
            'tel_ext' => 'Extención Telefonica',
            'nomenclatura'=>'Abreviación de la Unidad'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(SdbCatUnidadesAdmin::className(), ['id' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsede()
    {
        return $this->hasOne(SdbSedes::className(), ['id' => 'id_sede']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsables::className(), ['id_unidad' => 'id']);
    }



     public function getIdresp()
    {
        return $this->hasOne(Responsables::className(), ['id' => 'id_resp']);
    }

    public function getAplicaInputHtml(){
      if ($this->disponible_inc==0){
        return '<span class="label label-danger arrowed">NO</span>';
      } else {
        return '<span class="label label-success arrowed-in arrowed-in-right">SI</span>';
      }
    }

}
