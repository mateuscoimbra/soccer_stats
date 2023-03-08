<?php
/* yii components */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* yii assets & models */
use app\models\Country;

/* @var $this yii\web\View */
/* @var $model app\models\Stadium */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stadium-form">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'stadium')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'capacity')->textInput() ?>

                <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','country_name'),['prompt'=>'Select Country'])->label('Country'); ?>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['country/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.stadium-form -->
