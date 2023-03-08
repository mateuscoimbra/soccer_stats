<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\RelEventSoccerMatch */

$this->title = Yii::t('app', 'Create Rel Event Soccer Match');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rel Event Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
<div class="rel-event-soccer-match-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
