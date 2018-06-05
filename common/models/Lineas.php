<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lineas}}".
 *
 * @property string $descripcion
 * @property string $ref
 * @property integer $id
 */
class Lineas extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lineas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref','descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 80],
            [['ref'], 'string', 'max' => 20],
            [['ref'], 'unique'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => 'Descripción',
            'ref' => 'Referencia',
            'id' => 'Id',
        ];
    }
}
