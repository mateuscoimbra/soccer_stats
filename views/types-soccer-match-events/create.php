<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypesSoccerMatchEvents */

$this->title = Yii::t('app', 'Create Types Soccer Match Events');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Types Soccer Match Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-soccer-match-events-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
