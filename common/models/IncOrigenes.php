<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inc_origenes".
 *
 * @property int $id
 * @property string $fecha_fact
 * @property string $date_creation
 * @property string $num_ne Numero de Nota de Entrega
 * @property string $fecha_nota_entrega
 * @property string $num_fact Numero de Factura
 * @property string $descripcion_concurso Descripcion del Concurso
 * @property string $num_concurso Numero de Concurso
 * @property string $fecha_concurso Fecha del Concurso Abierto o Cerrado
 * @property string $num_contrato Numero de Contrato
 * @property string $fecha_contrato Fecha del Contrato
 * @property string $nombre_donante_cedente_propietario Aplica para: 	Dobacion 	Dacion de Pago 	Confiscacion
 * @property string $num_documento Aplica para: 		Donacion: Numero de acta o Contrato 		Dacion de Pago: Numero de Finiquito 		Confiscacion: Numero de Sentencia
 * @property string $fecha_documento Aplica para: 	Donacion: Numero de acta o contrato 	Dacion de Pago: Fecha de Finiquito 	Confiscacion: Fecha de Sentencia
 * @property string $nombre_registro_notaria Nombre del Registro o Notaria
 * @property string $tomo Tomo
 * @property string $folio Folio de registro
 * @property string $fecha_registro Fecha de Registro
 * @property int $id_user
 * @property string $nombre_autoridad Solo para el Caso de  	Confiscacion
 * @property int $id_oc
 *
 * @property IncBm[] $incBms
 * @property IncOrdenesCompras $oc
 * @property UserBm $user
 */
class IncOrigenes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inc_origenes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_creation', 'fecha_nota_entrega', 'fecha_concurso', 'fecha_contrato', 'fecha_documento', 'fecha_registro'], 'safe'],
            [['id_user', 'id_oc'], 'default', 'value' => null],
            [['id_user', 'id_oc'], 'integer'],
            [['fecha_fact', 'num_ne', 'num_fact'], 'string', 'max' => 20],
            [['descripcion_concurso', 'nombre_registro_notaria'], 'string', 'max' => 400],
            [['num_concurso', 'num_contrato', 'num_documento', 'tomo', 'folio'], 'string', 'max' => 10],
            [['nombre_donante_cedente_propietario', 'nombre_autoridad'], 'string', 'max' => 200],
            [['id_oc'], 'exist', 'skipOnError' => true, 'targetClass' => IncOrdenesCompras::className(), 'targetAttribute' => ['id_oc' => 'id']],
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
            'fecha_fact' => 'Fecha Fact',
            'date_creation' => 'Date Creation',
            'num_ne' => 'Num Ne',
            'fecha_nota_entrega' => 'Fecha Nota Entrega',
            'num_fact' => 'Num Fact',
            'descripcion_concurso' => 'Descripcion Concurso',
            'num_concurso' => 'Num Concurso',
            'fecha_concurso' => 'Fecha Concurso',
            'num_contrato' => 'Num Contrato',
            'fecha_contrato' => 'Fecha Contrato',
            'nombre_donante_cedente_propietario' => 'Nombre Donante Cedente Propietario',
            'num_documento' => 'Num Documento',
            'fecha_documento' => 'Fecha Documento',
            'nombre_registro_notaria' => 'Nombre Registro Notaria',
            'tomo' => 'Tomo',
            'folio' => 'Folio',
            'fecha_registro' => 'Fecha Registro',
            'id_user' => 'Id User',
            'nombre_autoridad' => 'Nombre Autoridad',
            'id_oc' => 'Id Oc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncBms()
    {
        return $this->hasMany(IncBm::className(), ['id_origen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOc()
    {
        return $this->hasOne(IncOrdenesCompras::className(), ['id' => 'id_oc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }
}
