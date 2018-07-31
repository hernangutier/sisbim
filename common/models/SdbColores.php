<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sdb_colores".
 *
 * @property int $id
 * @property int $codigo
 * @property string $descripcion
 *
 * @property Bienes[] $bienes
 */
class SdbColores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdb_colores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo'], 'default', 'value' => null],
            [['codigo'], 'integer'],
            [['descripcion'], 'string'],
            [['codigo'], 'unique'],
            [['descripcion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['id_color' => 'id']);
    }
}
