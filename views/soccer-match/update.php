<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\SoccerMatch */

$this->title = Yii::t('app', 'Update Soccer Match: {name}', [
    'name' => $model->clubOne->club . ' VS ' . $model->clubTwo->club,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clubOne->club . ' VS ' . $model->clubTwo->club, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$session = Yii::$app->session;
if(!empty($session->getFlash('error_soccer'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('error_soccer'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}

?>
<div class="soccer-match-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
