<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sdb_modelos".
 *
 * @property int $cod
 * @property string $descripcion
 * @property int $codmarca
 * @property int $cod_segun_cat Código Ségun Catalogo de Bienes al que aplica
 *
 * @property Bienes[] $bienes
 * @property SdbCategoriasEsp $codSegunCat
 * @property SdbMarcas $codmarca0
 */
class SdbModelos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdb_modelos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['codmarca', 'cod_segun_cat'], 'default', 'value' => null],
            [['codmarca', 'cod_segun_cat'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['cod_segun_cat'], 'exist', 'skipOnError' => true, 'targetClass' => SdbCategoriasEsp::className(), 'targetAttribute' => ['cod_segun_cat' => 'id']],
            [['codmarca'], 'exist', 'skipOnError' => true, 'targetClass' => SdbMarcas::className(), 'targetAttribute' => ['codmarca' => 'cod']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod' => 'Cod',
            'descripcion' => 'Descripcion',
            'codmarca' => 'Codmarca',
            'cod_segun_cat' => 'Cod Segun Cat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasMany(Bienes::className(), ['id_modelo' => 'cod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodSegunCat()
    {
        return $this->hasOne(SdbCategoriasEsp::className(), ['id' => 'cod_segun_cat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodmarca0()
    {
        return $this->hasOne(SdbMarcas::className(), ['cod' => 'codmarca']);
    }
}
