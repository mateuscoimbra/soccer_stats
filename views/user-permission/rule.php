<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PortalsegurancaUsuario */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registered permissions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-permission-form">
    <div class="card card-secondary">
        <!-- form start -->    
        <form action="" method="post" >
            <div class="card-header">
                <h3 class="card-title">Assign permission rule to profile</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <?php foreach($permissoes as $permissao) :?>
                    <div class="form-check">
                        <input type="checkbox" 
                            name="permissoes[]" 
                            id="permissoes_<?php echo $permissao->name?>" 
                            value="<?php echo $permissao->name?>" 
                            <?php echo in_array($permissao->name, $permissoes_perfil) ? 'checked="checked"' : ''; ?>
                        >
                        <label for="permissoes_<?php echo $permissao->name?>"><?php echo $permissao->name?></label>
                    </div>
                <?php endforeach?>
                <hr>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam?>" value="<?php echo Yii::$app->request->csrfToken?>">
                <?= Html::a(Yii::t('app', 'Back'), ['profile'], ['class' => 'btn btn-default']) ?>
                <button type="submit" class="btn btn-primary pull-right" >Save</button>
            </div><!-- /.card-footer -->
        </form>
    </div><!-- /.card -->
</div><!-- /.country-form -->
