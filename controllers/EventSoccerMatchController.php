<?php

namespace app\controllers;

use app\models\RelEventSoccerMatch;
use app\models\search\RelEventSoccerMatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use yii\db\Expression;

/**
 * EventSoccerMatchController implements the CRUD actions for RelEventSoccerMatch model.
 */
class EventSoccerMatchController extends Controller
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
     * Lists all RelEventSoccerMatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RelEventSoccerMatchSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RelEventSoccerMatch model.
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
     * Creates a new RelEventSoccerMatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RelEventSoccerMatch();
        $session = Yii::$app->session;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_at = new Expression('NOW()');
                $model->created_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
                if($model->save()){
                    $session->setFlash("success_event", "Event Soccer Match created successfully");
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
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
            $session->setFlash("error_event", "$stringError");
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RelEventSoccerMatch model.
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
            if($model->save()){
                $session->setFlash("success_event", "Event Soccer Match updated successfully");
                return $this->redirect(['view', 'id' => $model->id]);
            }
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
            $session->setFlash("error_event", "$stringError");
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RelEventSoccerMatch model.
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
     * Finds the RelEventSoccerMatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RelEventSoccerMatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RelEventSoccerMatch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
