<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_art_lineas".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property ProvArticulos[] $provArticulos
 */
class ProvArtLineas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_art_lineas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvArticulos()
    {
        return $this->hasMany(ProvArticulos::className(), ['id_lin' => 'id']);
    }
}
