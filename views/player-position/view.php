<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerPosition */

$this->title = $model->player_position;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Player Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="player-position-view">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registry data</h3>
        </div><!-- /.card-header -->

        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'player_position',
                ],
            ]) ?>

        </div><!-- /.card-body -->

        <div class="card-footer">

            <?= Html::a(Yii::t('app', 'Back'), ['player-position/index'], ['class' => 'btn btn-secondary']) ?>
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

</div><!-- /.player-position-view -->