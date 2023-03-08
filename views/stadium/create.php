<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stadium */

$this->title = Yii::t('app', 'Create Stadium');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stadium'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stadium-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
