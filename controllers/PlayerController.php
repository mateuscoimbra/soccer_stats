<?php

namespace app\controllers;

use app\models\Player;
use app\models\search\PlayerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\helps\Image64;
use Yii;
use yii\web\UploadedFile;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * PlayerController implements the CRUD actions for Player model.
 */
class PlayerController extends Controller
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
     * Lists all Player models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlayerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Player model.
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
     * Creates a new Player model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Player();
        $session = Yii::$app->session;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $post = Yii::$app->request->post('Player');
            $verifica_upload_foto = UploadedFile::getInstance($model, 'image_profile');        
            if ($verifica_upload_foto != NULL) {
                $helpImg = new Image64();
                $fotoServidor =  $helpImg->imgBase64($model, 'image_profile');
                if($fotoServidor) {
                    $model->image_profile = $fotoServidor;
                    $model->created_at = new Expression('NOW()');
                    $model->created_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
                    if($model->save()) {
                        $session->setFlash("created_player", "User created successfully");
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
                        $session->setFlash("error_player", "$stringError");
                    }
                } else {
                   
                }
            }else {
                $session->setFlash("error_player", "Please select an image / Error saving image");
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Player model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $img64 = $model->image_profile;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $post = Yii::$app->request->post('Player');
            $verifica_upload_foto = UploadedFile::getInstance($model, 'image_profile');        
            if ($verifica_upload_foto === NULL) {
                    $model->updated_at = new Expression('NOW()');
                    $model->updated_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
                    $model->image_profile = $img64;
                    if($model->save()) {
                        $session->setFlash("created_player", "User updated successfully");
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
                        $session->setFlash("error_player", "$stringError");
                    }
            } else {
                $helpImg = new Image64();
                $fotoServidor =  $helpImg->imgBase64($model, 'image_profile');
                if($fotoServidor) {
                    $model->image_profile = $fotoServidor;
                    $model->updated_at = new Expression('NOW()');
                    $model->updated_by = !empty(Yii::$app->user->id) ? Yii::$app->user->id : 1;
                    if($model->save()) {
                        $session->setFlash("created_player", "User updated successfully");
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
                        $session->setFlash("error_player", "$stringError");
                    }
                } else {
                    $session->setFlash("error_player", "Error saving image");//return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Player model.
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
     * Finds the Player model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Player the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Player::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
