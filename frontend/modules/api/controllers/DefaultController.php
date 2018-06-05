<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\Bienes;
use common\models\UnidadesAdmin;
use common\models\Responsables;
use common\models\Lineas;
use yii\db\Query;
use yii\helpers\Json;

/**
 * Default controller for the `Api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBienFind($id){

              $query = new Query;
              // compose the query
              $query->select('*')->where(['codigo'=>'PGEB-BM-' . $id])
                  ->from('vw_find_bien_app');
              // build and execute the query
              $rows = $query->all();
              // alternatively, you can create DB command and execute it
              $command = $query->createCommand();
              // $command->sql returns the actual SQL
              $rows = $command->queryAll();
              return Json::encode($rows);
    }

    public function actionBienFindOld($id){

              $query = new Query;
              // compose the query
              $query->select('*')->where(['old_cod'=> $id])
                  ->from('vw_find_bien_app');
              // build and execute the query
              $rows = $query->all();
              // alternatively, you can create DB command and execute it
              $command = $query->createCommand();
              // $command->sql returns the actual SQL
              $rows = $command->queryAll();
              return Json::encode($rows);
    }


    public function actionBienFindCodigo($id){
      $b=Bienes::findOne(['codigo'=>'PGEB-BM-'.$id]);
        return Json::encode($b);
    }


    public function actionUnidadesList(){
      $und=UnidadesAdmin::find()->all();
      return Json::encode($und);
    }

    public function actionLineasList(){
      $list=Lineas::find()->all();
      return Json::encode($list);
    }

    public function actionRespList(){
      $list=Responsables::find()->all();
      return Json::encode($list);
    }
}
