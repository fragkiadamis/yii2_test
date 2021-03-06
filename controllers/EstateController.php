<?php

namespace app\controllers;

use Yii;
use app\models\Estate;
use app\models\EstateSearch;
use app\models\Client;
use app\models\Landtype;
use app\models\Area;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstateController implements the CRUD actions for Estate model.
 */
class EstateController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Estate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Estate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estate();

        if ($model->load(Yii::$app->request->post())) {
            // Claculate estate's value
            $model->calculateValue($model);

            // Save and redirect
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'clients' => Client::find()->select(['firstName'])->indexBy('id')->column(),
            'landTypes' => Landtype::find()->select(['name'])->indexBy('id')->column(),
            'areas' => Area::find()->select(['name'])->indexBy('id')->column()
        ]);
    }

    /**
     * Updates an existing Estate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // Claculate estate's value
            $model->calculateValue($model);

            // Save and redirect
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'clients' => Client::find()->select(['firstName'])->indexBy('id')->column(),
            'landTypes' => Landtype::find()->select(['name'])->indexBy('id')->column(),
            'areas' => Area::find()->select(['name'])->indexBy('id')->column()
        ]);
    }

    /**
     * Deletes an existing Estate model.
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
     * Finds the Estate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estate::findOne($id)) !== null) {
            $model->getClient();
            $model->getArea();
            $model->getLandType();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
