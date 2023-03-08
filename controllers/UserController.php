<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\db\Expression;
use yii\helpers\Url;
use app\helps\Image64;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $session = Yii::$app->session;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $post = Yii::$app->request->post('User');
            $verifica_upload_foto = UploadedFile::getInstance($model, 'img');        
            if ($verifica_upload_foto != NULL) {
                $helpImg = new Image64();
                $fotoServidor =  $helpImg->imgBase64($model, 'img');
                if($fotoServidor) {
                    $model->password = Yii::$app->security->generatePasswordHash($post['password']);
                    $model->img = $fotoServidor;
                    $model->access_token = Yii::$app->security->generateRandomString();
                    $model->date_access_token = date('Y-m-d');
                    $model->password_reset_token = Yii::$app->security->generateRandomString();
                    $model->is_validate = 0;
                    $model->created_at = new Expression('NOW()');
                    $model->date_access_token = new Expression('NOW()');
                    if($model->save()) {
                        $dados_email = [
                            'email' => $model->email,
                            'nome' => $model->username,
                            'url_token' => $model->access_token
                        ];
                       /* try {
                            Yii::$app->mailer->compose('new_user', [
                                'dados_email' => $dados_email,
                                'image' => Url::to('@app/web/img/email.jpg')
                            ])
                            ->setFrom(env('MAIL_USERNAME'))
                            ->setTo($dados_email["email"])
                            ->setSubject('Soccer Stats - Registration confirmation')
                            ->send();
                            
                            return $this->redirect(['view', 'id' => $model->id]);
                        }catch(\Exception $e) {
                            echo $e->getMessage();
                            //die();
                        }*/
                        $session->setFlash("created_user", "User created successfully");
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
                        $session->setFlash("error_user", "$stringError");
                    }
                } else {
                    $session->setFlash("error_user", "Error saving image");
                }
            }else {
                $session->setFlash("error_user", "Error saving image");
            }
            
        } else {
            $model->loadDefaultValues();
        }
        $model->password = '';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $img64 = $model->img;
        
        if ($this->request->isPost && $model->load($this->request->post())) {
            $post = Yii::$app->request->post('User');
            $verifica_upload_foto = UploadedFile::getInstance($model, 'img');        
            if ($verifica_upload_foto != NULL) {
                $helpImg = new Image64();
                $fotoServidor =  $helpImg->imgBase64($model, 'img');
                if($fotoServidor) {
                    $model->password = Yii::$app->security->generatePasswordHash($post['password']);
                    $model->img = $fotoServidor;
                    $model->access_token = Yii::$app->security->generateRandomString();
                    $model->date_access_token = date('Y-m-d');
                    $model->password_reset_token = Yii::$app->security->generateRandomString();
                    $model->is_validate = 0;
                    $model->updated_at = new Expression('NOW()');
                    $model->date_access_token = new Expression('NOW()');
                    if($model->save()) {
                        $dados_email = [
                            'email' => $model->email,
                            'nome' => $model->username,
                            'url_token' => $model->access_token
                        ];
                            /* try {
                                $email = Yii::$app->mailer->compose('update_user', [
                                    'dados_email' => $dados_email,
                                    'image' => Url::to('@app/web/img/email.jpg')
                                ])
                                ->setFrom(env('MAIL_USERNAME'))
                                ->setTo($dados_email["email"])
                                ->setSubject('Soccer Stats - Registration confirmation')
                                ->send();
                                //if($email) {
                                    return $this->redirect(['view', 'id' => $model->id]);
                                //}
                            }catch(\Exception $e) {
                                //echo $e->getMessage();
                                $session->setFlash("error_user", "$e->getMessage()");
                                //die();
                            }*/
                        $session->setFlash("success_user", "User created successfully");
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
                        $session->setFlash("error_user", "$stringError");
                    }
                } else {
                    $session->setFlash("error_user", "Error saving image");
                }
            }else {
                $model->password = Yii::$app->security->generatePasswordHash($post['password']);
                $model->img = $img64;
                $model->access_token = Yii::$app->security->generateRandomString();
                $model->date_access_token = date('Y-m-d');
                $model->password_reset_token = Yii::$app->security->generateRandomString();
                $model->is_validate = 0;
                $model->updated_at = new Expression('NOW()');
                $model->date_access_token = new Expression('NOW()');
                if($model->save()) {
                    $dados_email = [
                        'email' => $model->email,
                        'nome' => $model->username,
                        'url_token' => $model->access_token
                    ];
                        /* try {
                            $email = Yii::$app->mailer->compose('update_user', [
                                'dados_email' => $dados_email,
                                'image' => Url::to('@app/web/img/email.jpg')
                            ])
                            ->setFrom(env('MAIL_USERNAME'))
                            ->setTo($dados_email["email"])
                            ->setSubject('Soccer Stats - Registration confirmation')
                            ->send();
                            //if($email) {
                                return $this->redirect(['view', 'id' => $model->id]);
                            //}
                        }catch(\Exception $e) {
                            //echo $e->getMessage();
                            $session->setFlash("error_user", "$e->getMessage()");
                            //die();
                        }*/
                        $session->setFlash("success_user", "User updated successfully");
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
                    $session->setFlash("error_user", "$stringError");
                }
            }
        }
        $model->password = '';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
