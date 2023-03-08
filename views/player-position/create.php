<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerPosition */

$this->title = Yii::t('app', 'Create Player Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Player Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-position-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
