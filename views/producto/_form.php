<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;  

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'pro_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_costo')->textInput() ?>

    <?= $form->field($model, 'pro_precio')->textInput() ?>

    <?= $form->field($model, 'pro_imagen')->fileInput()  ?>

    <?= $form->field($model, 'pro_estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList(
                ArrayHelper::map(Categoria::find()->all(),'cat_id','cat_nombre'),
                ['prompt'=>'Seleccione...']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
