<?php
use yii\grid\GridView;
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Users Permissions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-index">
    <p>
        <?= Yii::$app->user->can('Portal_Seguranca-Cadastrar-Permissao') ? (Html::a('Register permission', ['/portal-seguranca/permissoes/cadastrar-permissao'], ['class' => 'btn btn-primary pull-right'])) : '';?>
        <?= Html::a('Register permission', ['/user-permission/register-permission'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered permissions</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Permission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont = 1;?>
                    <?php foreach($permissions as $permission):?>    
                        <tr>
                            <td><?= $cont?></th><?php $cont++;?>
                            <td><?php echo $permission->name?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.-index -->