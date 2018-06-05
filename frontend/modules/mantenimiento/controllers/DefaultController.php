<?php

namespace frontend\modules\mantenimiento\controllers;

use yii\web\Controller;
use common\models\Nominas;

/**
 * Default controller for the `mantenimiento` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('index');
    }


    public function actionChanged(){
      //------- Cambio de Nomina ----
      $model= new Nominas();
          return $this->renderAjax('changed',['model'=>$model]);
    }
}
