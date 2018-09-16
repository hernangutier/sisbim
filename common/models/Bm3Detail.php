<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bm3_detail".
 *
 * @property int $id
 * @property int $id_bm3
 * @property int $id_bien
 * @property bool $is_recovered
 *
 * @property Bienes $bien
 * @property Bm3Master $bm3
 */
class Bm3Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bm3_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bm3', 'id_bien'], 'default', 'value' => null],
            [['id_bm3', 'id_bien'], 'integer'],
            [['is_recovered'], 'boolean'],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
            [['id_bm3'], 'exist', 'skipOnError' => true, 'targetClass' => Bm3Master::className(), 'targetAttribute' => ['id_bm3' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bm3' => 'Id Bm3',
            'id_bien' => 'Id Bien',
            'is_recovered' => 'Is Recovered',
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
        return $this->hasOne(Bm3Master::className(), ['id' => 'id_bm3']);
    }

    public function isDuplicate()
    {
      $value=Bm3Detail::find()->where(['id_bien'=>$this->id_bien])->andWhere(['id_bm3'=>$this->id_bm3])->count();
      if ($value>=1){
        return true;
      }else {
        return false;
      }
    }
}
