<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fac_fecha')->textInput() ?>

    <?= $form->field($model, 'fac_subtotal')->textInput() ?>

    <?= $form->field($model, 'fac_total')->textInput() ?>

    <?= $form->field($model, 'fac_iva')->textInput() ?>

    <?= $form->field($model, 'cli_id')->textInput() ?>

    <?= $form->field($model, 'ped_id')->textInput() ?>

    <?= $form->field($model, 'cob_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
