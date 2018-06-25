<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_inventario_ini".
 *
 * @property int $id
 * @property int $id_user
 * @property string $fecha_creation
 * @property string $fecha_cierre
 * @property string $motivo
 * @property boolean status
 * @property int $tipo 0: inicial 1: ordinario
 * @property string $ref
 * @property UserBm $user
 *
 * @property ProvInventarioIniDt[] $provInventarioIniDts
 */
class ProvInventarioIni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_inventario_ini';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'status'], 'default', 'value' => null],
            [['ref','fecha_cierre'],'required'],
            [['id_user','tipo'], 'integer'],
            [['fecha_creation', 'fecha_cierre'], 'safe'],
            [['motivo'], 'string', 'max' => 400],
            [['ref'], 'string', 'max' => 15],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserBm::className(), 'targetAttribute' => ['id_user' => 'id_bm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'fecha_creation' => 'Fecha Creation',
            'fecha_cierre' => 'Fecha Cierre',
            'motivo' => 'Motivo',
            'status' => 'Estatus',
            'ref'=>'Referencia',
            'tipo'=>'Tipo de Inventario'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvInventarioIniDts()
    {
        return $this->hasMany(ProvInventarioIniDt::className(), ['id_inv' => 'id']);
    }


    public function getMovimientosDts()
    {
        return $this->hasMany(MovimientosDt::className(), ['codmov' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }


    public function getStatusHtml(){
      if ($this->status){
        return '<span class="badge badge-warning"><b>Activo</b></span>';
      } else {
        return '<span class="badge badge-success">Procesado</span>';
      }



    }
}
