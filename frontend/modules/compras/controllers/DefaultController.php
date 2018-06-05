<?php

namespace frontend\modules\compras\controllers;

use yii\web\Controller;
use common\models\Notificaciones;

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

    public function actionNotificacion($mensaje){
      $this->layout = 'main';
      $model= new Notificaciones();
      $model->tipo=2;
        $model->mensaje=$mensaje;
      return $this->render('notificacion',['model'=>$model]);
    }
}
