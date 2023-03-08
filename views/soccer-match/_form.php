<?php
/* yii components */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* yii assets & models */
use app\models\Club;
use app\models\Stadium;
use app\models\LeagueCompetition;
/* yii kartik */
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SoccerMatch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soccer-match-form">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registration data</h3>
        </div><!-- /.card-header -->

        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
            <div class="card-body">

                <?= $form->field($model, 'club_one_id')->dropDownList(ArrayHelper::map(Club::find()->all(),'id','club'),['prompt'=>'Select club one', 'id' => 'club_one_id'])->label('Club one'); ?>

                <?= $form->field($model, 'club_two_id')->dropDownList(ArrayHelper::map(Club::find()->all(),'id','club'),['prompt'=>'Select club two', 'id' => 'club_two_id'])->label('Club two'); ?>

                <?= $form->field($model, 'club_field_command')->dropDownList([ 'Club one' => 'Club one', 'Club two' => 'Club two', ], ['prompt' => 'Select']) ?>

                <?= $form->field($model, 'start_time')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>

                <?= $form->field($model, 'soccer_match')->hiddenInput(['id' => 'soccer_match'])->label(false)?>

                <?= $form->field($model, 'end_time')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]); ?>

                <?= $form->field($model, 'stadium_id')->dropDownList(ArrayHelper::map(Stadium::find()->all(),'id','stadium'),['prompt'=>'Select stadium'])->label('Stadium'); ?>

                <?= $form->field($model, 'league_competition_id')->dropDownList(ArrayHelper::map(LeagueCompetition::find()->all(),'id','league_competition'),['prompt'=>'Select league/competition', 'id' => 'league_competition'])->label('League/competition'); ?>

                <?= $form->field($model, 'result')->dropDownList([ 'Draw' => 'Draw', 'Victory club one' => 'Victory club one', 'Victory club two' => 'Victory club two', 'Victory in overtime club one' => 'Victory in overtime club one', 'Victory in overtime club two' => 'Victory in overtime club two', 'Victory on penalties club one' => 'Victory on penalties club one', 'Victory on penalties club two' => 'Victory on penalties club two', ], ['prompt' => 'Select result']) ?>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::a('Back', ['soccer-match/index'], ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-footer -->

        <?php ActiveForm::end(); ?>
    </div><!-- /.card -->

</div><!-- /.soccer-match-form -->

<?php

$js = <<<JS

    $('#club_one_id').on('change', function()
    {
        var club_one = $( "#club_one_id option:selected" ).text();
        var club_two =  $( "#club_two_id option:selected" ).text();
        var league_competition = $( "#league_competition option:selected" ).text();
        var soccer_match = club_one +' vs '+ club_two +' - '+ league_competition;
        $('#soccer_match').val(soccer_match);
    });

    $('#club_two_id').on('change', function()
    {
        var club_one = $( "#club_one_id option:selected" ).text();
        var club_two =  $( "#club_two_id option:selected" ).text();
        var league_competition = $( "#league_competition option:selected" ).text();
        var soccer_match = club_one +' vs '+ club_two +' - '+league_competition;
        $('#soccer_match').val(soccer_match);
    });

    $('#league_competition').on('change', function()
    {
        var club_one = $( "#club_one_id option:selected" ).text();
        var club_two =  $( "#club_two_id option:selected" ).text();
        var league_competition = $( "#league_competition option:selected" ).text();
        var soccer_match = club_one +' vs '+ club_two +' - '+league_competition;
        $('#soccer_match').val(soccer_match);
    });

JS;

$this->registerJs($js)

?>

