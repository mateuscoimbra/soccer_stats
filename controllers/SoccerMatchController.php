<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\models\SoccerMatch;
use app\models\search\SoccerMatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\db\Expression;

/**
 * SoccerMatchController implements the CRUD actions for SoccerMatch model.
 */
class SoccerMatchController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'view', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SoccerMatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SoccerMatchSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SoccerMatch model.
     * @param int $id ID
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
     * Creates a new SoccerMatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SoccerMatch();
        $session = Yii::$app->session;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_at = new Expression('NOW()');
                $model->created_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
                if($model->save()) {
                    $session->setFlash("success_soccer", "Soccer match created successfully");
                    return $this->redirect(['view', 'id' => $model->id]);
                }else {
                    $msgError = $model->getFirstErrors();
                    if(!empty($msgError)) {
                        $stringError = '';
                        foreach($msgError as $error) {
                            if(empty($stringError)) {
                                $stringError = $error;
                            } else {
                                $stringError = $stringError . "<br>" . $error;
                            }
                        }
                    }
                    $session->setFlash("error_soccer", "$stringError");
                }
            } 
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SoccerMatch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated_at = new Expression('NOW()');
            $model->updated_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
            if($model->save()) {
                $session->setFlash("success_soccer", "Soccer match updated successfully");
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $msgError = $model->getFirstErrors();
                if(!empty($msgError)) {
                    $stringError = '';
                    foreach($msgError as $error) {
                        if(empty($stringError)) {
                            $stringError = $error;
                        } else {
                            $stringError = $stringError . "<br>" . $error;
                        }
                    }
                }
                $session->setFlash("error_soccer", "$stringError");
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SoccerMatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SoccerMatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SoccerMatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SoccerMatch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
