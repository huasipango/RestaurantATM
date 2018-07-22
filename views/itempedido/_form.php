<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producto;  
use app\models\Pedido;  


/* @var $this yii\web\View */
/* @var $model app\models\Itempedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itempedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ite_cantidad')->textInput() ?>


    <?= $form->field($model, 'ped_id')->dropDownList(
                ArrayHelper::map(Pedido::find()->all(),'ped_id','ped_id'),
                ['prompt'=>'Seleccione...']); ?>

    <?= $form->field($model, 'pro_id')->dropDownList(
                ArrayHelper::map(Producto::find()->all(),'pro_id','pro_nombre'),
                ['prompt'=>'Seleccione...']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
