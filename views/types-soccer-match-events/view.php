<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypesSoccerMatchEvents */

$this->title = $model->event_type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Types Soccer Match Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="types-soccer-match-events-view">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'event_type',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['types-soccer-match-events/index'], ['class' => 'btn btn-secondary']) ?>
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

</div><!-- /.types-soccer-match-events-view -->