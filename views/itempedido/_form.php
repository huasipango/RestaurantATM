<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Itempedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itempedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ite_cantidad')->textInput() ?>

    <?= $form->field($model, 'ped_id')->textInput() ?>

    <?= $form->field($model, 'pro_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
