<?php

namespace common\models;

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
 * @property string $tipo_descripcion
 *
 * @property Archivo $archivo
 * @property ArchivoDocTipos $tipo0
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
            [['tipo'], 'required'],
            [['monto'], 'default', 'value' => 0],
            [['tipo', 'ano_ejecucion', 'id_archivo'], 'integer'],
            [['ano_ejecucion'], 'required'],
            [['monto'], 'number'],
            [['datos_registro'], 'string', 'max' => 400],
            [['tipo_descripcion'], 'string', 'max' => 200],
            [['id_archivo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['id_archivo' => 'id']],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => ArchivoDocTipos::className(), 'targetAttribute' => ['tipo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo de Documento',
            'ano_ejecucion' => 'Año  de Ejecución',
            'monto' => 'Monto',
            'datos_registro' => 'Datos Registro o Identificacion del Documento',
            'id_archivo' => 'Id Archivo',
            'tipo_descripcion' => 'Tipo Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivo()
    {
        return $this->hasOne(Archivo::className(), ['id' => 'id_archivo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(ArchivoDocTipos::className(), ['id' => 'tipo']);
    }
}
