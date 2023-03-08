<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Player */

$this->title = Yii::t('app', 'Update Player: {name}', [
    'name' => $model->full_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$session = Yii::$app->session;
if(!empty($session->getFlash('error_player'))) {
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Oh snap!',
        'icon' => 'fas fa-times-circle',
        'body' => $session->getFlash('error_player'),
        'showSeparator' => true,
        'delay' => 7000
    ]);
}
?>
<div class="player-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
