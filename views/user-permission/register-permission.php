<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\PortalsegurancaUsuario */

$this->title = Yii::t('app', 'Register user permission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Permission'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
if(!empty($session->getFlash('success_permission'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Congratulations!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_permission'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="register-permission-form">
    <div class="card card-secondary">
        <form action="" method="post">
            <div class="card-header">
                <h3 class="card-title">Registration data</h3>
            </div><!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label for="permissao">Permission</label>
                    <input type="text" name="permissao" id="permissao" class="form-control">
                </div>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <?= Html::a('Back', ['/user-permission/permission'], ['class'=>'btn btn-default']) ?>
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam?>" value="<?php echo Yii::$app->request->csrfToken?>">
                <button type="submit" class="btn btn-success pull-right" >Save</button>
            </div><!-- /.card-footer -->
        </form>
    </div><!-- /.card -->
</div><!-- /.register-permission-form -->
