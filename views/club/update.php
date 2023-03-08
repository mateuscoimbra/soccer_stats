<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = Yii::t('app', 'Update Club: {name}', [
    'name' => $model->club,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->club, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="club-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
