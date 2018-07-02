<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bm3".
 *
 * @property int $id
 * @property int $id_bien
 * @property int $id_bm3
 * @property string $date_caducidad
 * @property bool $active
 * @property string $date_in
 * @property string $observaciones
 *
 * @property Bienes $bien
 */
class Bm3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bm3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bien', 'id_bm3'], 'default', 'value' => null],
            [['id_bien', 'id_bm3'], 'integer'],
            [['date_caducidad', 'date_in'], 'safe'],
            [['active'], 'boolean'],
            [['observaciones'], 'string', 'max' => 400],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bien' => 'Id Bien',
            'id_bm3' => 'Id Bm3',
            'date_caducidad' => 'Date Caducidad',
            'active' => 'Active',
            'date_in' => 'Date In',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBien()
    {
        return $this->hasOne(Bienes::className(), ['id' => 'id_bien']);
    }
}
