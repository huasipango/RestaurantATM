<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fac_id') ?>

    <?= $form->field($model, 'fac_fecha') ?>

    <?= $form->field($model, 'fac_subtotal') ?>

    <?= $form->field($model, 'fac_total') ?>

    <?= $form->field($model, 'fac_iva') ?>

    <?php // echo $form->field($model, 'cli_id') ?>

    <?php // echo $form->field($model, 'ped_id') ?>

    <?php // echo $form->field($model, 'cob_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
