<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bm3_dt".
 *
 * @property int $id
 * @property int $id_bien
 * @property int $id_bm3
 * @property string $date_caducidad
 * @property bool $active
 *
 * @property Bienes $bien
 * @property Bm3 $bm3
 */
class Bm3Dt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bm3_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bien', 'id_bm3'], 'default', 'value' => null],
            [['id_bien', 'id_bm3'], 'integer'],
            [['date_caducidad'], 'safe'],
            [['active'], 'boolean'],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
            [['id_bm3'], 'exist', 'skipOnError' => true, 'targetClass' => Bm3::className(), 'targetAttribute' => ['id_bm3' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBien()
    {
        return $this->hasOne(Bienes::className(), ['id' => 'id_bien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBm3()
    {
        return $this->hasOne(Bm3::className(), ['id' => 'id_bm3']);
    }
}
