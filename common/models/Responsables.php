<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%responsables}}".
 *
 * @property string $cedrif
 * @property string $nombres
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property string $cargo
 * @property string $fregistro
 * @property integer $personal
 * @property string $alias
 * @property string $tipo
 * @property integer $id_unidad
 * @property integer $id
 * @property string $apellidos
 * @property UnidadesAdmin $codunidad0
 * @property Bienes[] $bienes
 * @property boolean $activo
 * @property boolean $is_max

 */
class Responsables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%responsables}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedrif', 'cargo','nombres','apellidos','direccion','alias'], 'required'],
            [['tipo'], 'string'],
            [['fregistro'], 'safe'],
            [['personal', 'id_unidad'], 'integer'],
            [['cedrif', 'alias'], 'string', 'max' => 20],
            [['nombres', 'direccion'], 'string', 'max' => 150],
            [['telefono', 'fax', 'email'], 'string', 'max' => 70],
            [['cargo'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 200],
            [['cedrif'], 'unique'],
            [['cedrif'], 'unique'],
            ['email', 'email'],
            [['activo','is_max'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedrif' => 'Cedula o Rif',
            'nombres' => 'Nombres',
            'direccion' => 'Dirección',
            'telefono' => 'Telefono',
            'fax' => 'Fax',
            'email' => 'e-mail',
            'cargo' => 'Cargo',
            'fregistro' => 'Fecha de Registro',
            'personal' => 'Personal',
            'alias' => 'Abreviatura de Profesión',
            'id_unidad' => 'Unidad Admin. de Adscripción',
            'id' => 'Id',
            'apellidos' => 'Apellidos',
            'tipo' => 'Tipo de Responsable',
            'activo' => 'Estatus',
            'is_max'=>'Maxima Autoridad'
        ];
    }


    public static function getListSqlActives(){
      $sql="SELECT  * from vw_users";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getActivoHtml(){

        if ($this->activo==true){
          return '<span class="label label-success arrowed-in arrowed-in-right">Habilitado</span>';
        }

        else {
          return '<span class="label label-danger arrowed">Inhabilitado</span>';
        }


    }


  /**
      * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['id_resp_directo' => 'id']);
    }

   public function getNombreCompleto(){
      return $this->nombres . '  ' . $this->apellidos;
   }

   /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodunidad0()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['id' => 'id_unidad']);
    }

    public function getTipo() {
      if ($this->tipo=='D'){
        return 'ADMINISTRATIVO';
      }

      if ($this->tipo=='U'){
        return 'DE USO DIRECTO';
      }

      if ($this->tipo=='C'){
        return 'DE CUIDO';
      }
    }

    public function getStatusHtml(){
      if ($this->activo){
        return '<span class="label label-success arrowed-in arrowed-in-right"><b>Activo</span>';

      } else {
        return '<span class="label label-danger arrowed"><b>Inhabilitado</span>';
      }


    }
}
