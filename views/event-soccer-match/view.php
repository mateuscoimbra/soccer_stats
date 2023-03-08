<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\RelEventSoccerMatch */

$this->title = $model->eventTypeOne->event_type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rel Event Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$session = Yii::$app->session;
if(!empty($session->getFlash('success_event'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Congratulations!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('success_event'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="rel-event-soccer-match-view">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                        //'id',
                        'soccerMatch.soccer_match',
                        'soccerMatch.start_time',
                        'type_time',
                        /* plaerOne */
                        [
                            'value' => 'playerOne.full_name',
                            'attribute' => 'player_one_id',
                            'label' => 'Player one',
                        ],
                        [
                            'value' => 'clubPlayerOne.club',
                            'attribute' => 'club_player_one_id',
                            'label' => 'Club player one',
                        ],
                        [
                            'value' => 'eventTypeOne.event_type',
                            'attribute' => 'event_type_one_id',
                            'label' => 'Event type player one',
                        ],
                        /* plaerTwo */
                        [
                            'value' => 'playerTwo.full_name',
                            'attribute' => 'player_two_id',
                            'label' => 'Player two',
                        ],
                        [
                            'value' => 'clubPlayerTwo.club',
                            'attribute' => 'club_player_two_id',
                            'label' => 'Club player two',
                        ],
                        [
                            'value' => 'eventTypeTwo.event_type',
                            'attribute' => 'event_type_two_id',
                            'label' => 'Event type player two',
                        ],
                    'event_time_exactly',
                    'event_time_start',
                    'event_time_end',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['event-soccer-match/index'], ['class' => 'btn btn-secondary']) ?>
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
