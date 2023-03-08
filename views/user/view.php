<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$session = Yii::$app->session;
if(!empty($session->getFlash('success_user'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_user'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}


?>
<div class="user-view">
    
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'username',
                    [
                        'attribute' => 'img',
                        'value' => 'data:image/jpeg;base64,' . $model->img,
                        'format' => ['image', ['width' => '150', 'height' => '150']],
                        'label' => 'User image',
                    ],
                    'cell_phone',
                    'email:email',
                    //'access_token',
                    //'date_access_token',
                    //'password_reset_token',
                    //'is_validate',
                    'status',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['user/index'], ['class' => 'btn btn-secondary']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
            
        </div><!-- /.card-footer -->

    </div><!-- /.card -->

</div><!-- /.user-view -->
