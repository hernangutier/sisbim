<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gv_accesorios_vehiculos".
 *
 * @property int $id
 * @property int $id_veh
 * @property string $descripcion
 * @property string $serial
 * @property bool $en_uso
 *
 * @property Bienes $veh
 * @property GvRevisionPeriodicaAccesorios[] $gvRevisionPeriodicaAccesorios
 */
class GvAccesoriosVehiculos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gv_accesorios_vehiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['id_veh'], 'default', 'value' => null],
            [['id', 'id_veh'], 'integer'],
            [['en_uso'], 'boolean'],
            [['descripcion'], 'string', 'max' => 200],
            [['serial'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['id_veh'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_veh' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_veh' => 'Id Veh',
            'descripcion' => 'Descripcion',
            'serial' => 'Serial o Marca de Identificación',
            'en_uso' => 'En Uso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeh()
    {
        return $this->hasOne(Bienes::className(), ['id' => 'id_veh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGvRevisionPeriodicaAccesorios()
    {
        return $this->hasMany(GvRevisionPeriodicaAccesorios::className(), ['id_acc' => 'id']);
    }
}
