<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\Categoria;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ReporteController extends Controller
{
     public function actionProducto()
    {
       $productos= Producto::find()->all();
	   return $this->render('reporteProducto', [
            'productos' => $productos,
        ]);
	}
}
