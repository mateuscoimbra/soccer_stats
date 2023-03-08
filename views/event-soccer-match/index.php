<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RelEventSoccerMatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Event soccer matches');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-event-soccer-match-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create event soccer match'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered event soccer matches</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'soccerMatch.soccer_match',
                        'soccerMatch.start_time',
                        'type_time',
                        /* plaerOne */
                        [
                            'value' => 'playerOne.full_name',
                            'attribute' => 'player_one_id',
                            'label' => 'Player one',
                            'filter' => false,
                        ],
                        [
                            'value' => 'clubPlayerOne.club',
                            'attribute' => 'club_player_one_id',
                            'label' => 'Club player one',
                            'filter' => false,
                        ],
                        [
                            'value' => 'eventTypeOne.event_type',
                            'attribute' => 'event_type_one_id',
                            'label' => 'Event type player one',
                            'filter' => false,
                        ],
                        /* plaerTwo */
                        [
                            'value' => 'playerTwo.full_name',
                            'attribute' => 'player_two_id',
                            'label' => 'Player two',
                            'filter' => false,
                        ],
                        [
                            'value' => 'clubPlayerTwo.club',
                            'attribute' => 'club_player_two_id',
                            'label' => 'Club player two',
                            'filter' => false,
                        ],
                        [
                            'value' => 'eventTypeTwo.event_type',
                            'attribute' => 'event_type_two_id',
                            'label' => 'Event type player two',
                            'filter' => false,
                        ],
                        //'soccer_match_id',
                        //'player_one_id',
                        //'player_two_id',
                        //'club_player_one_id',
                        //'club_player_two_id',
                        //'event_type_one_id',
                        //'event_type_two_id',
                        'event_time_exactly',
                        'event_time_start',
                        'event_time_end',
                        //'created_by',
                        //'created_at',
                        //'updated_by',
                        //'updated_at',

                        ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update} {delete}', 'header'=>'Actions',],
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-bordered'],
                ]); ?>
                
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    <?php Pjax::end(); ?>
    </div>
    <!-- /.card -->
</div>
<!-- /.player-index -->
