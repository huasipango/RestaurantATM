<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1>Register</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>   
</div>









<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                ]); ?>
                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['user/security/login']) ?>
        </p>
    </div>
</div>
















<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>