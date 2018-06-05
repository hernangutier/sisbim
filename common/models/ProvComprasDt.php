<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_compras_dt".
 *
 * @property integer $id
 * @property integer $id_art
 * @property integer $cnt
 * @property integer $cnt_pedida
 * @property boolean $is_mayor
 * @property integer $id_compra
 *
 * @property ProvArticulos $idArt
 * @property ProvCompras $idCompra
 */
class ProvComprasDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_compras_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_art', 'cnt','cnt_pedida'], 'integer'],
            [['cnt','cnt_pedida','id_art'], 'required'],
            [['is_mayor'], 'boolean'],
            [['id_art'], 'exist', 'skipOnError' => true, 'targetClass' => ProvArticulos::className(), 'targetAttribute' => ['id_art' => 'id']],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => ProvCompras::className(), 'targetAttribute' => ['id_compra' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_art' => 'Id Art',
            'cnt' => 'Cantidad Recibida',
            'cnt_pedida' => 'Cantidad Pedida',
            'is_mayor' => 'Is Mayor',
            'id_compra' => 'Id Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArt()
    {
        return $this->hasOne(ProvArticulos::className(), ['id' => 'id_art']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompra()
    {
        return $this->hasOne(ProvCompras::className(), ['id' => 'id_compra']);
    }
}
