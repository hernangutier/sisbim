<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "gv_polizas".
 *
 * @property int $id_aseguradora cod de la compañia aseguradora
 * @property string $otra_aseguradora
 * @property string $npoliza
 * @property string $monto Monto Asegurado
 * @property string $tipo
 * @property int $moneda
 * @property string $especifique_moneda
 * @property string $f_ini
 * @property string $f_fin
 * @property string $resp_civil S/N
 * @property int $tipo_cobertura
 * @property string $especifique_tipo_cobertura
 * @property string $descripcion_cobertura
 * @property int $id_bien
 * @property bool $active
 * @property int $id
 * @property string $observaciones
 * @property string $f_nulls Fecha de Anulacion
 * @property int $status 0: vigente 1: Vencida 2: Anulada
 * @property int $id_user
 *
 * @property Bienes $bien
 * @property SdbSeguros $aseguradora
 * @property UserBm $user
 * @property SegurosExp[] $segurosExps
 */
class GvPolizas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gv_polizas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aseguradora', 'moneda', 'tipo_cobertura', 'id_bien', 'status', 'id_user'], 'default', 'value' => null],
            [['id_aseguradora', 'moneda', 'tipo_cobertura', 'id_bien', 'status', 'id_user'], 'integer'],
            [['monto'], 'number'],
            [['tipo'], 'string'],
            [['f_ini', 'f_fin','npoliza'], 'required'],
            [['f_ini', 'f_fin', 'f_nulls'], 'safe'],
            [['active'], 'boolean'],
            [['otra_aseguradora', 'especifique_tipo_cobertura', 'descripcion_cobertura'], 'string', 'max' => 100],
            [['npoliza', 'especifique_moneda'], 'string', 'max' => 30],
            [['resp_civil'], 'string', 'max' => 1],
            [['observaciones'], 'string', 'max' => 400],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
            [['id_aseguradora'], 'exist', 'skipOnError' => true, 'targetClass' => SdbSeguros::className(), 'targetAttribute' => ['id_aseguradora' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserBm::className(), 'targetAttribute' => ['id_user' => 'id_bm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aseguradora' => 'Compañia Aseguradora',
            'otra_aseguradora' => 'Otra Aseguradora',
            'npoliza' => 'N° de Poliza',
            'monto' => 'Monto',
            'tipo' => 'Tipo',
            'moneda' => 'Moneda',
            'especifique_moneda' => 'Especifique Moneda',
            'f_ini' => 'Inicio de Cobertura',
            'f_fin' => 'Vencimiento de la Cobertura',
            'resp_civil' => 'Resp Civil',
            'tipo_cobertura' => 'Tipo Cobertura',
            'especifique_tipo_cobertura' => 'Especifique Tipo Cobertura',
            'descripcion_cobertura' => 'Descripcion Cobertura',
            'id_bien' => 'Id Bien',
            'active' => 'Active',
            'id' => 'ID',
            'observaciones' => 'Observaciones',
            'f_nulls' => 'F Nulls',
            'status' => 'Status',
            'id_user' => 'Id User',
        ];
    }

    public function HelpersTipoCobertura()
    {
      if ($this->tipo_cobertura==1){
        return 'Total';
      }
      if ($this->tipo_cobertura==2){
        return 'Parcial';
      }
      if ($this->tipo_cobertura==3){
        return 'Otro Tipo de Cobertura';
      }
    }

    public function HelpersStatus()
    {
      # code...
      if ((strtotime($this->f_fin))<strtotime(date('y-m-d'))){
        $render= '<span class="badge badge-danger"><b>Vencida</b></span>';
        $render=$render.

        Html::a('Registrar Nueva Poliza <i class="ace-icon fa fa-hand-o-right"></i>','#',[
          'id' => 'activity-index-link',
          'class' => 'blue add',
          'data-toggle' => 'modal',
          'data-target' => '#modal-accesorios',
          'data-url' => Url::to(['gv-polizas/create','id'=>$this->id_bien]),
          'data-pjax' => '0',
        ]);





        return $render;
      } else {
        return '<span class="badge badge-success"><b>Activa</b></span>';
      }
    }


    public static function lsTipoCobertura(){
      return [
            '1'=>'Total',
            '2'=>'Parcial',
            '3'=>'Otro tipo de Cobertura',

        ];
    }


    public static function lsMonedas(){
      return [
            '1'=>'Bolívares',
            '2'=>'Doláres',
            '3'=>'Euros',
            '4'=>'Otra Moneda',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBien()
    {
        return $this->hasOne(Bienes::className(), ['id' => 'id_bien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAseguradora()
    {
        return $this->hasOne(SdbSeguros::className(), ['id' => 'id_aseguradora']);
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
    public function getSegurosExps()
    {
        return $this->hasMany(SegurosExp::className(), ['codseg' => 'id']);
    }
}
