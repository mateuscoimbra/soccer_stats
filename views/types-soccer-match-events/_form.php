<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TypesSoccerMatchEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="types-soccer-match-events-form">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'event_type')->textInput(['maxlength' => true]) ?>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['types-soccer-match-events/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.types-soccer-match-events-form-form -->
