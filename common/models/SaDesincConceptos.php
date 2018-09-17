<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sa_desinc_conceptos".
 *
 * @property int $id
 * @property int $codigo
 * @property string $descripcion
 *
 * @property SaDesincBmMaster[] $saDesincBmMasters
 */
class SaDesincConceptos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_desinc_conceptos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo'], 'default', 'value' => null],
            [['codigo'], 'integer'],
            [['codigo','descripcion'], 'required'],

            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'unique'],
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
    public function getSaDesincBmMasters()
    {
        return $this->hasMany(SaDesincBmMaster::className(), ['concepto' => 'id']);
    }
}
