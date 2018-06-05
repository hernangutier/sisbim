<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inc_ordenes_compras".
 *
 * @property int $id
 * @property string $num
 * @property int $id_prov
 * @property string $fecha
 * @property string $descripcion
 * @property int $status 0: abierta 1: procesada o cerrada 2: anulada
 * @property int $id_user
 *
 * @property Proveedores $prov
 * @property UserBm $user
 * @property IncOrigenes[] $incOrigenes
 */
class IncOrdenesCompras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inc_ordenes_compras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num','id_prov','fecha'], 'required'],
            [['id_prov', 'status', 'id_user'], 'default', 'value' => null],
            [['id_prov', 'status', 'id_user'], 'integer'],
            [['fecha'], 'safe'],
            [['num'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 400],
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['id_prov' => 'id']],
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
            'num' => 'N° de Orden',
            'id_prov' => 'Proveedor',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'status' => 'Status',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProv()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'id_prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncOrigenes()
    {
        return $this->hasMany(IncOrigenes::className(), ['id_oc' => 'id']);
    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="badge badge-warning"><b>Pendiente</b></span>';
      }

      if ($this->status==0){
        return '<span class="badge badge-success">Procesado</span>';
      }

      if ($this->status==0){
        return '<span class="badge badge-danger">Anulado</span>';
      }

    }
}
