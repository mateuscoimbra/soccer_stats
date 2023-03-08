<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\RelEventSoccerMatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-event-soccer-match-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_time') ?>

    <?= $form->field($model, 'soccer_match_id') ?>

    <?= $form->field($model, 'player_one_id') ?>

    <?= $form->field($model, 'player_two_id') ?>

    <?php // echo $form->field($model, 'club_player_one_id') ?>

    <?php // echo $form->field($model, 'club_player_two_id') ?>

    <?php // echo $form->field($model, 'event_type_one_id') ?>

    <?php // echo $form->field($model, 'event_type_two_id') ?>

    <?php // echo $form->field($model, 'event_time_exactly') ?>

    <?php // echo $form->field($model, 'event_time_start') ?>

    <?php // echo $form->field($model, 'event_time_end') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
