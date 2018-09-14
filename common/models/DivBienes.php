<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "div_bienes".
 *
 * @property int $id
 * @property string $ref
 * @property int $tipo 0: VEHICULO 1: MAQUINARIA 2: IMPLEMETO 3: BIEN MUEBLE COMUN
 * @property string $serial_carroceria
 * @property string $serial_motor
 * @property string $placa
 * @property string $descripcion
 * @property bool $is_operativo
 * @property string $observacion
 * @property int $id_insp
 *
 * @property DivInspecciones $insp
 */
class DivBienes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'div_bienes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'descripcion'], 'required'],
            [['tipo', 'id_insp'], 'default', 'value' => null],
            [['tipo', 'id_insp'], 'integer'],
            [['is_operativo'], 'boolean'],
            [['ref'], 'string', 'max' => 20],
            [['serial_carroceria', 'serial_motor'], 'string', 'max' => 50],
            [['placa'], 'string', 'max' => 10],
            [['descripcion', 'observacion'], 'string', 'max' => 400],
            [['id_insp'], 'exist', 'skipOnError' => true, 'targetClass' => DivInspecciones::className(), 'targetAttribute' => ['id_insp' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'N° de Bien',
            'tipo' => 'Tipo o Categoria',
            'serial_carroceria' => 'Serial de Carroceria',
            'serial_motor' => 'Serial de Motor',
            'placa' => 'Placa',
            'descripcion' => 'Descripcion',
            'is_operativo' => 'Operativo',
            'observacion' => 'Observaciones',
            'id_insp' => 'Id Insp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsp()
    {
        return $this->hasOne(DivInspecciones::className(), ['id' => 'id_insp']);
    }
}
