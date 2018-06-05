<?php

namespace frontend\modules\proveduria\controllers;

use Yii;
use common\models\ProvCompras;
use common\models\ProvComprasDt;
use common\models\ProvComprasSerach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\ProvArticulos;
use  yii\db\Query;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * ProvComprasController implements the CRUD actions for ProvCompras model.
 */
class ProvComprasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProvCompras models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvComprasSerach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProvCompras model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

      $model=$this->findModel($id);
      // Check if there is an Editable ajax request
if (isset($_POST['hasEditable'])) {
  // use Yii's response format to encode output as JSON
  \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

  // read your posted model attributes

  if (isset($_POST['id_prov'])) {
      // read or convert your posted information
      $model->id_prov=$_POST['id_prov'];
      $model->save();
      $value = $model->prov->razon;

      // return JSON encoded output in the below format
      return ['output'=>$value, 'message'=>''];

      // alternatively you can return a validation error
      // return ['output'=>'', 'message'=>'Validation error'];
  }


  if (isset($_POST['motivo'])) {
      // read or convert your posted information
      $model->motivo=$_POST['motivo'];
      $model->save();
      $value = $model->motivo;

      // return JSON encoded output in the below format
      return ['output'=>$value, 'message'=>''];

      // alternatively you can return a validation error
      // return ['output'=>'', 'message'=>'Validation error'];
  }

  if (isset($_POST['num_fact'])) {
      // read or convert your posted information
      $model->num_fact=$_POST['num_fact'];
      $model->save();
      $value = $model->num_fact;

      // return JSON encoded output in the below format
      return ['output'=>$value, 'message'=>''];

      // alternatively you can return a validation error
      // return ['output'=>'', 'message'=>'Validation error'];
  }

  // else if nothing to do always return an empty JSON encoded output
  else {
      return ['output'=>'', 'message'=>''];
  }
}

        $this->layout="layout_clear";
        return $this->render('view', [
            'model' => $model,

        ]);
    }

    /**
     * Creates a new ProvCompras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProvCompras();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout="main";
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionNew(){
      $model=new ProvCompras();
      $dt=new ProvComprasDt();
      $this->layout="layout_clear";
      return $this->render('new_trans', [
          'model' => $model,
            'dt'=>$dt,
      ]);
    }


    public function actionArticulosList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'ref' => '','descripcion'=>'','existencias'=>'']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('*')
            ->from('prov_articulos')
            ->where(['like', 'descripcion', strtoupper($q)])
            //->where(['id_und_actual'=>$id_und])
            ->limit(40);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'ref'=>ProvArticulos::find($id)->ref,
        'descripcion' => ProvArticulos::find($id)->descripcion,
        'existencias' => ProvArticulos::find($id)->existencias
      ];
    }
    return $out;
}

    /**
     * Updates an existing ProvCompras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->layout="main";
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProvCompras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProvCompras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProvCompras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProvCompras::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
