<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerPosition */

$this->title = Yii::t('app', 'Update Player Position: {name}', [
    'name' => $model->player_position,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Player Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->player_position, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="player-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
