<?php

namespace app\controllers;

use app\models\AuthAssignment;
use app\models\search\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class UserPermissionController extends Controller
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
                    'only' => ['permission', 'rule', 'profile', 'register-profiles', 'register-permission'],
                    'rules' => [
                        [
                            'actions' => ['permission', 'rule', 'profile', 'register-profiles', 'register-permission'],
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

    public function actionPermission()
    {
        $auth = Yii::$app->authManager;
        $permissions = $auth->getPermissions();
        return $this->render('permission', [
            'permissions' => $permissions
        ]);
    }

    public function actionRule($perfil)
    {
        
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($perfil);
        if (!$perfil || empty($role) ) {
            return $this->redirect('/site/error');
        }

        $permissoes = $auth->getPermissionsByRole($perfil);
        $permissoes_perfil = [];

        foreach ( $permissoes as $permissao) {
            $permissoes_perfil[] = $permissao->name;
        }

        $permissoes = $auth->getPermissions();

        if(Yii::$app->request->isPost) {
            $auth->removeChildren($role);
            $permissoes_form = Yii::$app->request->post('permissoes');
            foreach($permissoes_form as $perm) {
                $item = $auth->getPermission($perm);
                $auth->addChild($role, $item);
            }
            return $this->redirect('/user-permission/profile');
        }
        return $this->render('rule', [
            'permissoes_perfil' => $permissoes_perfil,
            'permissoes' => $permissoes
        ]);
    }

    public function actionProfile()
    {
        $auth = Yii::$app->authManager;
        $perfis = $auth->getRoles();
        return $this->render('profile', [
            'perfis' => $perfis
        ]);
    }

    public function actionRegisterProfiles()
    {
        $auth = Yii::$app->authManager;
        $perfis = $auth->getRoles();
        $session = Yii::$app->session;
        if( Yii::$app->request->isPost ) {
            $perfil = Yii::$app->request->post('perfil');
            $perfil_pai= Yii::$app->request->post('perfil_pai');
            $perfil = $auth->createRole($perfil);
            $auth->add($perfil);
            $session->setFlash('success_profiles', "Successfully created profile $perfil without parent");
            if (!empty($perfil_pai)) {
                $perfil_pai = $auth->getRole($perfil_pai);
                $auth->addChild($perfil_pai, $perfil);
                $session->setFlash('success_profiles', "Successfully created profile $perfil with parent $perfil_pai");
            }
        }
        return $this->render('register-profiles', [
            'perfis' => $perfis
        ]);
    }

    public function actionDeleteProfile($profile)
    {
        $session = Yii::$app->session;
        $auth = Yii::$app->authManager;
        $child = $auth->getChildRoles('Dashboard');
        var_dump( $child['Dashboard']->name);
        //die();
        if($auth->remove($child['Dashboard']->name)){
            $msgSuccess = "Profile ".$profile." deleted successfully";
            $session->setFlash('success_delete_profile', $msgSuccess);
            return $this->redirect(['profile']);
        }else {
            $msgError = "An error occurred while deleting profile ".$profile;
            $session->setFlash('error_delete_profile', $msgError);
            return $this->redirect(['profile']);
        }
        
    }
    public function actionRegisterPermission()
    {
        $auth = Yii::$app->authManager;
        $session = Yii::$app->session;
        if( Yii::$app->request->isPost ) {
            $permissao = Yii::$app->request->post('permissao');
            $permissao = $auth->createPermission($permissao);
            if($auth->add($permissao)) {
                $session->setFlash('success_permission', "Permission created successfully");
            }
        }
        return $this->render('register-permission');
    }
}
