<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "bienes".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $serial
 * @property integer $id_inc
 * @property integer $dias_garantia
 * @property integer $id_resp_directo
 * @property integer $status
 * @property double $costo
 * @property integer $notasigned
 * @property string $observacion
 * @property integer $isvehicle
 * @property integer $idvehicle
 * @property string $foto
 * @property integer $id_color
 * @property integer $id_und_actual
 * @property integer $isasigned
 * @property string $descripcion
 * @property string $marca
 * @property integer $id_clas
 * @property string $fcreacion
 * @property integer $id_user
 * @property integer $operativo
 * @property integer $tipobien
 * @property integer $id_lin
 * @property string $localizacion
 * @property string $fdesinc
 * @property integer $pendientedesinc
 * @property string $undmedida
 * @property integer $aplicaiva
 * @property integer $existe
 * @property integer $id_cat
 * @property integer $statusfisical
 * @property integer $disponibilidad
 * @property resource $foto1
 * @property integer $mantenimiento
 * @property integer $estado_uso
 * @property integer $estado_fisico
 * @property string $old_id
 * @property integer $activo
  * @property int $id_ente_ext
 * @property boolean $is_colectivo
 * @property boolean $pend_in_mov
 * @property string $motivo_indisponibilidad
 * @property boolean $is_in
 * @property bool $is_custodia

 * @property boolean $etiquetar
 * @property boolean $no_ubicado
 * @property boolean $desincorporar

 * @property boolean $is_asegurable
 * @property Responsables $idresp
 * @property VehiculosMaquinas $vehicle
 * @property Clasificacion $idclas0
 * @property Lineas $idlin0
 * @property SdbCategoriasEsp $idcat0
 * @property UnidadesAdmin $idUndActual
 * @property DesincorporacionesDt[] $desincorporacionesDts
 * @property MovimientosDt[] $movimientosDts
 * @property PeriodosDt[] $periodosDts
 * @property SdbColores $idcolor0
 */
