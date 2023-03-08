<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'cell_phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->dropDownList([ 'Ativo' => 'Ativo', 'Inativo' => 'Inativo', ], ['prompt' => 'Select status']) ?>

                <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showUpload' => true,
                        'initialPreview' => [
                            $model->img ? Html::img('data:image/*;base64,' . $model->img, ['width' => '200']) : null, // checks the models to display the preview
                        ],
                        'overwriteInitial' => false,
                    ]
                    
                ]); ?>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['user/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.user-form -->
