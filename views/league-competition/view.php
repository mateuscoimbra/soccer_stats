<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueCompetition */

$this->title = $model->league_competition;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'League/Competitions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="league-competition-view">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">
            
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'league_competition',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['league-competition/index'], ['class' => 'btn btn-secondary']) ?>
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

</div><!-- /.league-competition-view -->
