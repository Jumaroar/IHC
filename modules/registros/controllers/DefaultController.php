<?php

namespace app\modules\registros\controllers;

use Yii;
use app\models\Userauthlog;
use app\models\UserauthlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
/**
 * DefaultController implements the CRUD actions for Userauthlog model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */

    
    public function behaviors()
    {
        return [
           'access'=>[                
                'class' => AccessControl::className(), 
                'only'=>['view','index'],
                'rules'=>[
                    [    
                        'allow'=>true,
                        'actions'=>['view','index'],
                        'roles'=>['Cajero'],
                    ]
                 ],                                    
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Userauthlog models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new UserauthlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Userauthlog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Userauthlog #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default ','data-dismiss'=>"modal"])
                            
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    
    

  

    /**
     * Finds the Userauthlog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userauthlog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userauthlog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
