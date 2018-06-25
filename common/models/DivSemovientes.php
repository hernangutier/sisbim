<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "div_semovientes".
 *
 * @property int $id
 * @property int $id_insp
 * @property string $nbov
 * @property int $categoria
 * @property string $sexo 'H' o 'M'
 * @property bool $is_herrado
 * @property string $observaciones
 *
 * @property DivInspecciones $insp
 */
class DivSemovientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'div_semovientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_insp', 'categoria'], 'default', 'value' => null],
            [['id_insp', 'categoria'], 'integer'],
            [['nbov'], 'required'],
            [['sexo'], 'string'],
            [['is_herrado'], 'boolean'],
            [['nbov'], 'string', 'max' => 10],
            [['observaciones'], 'string', 'max' => 400],
            [['id_insp'], 'exist', 'skipOnError' => true, 'targetClass' => DivInspecciones::className(), 'targetAttribute' => ['id_insp' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_insp' => 'Id Insp',
            'nbov' => 'N° de Bovino',
            'categoria' => 'Categoria',
            'sexo' => 'Sexo',
            'is_herrado' => 'Esta Herrado',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsp()
    {
        return $this->hasOne(DivInspecciones::className(), ['id' => 'id_insp']);
    }
}
