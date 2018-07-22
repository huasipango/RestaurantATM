<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->pro_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pro_id',
            'pro_nombre',
            'pro_descripcion',
            'pro_costo',
            'pro_precio',
            'pro_imagen',
            'pro_estado',
            'cat_id',
			[
				'attribute'=>'pro_imagen',
				'value'=> Yii::getAlias('@productoImgUrl')."/".$model->pro_imagen,
				'format'=>['image',['width'=>'100','height'=>'100']]
			]
        ],
    ]) ?>

</div>
