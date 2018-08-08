<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sdb_estados".
 *
 * @property int $id
 * @property int $codigo
 * @property int $id_pais
 * @property string $descripcion
 *
 * @property SdbPaises $pais
 * @property SdbMunicipios[] $sdbMunicipios
 * @property SdbSedes[] $sdbSedes
 */
class SdbEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdb_estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo'], 'required'],
            [['codigo', 'id_pais'], 'default', 'value' => null],
            [['codigo', 'id_pais'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['codigo'], 'unique'],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => SdbPaises::className(), 'targetAttribute' => ['id_pais' => 'cod']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'id_pais' => 'Id Pais',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(SdbPaises::className(), ['cod' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbMunicipios()
    {
        return $this->hasMany(SdbMunicipios::className(), ['id_est' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdbSedes()
    {
        return $this->hasMany(SdbSedes::className(), ['codest' => 'id']);
    }
}
