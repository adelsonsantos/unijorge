<?php

namespace app\controllers;

use app\models\FenceCoordenada;
use Yii;
use app\models\Fence;
use app\models\FenceSearch;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\db\StaleObjectException;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * FenceController implements the CRUD actions for Fence model.
 */
class FenceController extends Controller
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
     * Lists all Fence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fence model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Fence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fence();
        $modelFenceCoord = [new FenceCoordenada];
        if ($model->load(Yii::$app->request->post())) {
            $modelFenceCoord = Model::createMultiple(FenceCoordenada::classname());
            Model::loadMultiple($modelFenceCoord, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelFenceCoord),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelFenceCoord) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelFenceCoord as $modelCoord) {
                            $modelCoord->fence_id = $model->fence_id;

                            if (($flag = $modelCoord->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->fence_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelFenceCoord' => (empty($modelFenceCoord)) ? [new FenceCoordenada] : $modelFenceCoord
        ]);
    }

    /**
     * Updates an existing Fence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldCoordsIds = FenceCoordenada::find()->where(['fence_id' => $id])->asArray()->all();
        $oldmultiploRoteiroIds = ArrayHelper::getColumn($oldCoordsIds, 'fence_id');
        $modelFenceCoord = FenceCoordenada::findAll(['fence_id' => $oldmultiploRoteiroIds]);

        if ($model->load(Yii::$app->request->post())) {
            $modelFenceCoord = Model::createMultiple(FenceCoordenada::classname());
            Model::loadMultiple($modelFenceCoord, Yii::$app->request->post());
            $modelsOlds = FenceCoordenada::find()->where(['fence_id' => $id])->all();

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelFenceCoord),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelFenceCoord) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    foreach ($modelsOlds as $value) {
                        try {
                            $this->findModelFenceCoordenada($value->fence_coord_id)->delete();
                        } catch (StaleObjectException $e) {
                        } catch (NotFoundHttpException $e) {
                        } catch (\Throwable $e) {
                        }
                    }
                    if ($flag = $model->save(false)) {
                        foreach ($modelFenceCoord as $modelCoord) {
                            $modelCoord->fence_id = $model->fence_id;

                            if (($flag = $modelCoord->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->fence_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
            'modelFenceCoord' => (empty($modelFenceCoord)) ? [new FenceCoordenada] : $modelFenceCoord
        ]);
    }

    /**
     * Deletes an existing Fence model.
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
     * Finds the Fence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fence::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelFenceCoordenada($id)
    {
        if (($model = FenceCoordenada::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
