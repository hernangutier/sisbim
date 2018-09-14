<?php
namespace frontend\models;

use yii\base\Model;


/**
 * Signup form
 */
class FormCierre extends Model
{
    public $fini;
    public $fclose;
    public $descripcion;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['fini','fclose','decripcion'], 'required'],



        ];
    }

    public function attributeLabels()
    {
        return [
            'fini' => 'Fecha de Inicio',
            'fini' => 'Fecha de Cierre',
            'descripcion' => 'Descripcion',

        ];
    }


}
