<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Player */

$this->title = Yii::t('app', 'Create Player');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Players'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
<div class="player-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
