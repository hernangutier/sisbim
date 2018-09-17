<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sa_desinc_bm_detail".
 *
 * @property int $id
 * @property int $id_des
 * @property int $id_bien
 *
 * @property Bienes $bien
 * @property SaDesincBmMaster $des
 */
class SaDesincBmDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_desinc_bm_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_des', 'id_bien'], 'default', 'value' => null],
            [['id_des', 'id_bien'], 'integer'],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
            [['id_des'], 'exist', 'skipOnError' => true, 'targetClass' => SaDesincBmMaster::className(), 'targetAttribute' => ['id_des' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_des' => 'Id Des',
            'id_bien' => 'Id Bien',
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
    public function getDes()
    {
        return $this->hasOne(SaDesincBmMaster::className(), ['id' => 'id_des']);
    }

    public function isDuplicate()
    {
      $value=SaDesincBmDetail::find()->where(['id_bien'=>$this->id_bien])->andWhere(['id_des'=>$this->id_des])->count();
      if ($value>=1){
        return true;
      }else {
        return false;
      }
    }
}
