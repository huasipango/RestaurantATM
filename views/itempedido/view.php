<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Itempedido */

$this->title = $model->ite_id;
$this->params['breadcrumbs'][] = ['label' => 'Itempedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itempedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ite_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ite_id], [
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
            'ite_id',
            'ite_cantidad',
            'ped_id',
            'pro_id',
        ],
    ]) ?>

</div>
