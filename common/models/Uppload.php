<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * LoginForm is the model behind the login form.
 */
class Uppload extends Model
{
    public $file;
    public $patch;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['file'], 'required'],
          
        ];
    }

    public function attributeLabels()
    {
        return [
           'file'=>'Archivo a Adjuntar',
           'patch'=>'Ruta',
        ];

    }

    public function upload($name){
         try {

                 $this->file = UploadedFile::getInstance($this, 'file');
                 $name=$name .'.' . $this->file->extension;
                 $this->file->saveAs($this->patch . $name);

                 return $name;
             } catch (exception $ex){
                 return null;
             }

     }




    }
