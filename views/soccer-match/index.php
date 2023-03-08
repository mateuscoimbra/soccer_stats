<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SoccerMatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Soccer Matches');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-match-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Soccer Match'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered soccer matches</h3>
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
                        //'club_one_id',
                        [
                            'value' => 'clubOne.club',
                            'attribute' => 'club_one_id',
                            'label' => 'Clube one',
                            'filter' => false,
                        ],
                        //'club_two_id',
                        [
                            'value' => 'clubTwo.club',
                            'attribute' => 'club_two_id',
                            'label' => 'Clube two',
                            'filter' => false,
                        ],
                        //'club_field_command',
                        'start_time',
                        'end_time',
                        //'stadium_id',
                        [
                            'value' => 'stadium.stadium',
                            'attribute' => 'stadium_id',
                            'label' => 'Stadium',
                            'filter' => false,
                        ],
                        //'league_competition_id',
                        [
                            'value' => 'leagueCompetition.league_competition',
                            'attribute' => 'league_competition_id',
                            'label' => 'League/competition',
                            'filter' => false,
                        ],
                        //'result',
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
<!-- /.soccer-match-index -->
