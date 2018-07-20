<?php
namespace frontend\models;

use yii\base\Model;


/**
 * Signup form
 */
class FormDesvincular extends Model
{
    public $id_resp;
    public $motivo;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['id_resp', 'required'],
            ['motivo','required'],
            ['id_resp', 'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id_resp' => 'Seleccione Responsable',

        ];
    }


}
