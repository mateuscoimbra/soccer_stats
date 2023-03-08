<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\PortalsegurancaUsuario */

$this->title = Yii::t('app', 'User profile registration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
if(!empty($session->getFlash('success_profiles'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Congratulations!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_profiles'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="register-profile-form">
    <div class="card card-secondary">
        <form action="" method="post">
            <div class="card-header">
                <h3 class="card-title">Registration data</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <!-- form start -->
            
                    <div class="form-group">
                        <label for="perfil">Profile</label>
                        <input type="text" name="perfil" id="perfil" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="perfil">Parent profile</label>
                        <select name="perfil_pai" id="perfil_api" class="form-control">
                            <option value="">Select</option>
                            <?php foreach($perfis as $perfil) :?>
                                <option value="<?php echo $perfil->name?>"><?php echo $perfil->name?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                
            </div><!-- /.card-body -->
            <div class="card-footer">
                <?= Html::a('Back', ['/user-permission/profile'], ['class'=>'btn btn-default']) ?>
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam?>" value="<?php echo Yii::$app->request->csrfToken?>">
                <button type="submit" class="btn btn-success pull-right" >Save</button>
            </div><!-- /.card-footer -->
        </form>
    </div><!-- /.card -->
</div><!-- /.register-profile-form -->
