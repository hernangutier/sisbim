<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "archivo_doc_tipos".
 *
 * @property int $id
 * @property string $descripcion
 */
class ArchivoDocTipos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo_doc_tipos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }
}
