<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sdb_seguros".
 *
 * @property int $id
 * @property string $razon
 * @property int $codigo
 *
 * @property GvPolizas[] $gvPolizas
 */
class SdbSeguros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sdb_seguros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'required'],
            [['codigo'], 'default', 'value' => null],
            [['codigo'], 'integer'],
            [['razon'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'razon' => 'Razon',
            'codigo' => 'Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGvPolizas()
    {
        return $this->hasMany(GvPolizas::className(), ['id_aseguradora' => 'id']);
    }
}
