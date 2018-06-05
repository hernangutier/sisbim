<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "periodos_supra".
 *
 * @property int $id
 * @property int $ano
 * @property bool $active
 */
class PeriodosSupra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos_supra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ano'], 'default', 'value' => null],
            [['ano'], 'integer'],
            [['active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ano' => 'Ano',
            'active' => 'Active',
        ];
    }


    public function getPeriodo(){
      return PeriodosSupra::findOne(['active'=>true]);
    }
}
