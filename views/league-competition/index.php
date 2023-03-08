<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LeagueCompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'League/Competitions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-competition-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create League/Competition'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered league/competitions</h3>
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
                        //'league_competition',
                        [
                            'value' => 'league_competition',
                            'attribute' => 'league_competition',
                            'label' => 'League/Competition',
                        ],

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
<!-- /.league-competition-index -->
