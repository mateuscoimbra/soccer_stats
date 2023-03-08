<?php
/* yii components */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* yii assets & models */
use app\models\Country;
use app\models\PlayerPosition;
/* yii kartik */
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'birth_date')->widget(DateControl::classname(), [
                    'type'=>DateControl::FORMAT_DATE,
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    //'ajaxConversion'=>false,
                    'widgetOptions' => [
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]
                ]); ?>

                <?= $form->field($model, 'image_profile')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showUpload' => true,
                        'initialPreview' => [
                            $model->image_profile ? Html::img('data:image/*;base64,' . $model->image_profile, ['width' => '200']) : null, // checks the models to display the preview
                        ],
                        'overwriteInitial' => false,
                    ]
                    
                ]); ?>

                <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'strong_foot')->dropDownList([ 'Right' => 'Right', 'Left' => 'Left', 'Ambidextrous' => 'Ambidextrous', ], ['prompt' => 'Select']) ?>

                <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','country_name'),['prompt'=>'Select Country'])->label('Country'); ?>

                <?= $form->field($model, 'position_id')->dropDownList(ArrayHelper::map(PlayerPosition::find()->all(),'id','player_position'),['prompt'=>'Select player position'])->label('Player position'); ?>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['player/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.player-form -->
