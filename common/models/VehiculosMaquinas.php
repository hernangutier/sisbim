<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehiculos_maquinas".
 *
 * @property int $id
 * @property string $serialcarroceria
 * @property string $seralmotor
 * @property string $placa
 * @property string $color
 * @property int $tipo 0: Automovi 1: Camioneta 2: Maquinaria 3: Moto
 * @property int $tipocarroceria 0-> COUPE 1-> HATCHBACK 2-> PICK UP 3-> SAV 4-> SEDAN 5-> SUV 6-> VAN
 * @property string $modelo
 * @property int $ano
 * @property int $combustible 0-> 91 OCTANOS 2-> 95 OCTANOS 3-> DIESEL (GAS-OIL) 4-> GAS 5-> HIBRIDO
 * @property int $tipo_sudebip 1:  Vehículos de transporte terrestre 2: Vehículos de transporte marítimo 3: Vehículos de transporte aéreo 4: Otra clase
 *
 * @property Bienes[] $bienes
 */
class VehiculosMaquinas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculos_maquinas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'serialcarroceria', 'seralmotor', 'placa', 'tipo'], 'required'],
            [['id', 'tipo', 'tipocarroceria', 'ano', 'combustible','tipo_sudebip'], 'default', 'value' => null],
            [['id', 'tipo', 'tipocarroceria', 'ano', 'combustible','tipo_sudebip'], 'integer'],
            [['serialcarroceria', 'seralmotor', 'modelo'], 'string', 'max' => 80],
            [['placa', 'color'], 'string', 'max' => 20],
            [['serialcarroceria'], 'unique'],
            [['seralmotor'], 'unique'],
            [['placa'], 'unique'],
            [['id'], 'unique'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serialcarroceria' => 'Serialcarroceria',
            'seralmotor' => 'Seralmotor',
            'placa' => 'Placa',
            'color' => 'Color',
            'tipo' => 'Tipo',
            'tipocarroceria' => 'Tipocarroceria',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'combustible' => 'Combustible',
            'tipo_sudebip'=>'Tipo Ségun la SUDEBIP',
        ];
    }


    public function getHelperTipo(){
      if ($this->tipo=0){
        return "Automovil";
      }

      if ($this->tipo=1){
        return "Camioneta";
      }

      if ($this->tipo=2){
        return "Maquinaria";
      }

      if ($this->tipo=3){
        return "Moto";
      }
      return "Sin Información";

    }


    public function getHelperCombustible(){
      if ($this->combustible=0){
        return "91 OCTANOS";
      }

      if ($this->combustible=1){
        return "95 OCTANOS";
      }

      if ($this->combustible=2){
        return "DIESEL (GAS-OIL)";
      }

      if ($this->combustible=3){
        return "GAS";
      }

      if ($this->combustible=3){
        return "HIBRIDO";
      }
      return "Sin Información";
    }

    public function getHelperTipoSudebip(){
      if ($this->tipo_sudebip=1){
        return "Vehículos de transporte terrestre";
      }

      if ($this->tipo_sudebip=2){
        return "Vehículos de transporte marítimo";
      }

      if ($this->tipo_sudebip=3){
        return "Vehículos de transporte aéreo";
      }

      if ($this->tipo_sudebip=4){
        return "Otra clase";
      }

      return "Sin Información";


    }

    public function getHelperTipoCarroceria(){
      if ($this->tipocarroceria=0){
        return "COUPE";
      }
      if ($this->tipocarroceria=1){
        return "HATCHBACK";
      }
      if ($this->tipocarroceria=2){
        return "PICK UP";
      }
      if ($this->tipocarroceria=3){
        return "SAV";
      }
      if ($this->tipocarroceria=4){
        return "SEDAN";
      }
      if ($this->tipocarroceria=5){
        return "SUV";
      }
      if ($this->tipocarroceria=6){
        return "VAN";
      }
      return "Sin Información";

    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['id_vehicle' => 'id']);
    }
}
