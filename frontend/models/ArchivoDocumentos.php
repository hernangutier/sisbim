<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "archivo_documentos".
 *
 * @property int $id
 * @property int $tipo
 * @property int $ano_ejecucion
 * @property string $monto
 * @property string $datos_registro
 * @property int $id_archivo
 *
 * @property Archivo $archivo
 */
class ArchivoDocumentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo_documentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'ano_ejecucion', 'id_archivo'], 'default', 'value' => null],
            [['tipo', 'ano_ejecucion', 'id_archivo'], 'integer'],
            [['ano_ejecucion'], 'required'],
            [['monto'], 'number'],
            [['datos_registro'], 'string', 'max' => 400],
            [['id_archivo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['id_archivo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'ano_ejecucion' => 'Ano Ejecucion',
            'monto' => 'Monto',
            'datos_registro' => 'Datos Registro',
            'id_archivo' => 'Id Archivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivo()
    {
        return $this->hasOne(Archivo::className(), ['id' => 'id_archivo']);
    }
}
