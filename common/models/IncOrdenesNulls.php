<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inc_ordenes_nulls".
 *
 * @property int $id
 * @property int $id_oc
 * @property string $fecha_nulls
 * @property string $motivo
 * @property int $id_user
 *
 * @property IncOrdenesCompras $oc
 * @property UserBm $user
 */
class IncOrdenesNulls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inc_ordenes_nulls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_oc', 'id_user'], 'default', 'value' => null],
            [['id_oc', 'id_user'], 'integer'],
            [['fecha_nulls'], 'safe'],
            [['motivo'], 'string', 'max' => 400],
            [['id_oc'], 'exist', 'skipOnError' => true, 'targetClass' => IncOrdenesCompras::className(), 'targetAttribute' => ['id_oc' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserBm::className(), 'targetAttribute' => ['id_user' => 'id_bm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_oc' => 'Orden de Compra',
            'fecha_nulls' => 'Fecha',
            'motivo' => 'Motivo',
            'id_user' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOc()
    {
        return $this->hasOne(IncOrdenesCompras::className(), ['id' => 'id_oc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }
}
