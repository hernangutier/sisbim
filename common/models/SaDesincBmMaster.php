<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sa_desinc_bm_master".
 *
 * @property int $id primary key
 * @property string $ncontrol
 * @property int $id_conc
 * @property string $date_creation
 * @property string $date_close
 * @property int $id_periodo codigo del periodo de inventario en que se ejecuta el procedimiento
 * @property string $observaciones
 * @property int $status 0: en elaboracion 1: en espera de confirmación 2: confirmada 3: anulada
 * @property string $nacta N° de Acta de Desincorporacion del a Comision de Enajenacion de Bienes
 * @property string $fecha_acta Fecha del Acta
 * @property int $id_ben codigo del beneficiario de la desincorporacion
 * @property string $motivo_nulls
 *
 * @property SaDesincBmDetail[] $saDesincBmDetails
 * @property SaDesincExp[] $saDesincExps
 * @property SaDesincConceptos $conc
 * @property Periodos $periodo
 */
class SaDesincBmMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_desinc_bm_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_conc', 'id_periodo', 'status', 'id_ben'], 'default', 'value' => null],
            [['id_conc', 'id_periodo', 'status', 'id_ben'], 'integer'],
            [['date_creation', 'date_close', 'fecha_acta'], 'safe'],
            [['id_conc','observaciones'], 'required'],
            [['ncontrol'], 'string', 'max' => 10],
            [['observaciones', 'motivo_nulls'], 'string', 'max' => 400],
            [['nacta'], 'string', 'max' => 20],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['id_periodo' => 'id']],
            [['id_conc'], 'exist', 'skipOnError' => true, 'targetClass' => SaDesincConceptos::className(), 'targetAttribute' => ['id_conc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ncontrol' => 'N° de Comprobante',
            'id_conc' => 'Concepto Pub. 21',
            'date_creation' => 'Fecha de Creación',
            'date_close' => 'Date Close',
            'id_periodo' => 'Id Periodo',
            'observaciones' => 'Observaciones',
            'status' => 'Estatus',
            'nacta' => 'Nacta',
            'fecha_acta' => 'Fecha Acta',
            'id_ben' => 'Id Ben',
            'motivo_nulls' => 'Motivo Nulls',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaDesincBmDetails()
    {
        return $this->hasMany(SaDesincBmDetail::className(), ['id_des' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaDesincExps()
    {
        return $this->hasMany(SaDesincExp::className(), ['id_des' => 'id']);
    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="badge badge-info"><b>en Propuesta</b></span>';
      }

      if ($this->status==1){
        return '<span class="badge badge-success">Enajenacion Procesada</span>';
      }

      if ($this->status==2){
        return '<span class="badge badge-danger">Anulado</span>';
      }

    }

    public function getNControlFormat()
    {
        if (isset($this->ncontrol)) {
          return str_pad($this->ncontrol,10,'0',STR_PAD_LEFT);

        } else {
          return 'No Asignado';
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo()
    {
        return $this->hasOne(Periodos::className(), ['id' => 'id_periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcepto()
    {
        return $this->hasOne(SaDesincConceptos::className(), ['id' => 'id_conc']);
    }

}
