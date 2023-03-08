<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stadium */

$this->title = Yii::t('app', 'Update Stadium: {name}', [
    'name' => $model->stadium,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stadium'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stadium, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="stadium-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
