<?php

namespace common\models;


use Yii;
use common\models\SdbMunicipios;
use common\models\UserBm;

/**
 * This is the model class for table "archivo".
 *
 * @property int $id
 * @property int $tipo_inmueble
 * @property string $identificacion
 * @property string $ubicacion
 * @property string $nexp
 * @property int $id_user
 * @property int $id_mun
 * @property boolean $is_register
 *
 * @property int $ano_in
 * @property string $new_nexp
 * @property int $id_ubic
 * @property SdbMunicipios $mun
 * @property UserBm $user
 * @property ArchivoDocumentos[] $archivoDocumentos
 * @property ArchivoUbicaciones $ubic
 */
class Archivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * {@inheritdoc}
     */
     public function rules()
     {
         return [
             [['tipo_inmueble', 'identificacion', 'ubicacion', 'nexp', 'id_mun','ano_in'], 'required'],
             [['tipo_inmueble', 'id_user', 'id_mun'], 'default', 'value' => null],
             [['tipo_inmueble', 'id_user', 'id_mun','id_ubic','ano_in'], 'integer'],
             [['is_register'], 'boolean'],
             [['identificacion', 'ubicacion'], 'string', 'max' => 400],
             [['nexp'], 'string', 'max' => 10],
             [['id_mun'], 'exist', 'skipOnError' => true, 'targetClass' => SdbMunicipios::className(), 'targetAttribute' => ['id_mun' => 'id']],
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
            'tipo_inmueble' => 'Tipo de Inmueble',
            'identificacion' => 'Identificacion',
            'ubicacion' => 'Ubicacion',
            'nexp' => 'N° de Expediente',
            'id_user' => 'Id User',
            'id_mun' => 'Municipio',
            'is_register' => 'Registrado',
            'id_ubic'=>'Ubicacion Fisica el Archivo',
            'ano_in'=>'Año de Incorporacion'
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
    public function getArchivoDocumentos()
    {
        return $this->hasMany(ArchivoDocumentos::className(), ['id_archivo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMun()
    {
        return $this->hasOne(SdbMunicipios::className(), ['id' => 'id_mun']);
    }

    public function getUbic()
   {
       return $this->hasOne(ArchivoUbicaciones::className(), ['id' => 'id_ubic']);
   }

    public function getListTipo()
    {
      return [
          '1'=>'Edificios para Oficina',
          '2'=>'Edificios, terrenos e instalaciones para establecimientos culturales',
          '3'=>'Edificios, terrenos e instalaciones para fines asistenciales y de protección social',
          '4'=>'Edificios, terrenos e instalaciones para obras públicas',
          '5'=>'Edificios, terrenos e instalaciones para fines agropecuarios',
          '6'=>'Edificios, terrenos e instalaciones para fines industriales y de explotaciones varias',
          '7'=>'Edificios, terrenos e instalaciones para cárceles, reformatocios y similares',
          '8'=>'Edificios, terrenos, plantas, instalaciones, anexidades, redes de acueducto público y obras hidráulicas ',
          '9'=>'Edificios, terrenos e instalaciones para obras públicas',
          '10'=>'Edificios, terrenos, estructuras, instalaciones y redes de plantas electricas de servicio público',
          '11'=>'Edificios, terrenos, estructuras, instalaciones y redes telefonicas y de telecomunicaciones en general',
          '12'=>'Edificios, terrenos, estructuras, instalaciones de otros servicios públicos',
          '13'=>'Edificios, terrenos, e instalaciones portuarias ',
          '14'=>'Edificios, terrenos, e instalaciones de aerodromos y aeropuertos',
          '15'=>'Construcciones y estructuras de ferrocarril',
          '16'=>'Edificios para alojamiento, hoteles y otros fines similares',
          '17'=>'Edificios, terrenos e instalaciones para uso de la policia',
          '18'=>'Construcciones en proceso',
          '19'=>'Predios Urbanos',
          '20'=>'Terrenos rurales',
          '21'=>'Minas',
      ];
    }


    public function getIsRegister(){
      if ($this->is_register){
        return '<span class="badge badge-success"><b>Si</b></span>';
      } else {
        return '<span class="badge badge-danger">No</span>';
      }



    }

    public function getTipo(){
      if ($this->tipo_inmueble==1) {
        return 'Edificios para Oficina';
      }
      if ($this->tipo_inmueble==2) {
        return 'Edificios, terrenos e instalaciones para establecimientos culturales';
      }
      if ($this->tipo_inmueble==3) {
          return 'Edificios, terrenos e instalaciones para fines asistenciales y de protección social';
      }
      if ($this->tipo_inmueble==4) {
        return 'Edificios, terrenos e instalaciones para obras públicas';
      }
      if ($this->tipo_inmueble==5) {
        return 'Edificios, terrenos e instalaciones para fines agropecuarios';
      }
      if ($this->tipo_inmueble==6) {
        return 'Edificios, terrenos e instalaciones para fines industriales y de explotaciones varias';
      }
      if ($this->tipo_inmueble==7) {
        return 'Edificios, terrenos e instalaciones para cárceles, reformatocios y similares';
      }
      if ($this->tipo_inmueble==8) {
        return 'Edificios, terrenos, plantas, instalaciones, anexidades, redes de acueducto público y obras hidráulicas ';
      }
      if ($this->tipo_inmueble==9) {
        return 'Edificios, terrenos e instalaciones para obras públicas';
      }
      if ($this->tipo_inmueble==10) {
        return 'Edificios, terrenos, estructuras, instalaciones y redes de plantas electricas de servicio público';
      }
      if ($this->tipo_inmueble==11) {
        return 'Edificios, terrenos, estructuras, instalaciones y redes telefonicas y de telecomunicaciones en general';
      }
      if ($this->tipo_inmueble==12) {
        return 'Edificios, terrenos, estructuras, instalaciones de otros servicios públicos';
      }
      if ($this->tipo_inmueble==13) {
        return 'Edificios, terrenos, e instalaciones portuarias ';
      }
      if ($this->tipo_inmueble==14) {
        return 'Edificios, terrenos, e instalaciones de aerodromos y aeropuertos';
      }
      if ($this->tipo_inmueble==15) {
        return 'Construcciones y estructuras de ferrocarril';
      }
      if ($this->tipo_inmueble==16) {
        return 'Edificios para alojamiento, hoteles y otros fines similares';
      }
      if ($this->tipo_inmueble==17) {
        return 'Edificios, terrenos e instalaciones para uso de la policia';
      }
      if ($this->tipo_inmueble==18) {
        return 'Construcciones en proceso';
      }
      if ($this->tipo_inmueble==19) {
        return 'Predios Urbanos';
      }
      if ($this->tipo_inmueble==20) {
        return 'Terrenos rurales';
      }
      if ($this->tipo_inmueble==21) {
        return 'Minas';
      }
    }

}
