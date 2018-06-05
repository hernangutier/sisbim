<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prov_compras".
 *
 * @property int $id
 * @property int $id_prov
 * @property string $fecha_fact
 * @property int $id_user
 * @property string $motivo
 * @property int $status
 * @property string $motivo_null
 * @property int $ref
 * @property string $num_fact
 * @property int $id_periodo
 *
 * @property PeriodosSupra $periodo
 *
 * @property ProvComprasDt[] $provComprasDts
 */
class ProvCompras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prov_compras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prov', 'id_user', 'status', 'ref'], 'default', 'value' => null],
            [['id_prov', 'id_user', 'status', 'ref','id_periodo'], 'integer'],
            [['fecha_fact'], 'safe'],
            [['num_fact','id_prov','fecha_fact'], 'required'],
            [['motivo', 'motivo_null'], 'string', 'max' => 400],
            [['num_fact'], 'string', 'max' => 20],
            [['id_prov'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedores::className(), 'targetAttribute' => ['id_prov' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_prov' => 'Proveedor',
            'fecha_fact' => 'Fecha de la Factura',
            'id_user' => 'Id User',
            'motivo' => 'Motivo',
            'status' => 'Status',
            'motivo_null' => 'Motivo Null',
            'ref' => 'Referencia',
            'num_fact' => 'Numero de Factura',
            'id_periodo'=>'Periodo de Ejercicio Economico'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvComprasDts()
    {
        return $this->hasMany(ProvComprasDt::className(), ['id_compra' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
   public function getProv()
   {
       return $this->hasOne(Proveedores::className(), ['id' => 'id_prov']);
   }


   public function getPeriodo()
   {
       return $this->hasOne(PeriodosSupra::className(), ['id' => 'id_periodo']);
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
