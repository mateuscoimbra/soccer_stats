<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueCompetition */

$this->title = Yii::t('app', 'Create League/Competition');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'League/Competitions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-competition-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
