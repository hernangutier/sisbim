<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_inventario_ini_dt".
 *
 * @property int $id
 * @property int $id_inv
 * @property int $id_art
 * @property int $cnt
 *
 * @property ProvArticulos $art
 * @property ProvInventarioIni $inv
 */
class ProvInventarioIniDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_inventario_ini_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inv', 'id_art', 'cnt'], 'default', 'value' => null],
            [['id_inv', 'id_art', 'cnt'], 'integer'],
            [['id_art'], 'exist', 'skipOnError' => true, 'targetClass' => ProvArticulos::className(), 'targetAttribute' => ['id_art' => 'id']],
            [['id_inv'], 'exist', 'skipOnError' => true, 'targetClass' => ProvInventarioIni::className(), 'targetAttribute' => ['id_inv' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_inv' => 'Id Inv',
            'id_art' => 'Id Art',
            'cnt' => 'Existencia',
        ];
    }




    public function validateDuplicate()
    {
      $value=ProvInventarioIniDt::find()->where(['id_art'=>$this->id_art])->count();
      if ($value>=1){
        return true;
      }else {
        return false;
      }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArt()
    {
        return $this->hasOne(ProvArticulos::className(), ['id' => 'id_art']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInv()
    {
        return $this->hasOne(ProvInventarioIni::className(), ['id' => 'id_inv']);
    }
}
