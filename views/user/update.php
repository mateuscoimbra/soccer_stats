<?php

use yii\helpers\Html;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Update User: {name}', [
    'name' => $model->username,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
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
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
