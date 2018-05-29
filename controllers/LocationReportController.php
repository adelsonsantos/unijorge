<?php

namespace app\controllers;

use app\models\UnijorgeLocationReport;
use Yii;
use app\models\LocationReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationReportController implements the CRUD actions for Location model.
 */
class LocationReportController extends Controller
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

    public function actionTrajetory(){

        $model = Yii::$app->request->get();
        $result = UnijorgeLocationReport::find()->where(['device_id' => $model['device_id']])->andWhere(['>=', 'location_data', $model['location_data_report_inicio']])->all();
        //d($result);
        return $result;
    }

    /**
     * Lists all UnijorgeLocationReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new UnijorgeLocationReport();

        if (Yii::$app->request->get()) {
            $model = Yii::$app->request->get();
            $result = UnijorgeLocationReport::find()->where(['device_id' => $model['device_id']])->andWhere(['>=', 'location_data', $model['location_data_report_inicio']])->all();
            return
                $this->render('index', [
                    'model' => $model
                ]);
        }
        return $this->render('index', [

            'model' => $model
        ]);
    }

    /**
     * Displays a single UnijorgeLocationReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UnijorgeLocationReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UnijorgeLocationReport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UnijorgeLocationReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UnijorgeLocationReport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Location model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UnijorgeLocationReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UnijorgeLocationReport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
