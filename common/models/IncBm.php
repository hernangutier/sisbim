<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inc_bm".
 *
 * @property int $id
 * @property string $fecha
 * @property int $periodo
 * @property int $status 0: PENDIENTE 1: PROCESADA 2: ANULADA
 * @property string $observaciones
 * @property string $ref Numero de Control de la Incorporacion
 * @property int $id_origen
 * @property int $tipo 0: COMPRAS 1: DONACION 2: COMODATO
 *
 * @property Bienes[] $bienes
 * @property IncOrigenes $origen
 */
class IncBm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inc_bm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['periodo', 'status', 'id_origen', 'tipo'], 'default', 'value' => null],
            [['periodo', 'status', 'id_origen', 'tipo'], 'integer'],
            [['ref'], 'string'],
            [['observaciones'], 'string', 'max' => 400],
            [['id_origen'], 'exist', 'skipOnError' => true, 'targetClass' => IncOrigenes::className(), 'targetAttribute' => ['id_origen' => 'id']],
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
            'periodo' => 'Periodo',
            'status' => 'Status',
            'observaciones' => 'Observaciones',
            'ref' => 'Ref',
            'id_origen' => 'Id Origen',
            'tipo' => 'Tipo de Incorporación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['id_inc' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrigen()
    {
        return $this->hasOne(IncOrigenes::className(), ['id' => 'id_origen']);
    }
}
