<?php

use yii\grid\GridView;
use yii\bootstrap4\Html;
use kartik\alert\Alert;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User profiles');
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
if(!empty($session->getFlash('success_delete_profile'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Congratulations!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_delete_profile'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
} 
if(!empty($session->getFlash('error_delete_profile'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('error_delete_profile'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="profile-index">
    <p>
        <?= Yii::$app->user->can('Portal_Seguranca-Cadastrar-Permissao') ? (Html::a('Register profile', ['/portal-seguranca/permissoes/cadastrar-permissao'], ['class' => 'btn btn-primary pull-right'])) : '';?>
        <?= Html::a('Register profile', ['/user-permission/register-profiles'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered user profiles</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <?= Yii::$app->user->can('Portal_Seguranca-Cadastrar-Perfil') ? Html::a('Cadastrar Perfil', ['/user-permission/rule'], ['class' => 'btn btn-primary pull-right'] ) : '' ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Assign permission</th>
                        <th scope="col">Delete profile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont = 1;?>
                    <?php foreach($perfis as $perfil) :?>
                        <tr>
                            <td><?= $cont?></th><?php $cont++;?>
                            <td><?php echo $perfil->name?></td>
                            <td><?= Html::a('Add Rule', ['/user-permission/rule', 'perfil' => $perfil->name], ['class' => 'btn btn-warning'] ) ?></td>
                            <td><?= Html::a('Delete Profile', ['/user-permission/delete-profile', 'profile' => $perfil->name], ['class' => 'btn btn-danger'] ) ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.profile-index -->