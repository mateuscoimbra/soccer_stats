<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Players');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Player'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered players</h3>
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
                        'full_name',
                        'birth_date',
                        'birthplace',
                        'height',
                        'weight',
                        [
                            'value' => 'country.country_name',
                            'attribute' => 'country_id',
                            'label' => 'Country',
                            'filter' => false,
                        ],
                        [
                            'value' => 'position.player_position',
                            'attribute' => 'position_id',
                            'label' => 'Position',
                            'filter' => false,
                        ],
                        //'image_profile',
                        [
 
                            'attribute' => 'image_profile',
                            'format' => 'raw',
                            'filter' => false,
                            'value' => function ($data) {
                                if (!empty($data['image_profile'])) {
                                    return "<img src='data:image/jpeg;base64,". $data['image_profile']."'width='70px' height='70px'/>";
                                }
                                return "Not choosen";
                            },
                    
                        ],
                        //'strong_foot',
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
