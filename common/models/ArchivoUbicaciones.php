<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "archivo_ubicaciones".
 *
 * @property int $id
 * @property string $referencia
 * @property string $descripcion
 *
 * @property Archivo[] $archivos
 */
class ArchivoUbicaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo_ubicaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['referencia'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
            [['referencia'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'referencia' => 'Referencia',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivo::className(), ['id_ubic' => 'id']);
    }
}
