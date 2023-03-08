<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\RelEventSoccerMatch */

$this->title = Yii::t('app', 'Update event Soccer Match: {name}', [
    'name' => $model->eventTypeOne->event_type,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Event Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventTypeOne->event_type, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$session = Yii::$app->session;
if(!empty($session->getFlash('error_user'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('error_user'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="rel-event-soccer-match-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
