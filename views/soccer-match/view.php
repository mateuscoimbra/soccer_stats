<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\SoccerMatch */

$this->title = $model->clubOne->club . ' VS ' . $model->clubTwo->club;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$session = Yii::$app->session;
if(!empty($session->getFlash('success_soccer'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_soccer'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="soccer-match-view">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">
            
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    //'clubOne.club',
                    [
                        'attribute' => 'club_one_id',
                        'value' => $model->clubOne->club,
                        'label' => 'Club one',
                    ],
                    //'clubTwo.club',
                    [
                        'attribute' => 'club_two_id',
                        'value' => $model->clubTwo->club,
                        'label' => 'Club two',
                    ],
                    'club_field_command',
                    'start_time',
                    'end_time',
                    'stadium.stadium',
                    'leagueCompetition.league_competition',
                    'result',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['soccer-match/index'], ['class' => 'btn btn-secondary']) ?>
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

</div><!-- /.soccer-match-view -->