class Bienes extends \yii\db\ActiveRecord
{
  const SCENARIO_MIGRACION = 'edith_migracion';
  public $sin_user=false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes';
    }

    /**
     * @inheritdoc
     */
     public function rules()
      {
          return [
              [['codigo', 'status', 'costo', 'notasigned', 'isvehicle', 'isasigned', 'tipobien', 'pendientedesinc', 'aplicaiva', 'existe', 'disponibilidad'], 'required'],
              [['id_inc', 'dias_garantia', 'id_resp_directo', 'status', 'notasigned', 'isvehicle', 'id_vehicle', 'id_und_actual', 'isasigned', 'id_clas', 'id_user', 'operativo', 'tipobien', 'id_lin', 'pendientedesinc', 'aplicaiva', 'existe', 'id_cat', 'statusfisical', 'disponibilidad', 'mantenimiento', 'estado_uso', 'estado_fisico', 'activo', 'id_color', 'id_modelo', 'barcode', 'tipo_indisponibilidad', 'id_ente_ext'], 'default', 'value' => null],
              [['id_inc', 'dias_garantia', 'id_resp_directo', 'status', 'notasigned', 'isvehicle', 'id_vehicle', 'id_und_actual', 'isasigned', 'id_clas', 'id_user', 'operativo', 'tipobien', 'id_lin', 'pendientedesinc', 'aplicaiva', 'existe', 'id_cat', 'statusfisical', 'disponibilidad', 'mantenimiento', 'estado_uso', 'estado_fisico', 'activo', 'id_color', 'id_modelo', 'barcode', 'tipo_indisponibilidad', 'id_ente_ext'], 'integer'],
              [['costo'], 'number'],
              [['foto', 'descripcion', 'foto1'], 'string'],
              [['fcreacion', 'fdesinc'], 'safe'],
              [['is_colectivo', 'is_in', 'is_asegurable', 'pend_in_mov', 'aplica_garantia', 'etiquetar', 'desincorporar', 'no_ubicado', 'bm3', 'is_custodia'], 'boolean'],
              [['codigo', 'serial'], 'string', 'max' => 50],
              [['observacion', 'localizacion', 'motivo_indisponibilidad'], 'string', 'max' => 400],
              [['marca'], 'string', 'max' => 80],
              [['undmedida', 'old_cod'], 'string', 'max' => 20],
              [['codigo'], 'unique'],
              [['id_clas'], 'exist', 'skipOnError' => true, 'targetClass' => Clasificacion::className(), 'targetAttribute' => ['id_clas' => 'id']],
              [['id_ente_ext'], 'exist', 'skipOnError' => true, 'targetClass' => EntesExternos::className(), 'targetAttribute' => ['id_ente_ext' => 'id']],
              [['id_lin'], 'exist', 'skipOnError' => true, 'targetClass' => Lineas::className(), 'targetAttribute' => ['id_lin' => 'id']],
              [['id_resp_directo'], 'exist', 'skipOnError' => true, 'targetClass' => Responsables::className(), 'targetAttribute' => ['id_resp_directo' => 'id']],
              [['id_cat'], 'exist', 'skipOnError' => true, 'targetClass' => SdbCategoriasEsp::className(), 'targetAttribute' => ['id_cat' => 'id']],
              [['id_color'], 'exist', 'skipOnError' => true, 'targetClass' => SdbColores::className(), 'targetAttribute' => ['id_color' => 'id']],
              [['id_modelo'], 'exist', 'skipOnError' => true, 'targetClass' => SdbModelos::className(), 'targetAttribute' => ['id_modelo' => 'cod']],
              [['id_und_actual'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadesAdmin::className(), 'targetAttribute' => ['id_und_actual' => 'id']],
              [['id_vehicle'], 'exist', 'skipOnError' => true, 'targetClass' => VehiculosMaquinas::className(), 'targetAttribute' => ['id_vehicle' => 'id']],
          ];
      }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'codigo' => 'N° de Bien',
            'serial' => 'Serial',
            'id_ing' => 'id Ing',
            'dias_garantia' => 'Dias Garantia',
            'id_resp_directo' => 'Responsable de Uso',
            'status' => 'Status',
            'costo' => 'Costo',
            'notasigned' => 'Notasigned',
            'observacion' => 'Observacion',
            'isvehicle' => 'Isvehicle',
            'idvehicle' => 'idvehicle',
            'foto' => 'Foto',
            'id_und_actual' => 'Unidad Administrativa',
            'isasigned' => 'Isasigned',
            'descripcion' => 'Descripcion',
            'marca' => 'Marca',
            'id_clas' => 'Clasificación según Pub. 20',
            'fcreacion' => 'Fcreacion',
            'id_user' => 'Usuario',
            'operativo' => 'Operativo',
            'tipobien' => 'Tipobien',
            'id_lin' => 'Linea',
            'localizacion' => 'Localizacion',
            'fdesinc' => 'Fdesinc',
            'pendientedesinc' => 'Pendientedesinc',
            'undmedida' => 'Undmedida',
            'aplicaiva' => 'Aplicaiva',
            'existe' => 'Existe',
            'idcat' => 'Categoria Especifica (SUDEBIP)',
            'statusfisical' => 'Estado Fisico del Bien',
            'disponibilidad' => 'Disponibilidad',
            'foto1' => 'Foto1',
            'mantenimiento' => 'Mantenimiento',
            'estado_uso' => 'Estado Uso (SUDEBIP)',
            'estado_fisico' => 'Estado Fisico',
            'old_cod' => 'N°. de Bien Anterior',
            'activo' => 'Activo o Desincorporado',
            'is_colectivo' => 'Bien de Uso Colectivo',
            'motivo_indisponibilidad' => 'Motivo Indisponibilidad',
            'is_in' => 'Is In',
            'is_asegurable' => 'Es Asegurable',
            'idcolor'=>'Color',
            'pend_in_mov'=>'Pendiente en Movimiento',
            'id_modelo'=>'Modelo',
            'sin_user'=>'Sin Usuario',
            'etiquetar'=>'Etiquetar',
            'desincorporar'=>'Desincorporar',
            'no_ubicado'=>'No Ubicado',
            'is_custodia'=>'Bien en Custodia o Cuido',
            'id_ente_ext'=>'Ente Propietario del Bien',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_MIGRACION] = ['idcolor','idcat','estado_fisico', 'estado_uso','is_colectivo','is_asegurable'];


        return $scenarios;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidclas0()
    {
        return $this->hasOne(Clasificacion::className(), ['id' => 'id_clas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidlin0()
    {
        return $this->hasOne(Lineas::className(), ['id' => 'id_lin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidcat0()
    {
        return $this->hasOne(SdbCategoriasEsp::className(), ['id' => 'id_cat']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
   public function getidresp()
   {
       return $this->hasOne(Responsables::className(), ['id' => 'id_resp_directo']);
   }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidUndActual()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['id' => 'id_und_actual']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesincorporacionesDts()
    {
        return $this->hasMany(DesincorporacionesDt::className(), ['id_bien' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosDts()
    {
        return $this->hasMany(MovimientosDt::className(), ['id_bien' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getidcolor0()
    {
        return $this->hasOne(SdbColores::className(), ['id' => 'id_color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehiculosMaquinas::className(), ['id' => 'id_vehicle']);
    }



    public function getEstadoFisicoHtml(){

        if ($this->estado_fisico==1){
          return '<span class="label label-success arrowed-in arrowed-in-right">Óptimo</span>';
        }
        if ($this->estado_fisico==2){
          return '<span class="label label-info arrowed-right arrowed-in">Regular</span>';
        }
        if ($this->estado_fisico==3){
          return '<span class="label label-danger arrowed">Deteriorado</span>';
        }
        if ($this->estado_fisico==4){
          return '<span class="label label-danger arrowed">Averiado</span>';
        }
        if ($this->estado_fisico==5){
          return '<span class="label label-danger arrowed">Chatarra</span>';
        }
        if ($this->estado_fisico==6){
          return '<span class="label label-danger arrowed">No Operativo</span>';
        }
        if ($this->estado_fisico==7){
          return '<span class="label label-info arrowed">Otra Condición Fisica</span>';
        }

    }


    public static function getPercentBm(){
      $total=Bienes::find(['activo'=>1])->count();
        $bm=Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 0])->count();
        return number_format(($bm*100)/$total,2) . " %";
    }

    public static function getPercentBMuso(){
      $total=Bienes::find(['activo'=>1])->count();
        $bm=Bienes::find()->andFilterWhere(['=', 'activo', 1])->andFilterWhere(['=', 'tipobien', 1])->count();
        return number_format(($bm*100)/$total,2) . " %";
    }

    public static function getListSqlActives(){
      $sql="SELECT  * from vw_bienes_activos";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

  public static function getListSqlModelosMarcas($id){
      $sql="SELECT  m.id,(ma.denominacion || ' -> ' || m.descripcion) as descripcion
              from sdb_modelos m inner join sdb_marcas ma on m.idmarca=ma.id and m.id_segun_cat=" . $id  ;
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getListSqlActivesNoAsegurados(){
      $sql="SELECT  * from vw_bienes_no_asegurados";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getListSqlAsegurables(){
      $sql="SELECT  * from vw_bienes_asegurables";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getTipoBien(){
      if ($this->tipobien==0){
        return 'Bien Mueble';
      } else {
        return 'Bien de Uso';
      }

    }


    public function getPoliza()
    {
       $model=GvPolizas::find()->where(['id_bien'=>$this->id])->orderBy('id')->limit(1)->all();

       foreach ($model as $poliza) {
            return $poliza;
       }

    }


    public function getEstadoUso(){
      if ($this->estado_uso==1){
        return 'En Uso';
      }
      if ($this->estado_uso==2){
        return 'En Comodato';
      }
      if ($this->estado_uso==3){
        return 'En Arrendamiento';
      }
      if ($this->estado_uso==4){
        return 'En Mantenimiento';
      }
      if ($this->estado_uso==5){
        return 'En Reparación';
      }
      if ($this->estado_uso==6){
        return 'En proceso de disposición';
      }
      if ($this->estado_uso==7){
        return 'En Desuso por Obsolecencia';
      }
      if ($this->estado_uso==8){
        return 'En Desuso por Inservibilidad';
      }
      if ($this->estado_uso==9){
        return 'En Desuso por Obsolecencia e Inservibilidad';
      }
      if ($this->estado_uso==10){
        return 'En Almacen o Deposito para su Asignación';
      }
      if ($this->estado_uso==11){
        return 'Otro Uso';
      }

    }

    public static function getListEstadosUso(){
      return [
            '1'=>'En Uso',
            '2'=>'En Comodato',
            '3'=>'En Arrendamiento',
            '4'=>'En Mantenimiento',
            '4'=>'En Reparación',
            '6'=>'En proceso de disposoción',
            '7'=>'En Desuso por Obsolecencia',
            '8'=>'En Desuso por Inservibilidad',
            '9'=>'En Desuso por Obsolecencia e Inservibilidad',
            '10'=>'En Almacen o Deposito para su Asignación',
            '11'=>'Otro Uso',
        ];
    }

    public static function getListEstadosFisico(){
      return [
            '1'=>'Óptimo',
            '2'=>'Regular',
            '3'=>'Deteriorado',
            '4'=>'Averiado',
            '4'=>'Chatarra',
            '6'=>'No Operativo',
            '7'=>'Otra Condicón Física',

        ];
    }

    public static function getListTiposAdquisicion(){
      return [
            '1'=>'Compra Directa (por consulta de precio)',
            '2'=>'Permuta',
            '3'=>'Dación en Pago',
            '4'=>'Donación',
            '4'=>'Transferencia',
            '6'=>'Expropiación',
            '7'=>'Confiscación',
            '8'=>'Compra por Concurso Abierto',
            '9'=>'Compra por Concurso Cerrado',
            '10'=>'Adjudicación',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodosDts()
    {
        return $this->hasMany(PeriodosDt::className(), ['idbien' => 'id']);
    }

    public function getUserActual(){
      if (!(isset($this->idresp))){
        if ($this->is_colectivo){
          return 'Uso Colectivo';
        } else {
          return 'No Asignado';
        }
      } else {
        return $this->idresp->nombres . '  ' . $this->idresp->apellidos;
      }
    }
}
