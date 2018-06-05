<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "movimientos_dt".
 *
 * @property integer $id
 * @property integer $id_bien
 * @property integer $id_mov
 * @property integer $id_user_old
 * @property integer $id_user_new
 * @property integer $estado_uso
 * @property integer $estado_fisico
 * @property integer $id_und_destino
 *
 * @property Bienes $idBien
 * @property Movimientos $idMov
 * @property Responsables $idUserOld
 * @property Responsables $idUser1
 * @property UnidadesAdmin $idUndDestino
 */
class MovimientosDt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientos_dt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bien', 'id_mov', 'id_user_old', 'id_user_new', 'estado_uso', 'estado_fisico', 'id_und_destino'], 'integer'],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::className(), 'targetAttribute' => ['id_bien' => 'id']],
            [['id_mov'], 'exist', 'skipOnError' => true, 'targetClass' => Movimientos::className(), 'targetAttribute' => ['id_mov' => 'id']],
            [['id_user_old'], 'exist', 'skipOnError' => true, 'targetClass' => Responsables::className(), 'targetAttribute' => ['id_user_old' => 'id']],
            [['id_user_new'], 'exist', 'skipOnError' => true, 'targetClass' => Responsables::className(), 'targetAttribute' => ['id_user_new' => 'id']],
            [['id_und_destino'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadesAdmin::className(), 'targetAttribute' => ['id_und_destino' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bien' => 'Bien a Consultar',
            'id_mov' => 'Id Mov',
            'id_user_old' => 'Usuario Anterior',
            'id_user_new' => 'Nuevo Usuario',
            'estado_uso' => 'Estado de Uso',
            'estado_fisico' => 'Condición Fisica Actual',
            'id_und_destino' => 'Destino del Bien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBien()
    {
        return $this->hasOne(Bienes::className(), ['id' => 'id_bien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMov()
    {
        return $this->hasOne(Movimientos::className(), ['id' => 'id_mov']);
    }

    public function isDuplicate()
    {
      $value=MovimientosDt::find()->where(['id_bien'=>$this->id_bien])->andWhere(['id_mov'=>$this->id_mov])->count();
      if ($value>=1){
        return true;
      }else {
        return false;
      }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserOld()
    {
        return $this->hasOne(Responsables::className(), ['id' => 'id_user_old']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getIdUser1()
    {
        return $this->hasOne(Responsables::className(), ['id' => 'id_user_new']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUndDestino()
    {
        return $this->hasOne(UnidadesAdmin::className(), ['id' => 'id_und_destino']);
    }
}
