<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Country'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered countries</h3>
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
                        //'phone_code',
                        [
                            'value' => 'phone_code',
                            'attribute' => 'phone_code',
                            'label' => 'Phone code',
                        ],
                        //'country_code',
                        [
                            'value' => 'country_code',
                            'attribute' => 'country_code',
                            'label' => 'Country code',
                        ],
                        //'country_name',
                        [
                            'value' => 'country_name',
                            'attribute' => 'country_name',
                            'label' => 'Country name',
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
<!-- /.country-index -->
