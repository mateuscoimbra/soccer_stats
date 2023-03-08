<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueCompetition */

$this->title = Yii::t('app', 'Update League/Competition: {name}', [
    'name' => $model->league_competition,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'League/Competitions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->league_competition, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="league-competition-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
