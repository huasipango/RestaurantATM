<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItempedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itempedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ite_id') ?>

    <?= $form->field($model, 'ite_cantidad') ?>

    <?= $form->field($model, 'ped_id') ?>

    <?= $form->field($model, 'pro_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
