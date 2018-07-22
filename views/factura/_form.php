<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Cliente;  
use app\models\Pedido;  
use app\models\Cobro;  


/* @var $this yii\web\View */
/* @var $model app\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ped_id')->dropDownList(
                ArrayHelper::map(Pedido::find()->all(),'ped_id','ped_id'),
                ['prompt'=>'Seleccione...']); ?>

    <?= $form->field($model, 'cli_id')->dropDownList(
                ArrayHelper::map(Cliente::find()->all(),'cli_id','cli_nombre'),
                ['prompt'=>'Seleccione...']); ?>

    <?= $form->field($model, 'cob_id')->dropDownList(
                ArrayHelper::map(Cobro::find()->all(),'cob_id','cob_id'),
                ['prompt'=>'Seleccione...']); ?>

    <?= $form->field($model, 'fac_subtotal')->textInput() ?>

    <?= $form->field($model, 'fac_total')->textInput() ?>

    <?= $form->field($model, 'fac_iva')->textInput() ?>

    <?= $form->field($model, 'fac_fecha')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => true, 
         // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
