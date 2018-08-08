<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sdb_municipios".
 *
 * @property int $id
 * @property int $id_est
 * @property string $descripcion
 * @property string $codigo
 *
 * @property Archivo[] $archivos
 * @property SdbCiudades[] $sdbCiudades
 * @property SdbEstados $est
 * @property SdbParroquias[] $sdbParroquias
 * @property SdbSedes[] $sdbSedes
 */
class SdbMunicipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdb_municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_est', 'descripcion', 'codigo'], 'required'],
            [['id_est'], 'default', 'value' => null],
            [['id_est'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 20],
            [['codigo'], 'unique'],
            [['id_est'], 'exist', 'skipOnError' => true, 'targetClass' => SdbEstados::className(), 'targetAttribute' => ['id_est' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_est' => 'Id Est',
            'descripcion' => 'Descripcion',
            'codigo' => 'Código (SUDEBIP)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivo::className(), ['id_mun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbCiudades()
    {
        return $this->hasMany(SdbCiudades::className(), ['codmun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEst()
    {
        return $this->hasOne(SdbEstados::className(), ['id' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbParroquias()
    {
        return $this->hasMany(SdbParroquias::className(), ['codmun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbSedes()
    {
        return $this->hasMany(SdbSedes::className(), ['codmun' => 'id']);
    }
}
