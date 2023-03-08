<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Player */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$session = Yii::$app->session;
if(!empty($session->getFlash('created_player'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('created_player'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
if(!empty($session->getFlash('update_player'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('update_player'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}


?>
<div class="player-view">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">
            
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'image_profile',
                        'value' => 'data:image/jpeg;base64,' . $model->image_profile,
                        'format' => ['image', ['width' => '150', 'height' => '150']]
                    ],
                    //'id',
                    'full_name',
                    'birth_date',
                    'birthplace',
                    'height',
                    'weight',
                    'country.country_name',
                    'position.player_position',
                    'strong_foot',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['player/index'], ['class' => 'btn btn-secondary']) ?>
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

</div><!-- /.player-view -->
