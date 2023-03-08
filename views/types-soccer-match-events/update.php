<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypesSoccerMatchEvents */

$this->title = Yii::t('app', 'Update Types Soccer Match Events: {name}', [
    'name' => $model->event_type,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Types Soccer Match Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_type, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="types-soccer-match-events-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
