<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producto', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Reporte Producto', ['/reporte/producto'], ['class' => 'btn btn-success']) ?>
	</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pro_id',
            'pro_nombre',
            'pro_descripcion',
            'pro_costo',
            'pro_precio',
			//'pro_imagen',
					[
                     'attribute' => 'pro_imagen',
                     'format' => 'raw',
                     'value' => function ($model) {   
                        if ($model->pro_imagen!='')
                          return '<img src="'.Yii::getAlias('@productoImgUrl')."/".$model->pro_imagen.'" width="100px" height="100px">'; else return 'no image';
                     },
                   ],
			
            //'pro_estado',
            //'cat_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
