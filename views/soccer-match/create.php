<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\SoccerMatch */

$this->title = Yii::t('app', 'Create Soccer Match');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soccer Matches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
<div class="soccer-match-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


