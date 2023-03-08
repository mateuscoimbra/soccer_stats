<?php
/* yii components */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* yii assets & models */
use app\models\SoccerMatch;
use app\models\Player;
use app\models\Club;
use app\models\TypesSoccerMatchEvents;
/* yii kartik */
use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\RelEventSoccerMatch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-event-soccer-match-form">


    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'soccer_match_id')->dropDownList(ArrayHelper::map(SoccerMatch::find()->all(),'id','soccer_match'),['prompt'=>'Select soccer match'])->label('Soccer match'); ?>

                <?= $form->field($model, 'type_time')->dropDownList([ 'Regular first time' => 'Regular first time', 'Regular second time' => 'Regular second time', 'Regular first half additions' => 'Regular first half additions', 'Regular time additions' => 'Regular time additions', 'First half overtime' => 'First half overtime', 'Second half overtime' => 'Second half overtime', 'First half overtime additions' => 'First half overtime additions', 'Second half overtime additions' => 'Second half overtime additions', 'Penalties' => 'Penalties', ], ['prompt' => 'Select type time']) ?>

                <?= $form->field($model, 'player_one_id')->dropDownList(ArrayHelper::map(Player::find()->all(),'id','full_name'),['prompt'=>'Select player one'])->label('Player one'); ?>

                <?= $form->field($model, 'club_player_one_id')->dropDownList(ArrayHelper::map(Club::find()->all(),'id','club'),['prompt'=>'Select club player one'])->label('Club player one'); ?>

                <?= $form->field($model, 'event_type_one_id')->dropDownList(ArrayHelper::map(TypesSoccerMatchEvents::find()->all(),'id','event_type'),['prompt'=>'Select event type one'])->label('Event type one'); ?>

                <?= $form->field($model, 'player_two_id')->dropDownList(ArrayHelper::map(Player::find()->all(),'id','full_name'),['prompt'=>'Select player two'])->label('Player two'); ?>

                <?= $form->field($model, 'club_player_two_id')->dropDownList(ArrayHelper::map(Club::find()->all(),'id','club'),['prompt'=>'Select club player two'])->label('Club player two'); ?>

                <?= $form->field($model, 'event_type_two_id')->dropDownList(ArrayHelper::map(TypesSoccerMatchEvents::find()->all(),'id','event_type'),['prompt'=>'Select event type two'])->label('Event type two'); ?>

                <?= $form->field($model, 'event_time_exactly')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>

                <?= $form->field($model, 'event_time_start')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>

                <?= $form->field($model, 'event_time_end')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['event-soccer-match/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.rel-event-soccer-match--form -->
