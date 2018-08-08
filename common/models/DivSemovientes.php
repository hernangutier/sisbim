<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "div_semovientes".
 *
 * @property int $id
 * @property int $id_insp
 * @property string $nbov
 * @property int $categoria
 * @property string $sexo 'H' o 'M'
 * @property bool $is_herrado
 * @property string $observaciones
 * @property int $is_auditado
 *
 * @property DivInspecciones $insp
 */
class DivSemovientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'div_semovientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_insp', 'categoria'], 'default', 'value' => null],
            [['id_insp', 'categoria','is_auditado'], 'integer'],
            [['nbov'], 'required'],
            [['sexo'], 'string'],
            [['is_herrado'], 'boolean'],
            [['nbov'], 'string', 'max' => 10],
            [['observaciones'], 'string', 'max' => 400],
            [['id_insp'], 'exist', 'skipOnError' => true, 'targetClass' => DivInspecciones::className(), 'targetAttribute' => ['id_insp' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_insp' => 'Id Insp',
            'nbov' => 'N° de Bovino',
            'categoria' => 'Categoria',
            'sexo' => 'Sexo',
            'is_herrado' => 'Esta Herrado',
            'observaciones' => 'Observaciones',
            'is_auditado'=>'Auditado'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsp()
    {
        return $this->hasOne(DivInspecciones::className(), ['id' => 'id_insp']);
    }

    public function getSexoHtml(){

        if ($this->sexo=='H'){
          return '<span class="label label-danger arrowed-in arrowed-in-right">Hembra</span>';
        }
        if ($this->sexo=='M'){
          return '<span class="label label-primary arrowed-right arrowed-in">Macho</span>';
        }


    }


    public function getCategoria(){
      if ($this->categoria==0){
        return 'VACA';
      }

      if ($this->categoria==1){
        return 'TORO';
      }
      if ($this->categoria==2){
        return 'BECERRO(A)';
      }
      if ($this->categoria==3){
        return 'MAUTE(A)';
      }
      if ($this->categoria==4){
        return 'NOVILLO(A)';
      }
    }


}
