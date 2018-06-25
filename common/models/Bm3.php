<?php

namespace common\models;

use Yii;
use yii\web\Response;
/**
 * This is the model class for table "bm3".
 *
 * @property int $id
 * @property int $id_periodo
 * @property string $date_creation
 * @property int $id_user
 * @property string $observaciones
 *
 * @property Periodos $periodo
 * @property UserBm $user
 * @property Bm3Dt[] $bm3Dts
 */
class Bm3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bm3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo', 'id_user'], 'default', 'value' => null],
            [['id_periodo', 'id_user'], 'integer'],
            [['date_creation'], 'safe'],
            [['observaciones'], 'string', 'max' => 400],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['id_periodo' => 'id']],
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
            'id_periodo' => 'Periodo',
            'date_creation' => 'Date Creation',
            'id_user' => 'Usuario',
            'observaciones' => 'Observaciones',
        ];
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
    public function getUser()
    {
        return $this->hasOne(UserBm::className(), ['id_bm' => 'id_user']);
    }


    public function getNextRef()
    {
      return (Bm3::find()->count() +1);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBm3Dts()
    {
        return $this->hasMany(Bm3Dt::className(), ['id_bm3' => 'id']);
    }

    public function getStatusHtml(){
      if ($this->status==0){
        return '<span class="badge badge-warning"><b>En Transito</b></span>';
      }

      if ($this->status==1){
        return '<span class="badge badge-success">Procesado</span>';
      }

      if ($this->status==2){
        return '<span class="badge badge-danger">Anulado</span>';
      }

    }
}
