<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_articulos".
 *
 * @property integer $id
 * @property string $ref
 * @property string $descripcion
 * @property string $descripcion_detail
 * @property string $und_mayor
 * @property string $und_menor
 * @property integer $und_empaque
 * @property integer $id_lin
 * @property integer $existencias
 * @property int $tipo 0: materiales y suministros 1: Bienes de Uso
 *
 * @property ProvArtLineas $idLin
 */
class ProvArticulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_articulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref','id_lin','descripcion','und_empaque','und_mayor','und_menor','tipo'], 'required'],
            [['und_empaque', 'id_lin', 'existencias','tipo'], 'integer'],
            [['ref', 'und_mayor', 'und_menor'], 'string', 'max' => 20],
            [['descripcion', 'descripcion_detail'], 'string', 'max' => 400],
            [['ref'], 'unique'],
            [['id_lin'], 'exist', 'skipOnError' => true, 'targetClass' => ProvArtLineas::className(), 'targetAttribute' => ['id_lin' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'descripcion' => 'Descripcion',
            'descripcion_detail' => 'Descripcion Detail',
            'und_mayor' => 'Und Mayor',
            'und_menor' => 'Und Menor',
            'und_empaque' => 'Und Empaque',
            'id_lin' => 'Linea',
            'existencias' => 'Existencias',
            'tipo'=>'Tipo de Articulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLin()
    {
        return $this->hasOne(ProvArtLineas::className(), ['id' => 'id_lin']);
    }
}
