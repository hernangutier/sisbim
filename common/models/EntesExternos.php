<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entes_externos".
 *
 * @property int $id
 * @property string $rif
 * @property string $razon
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $email
 */
class EntesExternos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entes_externos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rif', 'razon'], 'required'],
            [['rif'], 'string', 'max' => 20],
            [['razon'], 'string', 'max' => 200],
            [['direccion'], 'string', 'max' => 400],
            [['telefono', 'fax'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 150],
            [['rif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rif' => 'Rif',
            'razon' => 'Razon',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'fax' => 'Fax',
            'email' => 'Email',
        ];
    }
}
