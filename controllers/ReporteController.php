<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
use mPDF;
use app\models\Producto;
use app\models\Factura;
use app\models\ItemPedido;
use app\models\Cliente;
use app\models\Categoria;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FacturaSearch;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ReporteController extends Controller
{
     public function actionProducto()
    {
		$productos= Producto::find()->all();
	    $ventas=ItemPedido::find()->all();
		
		//Generar nuevo vector
			$i=0;
			foreach($productos as  $producto){
				$indice[$i]['nombre']=$producto['pro_nombre'];
				$indice[$i]['frecuencia']=0;
				$i=$i+1;
			}
		//
		//identificar los productos mas vendidos
			foreach($ventas as  $venta){
				$i=0;
				foreach($productos as $producto){
					if ($producto['pro_id']==$venta['pro_id']){
						$indice[$i]['frecuencia']=$indice[$i]['frecuencia']+1;
					}
				$i=$i+1;	
				}
			}
		//

		//ordenar un vector
			array_multisort($indice);
			usort($indice, array($this, "sort_by_orden"));
			$indice=array_reverse($indice);
		//

       
	   return $this->render('reporteProducto', [
            'indice' => $indice,
			
        ]);
	}
	
	public function actionVentas()
    {
		$ventas= Factura::find()->all();
		$comb="";
		$fech="";
	
		if ((Yii::$app->request->post())) {
			$comb=((Yii::$app->request->post()))['combo'];
			$fech=((Yii::$app->request->post()))['fecha'];
            
        }
		//
		$i=0;
		$vectores[0]['fac_id']="";
		$vectores[0]['fac_fecha']="";
		$vectores[0]['fac_total']="";
		if($fech==""){
			
		foreach($ventas as  $venta){
		
			$vectores[$i]['fac_id']=$venta['fac_id'];
			$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
			$vectores[$i]['fac_total']=$venta['fac_total'];
			$i++;
		}
		  }
		  else{
			  if($comb=="diarias"){
				  foreach($ventas as  $venta){
					  if($fech==$venta['fac_fecha']){
						$vectores[$i]['fac_id']=$venta['fac_id'];
						$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
						$vectores[$i]['fac_total']=$venta['fac_total'];
						$i++;
					  }
					}
			  }else
				  if($comb=="mensuales"){
					foreach($ventas as  $venta){
						list($anio, $mes, $dia) = explode("-",$fech);
						list($aniov, $mesv, $diav) = explode("-",$venta['fac_fecha']);
					  if($mes==$mesv){
						 $vectores[$i]['fac_id']=$venta['fac_id'];
						$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
						$vectores[$i]['fac_total']=$venta['fac_total'];
						$i++;
					  }
					}  
				  }else
					  if($comb=="anuales"){
						  foreach($ventas as  $venta){
							list($anio, $mes, $dia) = explode("-",$fech);
							list($aniov, $mesv, $diav) = explode("-",$venta['fac_fecha']);
							
							if($anio==$aniov){
							$vectores[$i]['fac_id']=$venta['fac_id'];
							$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
							$vectores[$i]['fac_total']=$venta['fac_total'];
							$i++;
						  }
						 }
						  
					  }
			  
		  }
		
		//
	   return $this->render('reporteVentas', [
			'comb' => $comb,
			'fech' => $fech,
			'vectores'=>$vectores,

        ]);
	}

	
	
	
	public function actionClientes()
    {
       $ventas= Factura::find()->all();
	   $clientes= Cliente::find()->all();
	   ///
	   
	   //Generar nuevo vector
			$i=0;
			foreach($clientes as  $cliente){
			$indice[$i]['nombre']=$cliente['cli_nombre'];
			$indice[$i]['frecuencia']=0;
			$i=$i+1;
			}
			//identificar los productos mas vendidos
			foreach($ventas as  $venta){
				$i=0;
				foreach($clientes as $cliente){
					if ($cliente['cli_id']==$venta['cli_id']){
						$indice[$i]['frecuencia']=$indice[$i]['frecuencia']+1;
					}
				$i=$i+1;	
				}
			}
			//

			//ordenar un vector
			array_multisort($indice);
			usort($indice, array($this, "sort_by_orden"));
			$indice=array_reverse($indice);
			//
			//
			
			return $this->render('reporteClientes', [
            'indice' => $indice,
        ]);
	   ///
	}
	
	//funcion creada nesesaria xD
	function sort_by_orden ($a, $b) {
				return $a['frecuencia'] - $b['frecuencia'];
			}
	//

	//
	
	public function actionPdfclientes()
    {
	   $ventas= Factura::find()->all();
	   $clientes= Cliente::find()->all();
	   ///
	   
	   //Generar nuevo vector
			$i=0;
			foreach($clientes as  $cliente){
			$indice[$i]['nombre']=$cliente['cli_nombre'];
			$indice[$i]['frecuencia']=0;
			$i=$i+1;
			}
			//identificar los productos mas vendidos
			foreach($ventas as  $venta){
				$i=0;
				foreach($clientes as $cliente){
					if ($cliente['cli_id']==$venta['cli_id']){
						$indice[$i]['frecuencia']=$indice[$i]['frecuencia']+1;
					}
				$i=$i+1;	
				}
			}
			//

			//ordenar un vector
			array_multisort($indice);
			usort($indice, array($this, "sort_by_orden"));
			
			
			$indice=array_reverse($indice);
			//
		//generar pdf
			$content = $this->renderPartial('reporteClientes', [
				'indice' => $indice,
			]);
			// setup kartik\mpdf\Pdf component
			$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_CORE, 
			// A4 paper format
			'format' => Pdf::FORMAT_A4, 
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT, 
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER, 
			// your html content input
			'content' => $content,  
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting 
			'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			'cssInline' => '.kv-heading-1{font-size:18px}', 
			 // set mPDF properties on the fly
			'options' => ['title' => 'Clientes Frecuentes Report '],
			 // call mPDF methods on the fly
			'methods' => [ 
				'SetHeader'=>['Clientes Frecuentes'], 
				'SetFooter'=>['{PAGENO}'],
			]
		]);
		
		// return the pdf output as per the destination setting
		return $pdf->render(); 
	}
	
	public function actionPdfventas()
    {
		$ventas= Factura::find()->all();
		$comb="";
		$fech="";
	
		if ((Yii::$app->request->post())) {
			$comb=((Yii::$app->request->post()))['combo'];
			$fech=((Yii::$app->request->post()))['fecha'];
            
        }
		//
		$i=0;
		$vectores[0]['fac_id']="";
		$vectores[0]['fac_fecha']="";
		$vectores[0]['fac_total']="";
		if($fech==""){
			
		foreach($ventas as  $venta){
		
			$vectores[$i]['fac_id']=$venta['fac_id'];
			$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
			$vectores[$i]['fac_total']=$venta['fac_total'];
			$i++;
		}
		}else{
			  if($comb=="diarias"){
				  foreach($ventas as  $venta){
					  if($fech==$venta['fac_fecha']){
						$vectores[$i]['fac_id']=$venta['fac_id'];
						$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
						$vectores[$i]['fac_total']=$venta['fac_total'];
						$i++;
					  }
					}
						
			  }else
				  if($comb=="mensuales"){
					foreach($ventas as  $venta){
						list($anio, $mes, $dia) = explode("-",$fech);
						list($aniov, $mesv, $diav) = explode("-",$venta['fac_fecha']);
					  if($mes==$mesv){
						 $vectores[$i]['fac_id']=$venta['fac_id'];
						$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
						$vectores[$i]['fac_total']=$venta['fac_total'];
						$i++;
					  }
					}  
				  }else
					  if($comb=="anuales"){
						  foreach($ventas as  $venta){
							list($anio, $mes, $dia) = explode("-",$fech);
							list($aniov, $mesv, $diav) = explode("-",$venta['fac_fecha']);
							
							if($anio==$aniov){
							$vectores[$i]['fac_id']=$venta['fac_id'];
							$vectores[$i]['fac_fecha']=$venta['fac_fecha'];
							$vectores[$i]['fac_total']=$venta['fac_total'];
							$i++;
						  }
						 }
						  
					  }
			  
		  }
		
		//

		$content = $this->renderPartial('reporteVentas', [
			'comb' => $comb,
			'fech' => $fech,
			'vectores'=>$vectores,
        ]);
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Ventas Report '],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Ventas'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
	}
	
	public function actionPdfproductos()
    {
		$productos= Producto::find()->all();
	    $ventas=ItemPedido::find()->all();
		
		//Generar nuevo vector
			$i=0;
			foreach($productos as  $producto){
				$indice[$i]['nombre']=$producto['pro_nombre'];
				$indice[$i]['frecuencia']=0;
				$i=$i+1;
			}
		//
		//identificar los productos mas vendidos
			foreach($ventas as  $venta){
				$i=0;
				foreach($productos as $producto){
					if ($producto['pro_id']==$venta['pro_id']){
						$indice[$i]['frecuencia']=$indice[$i]['frecuencia']+1;
					}
				$i=$i+1;	
				}
			}
		//

		//ordenar un vector
			array_multisort($indice);
			usort($indice, array($this, "sort_by_orden"));
			$indice=array_reverse($indice);
		//
   //generarpdf
		$content = $this->renderPartial('reporteProducto', [
            'indice' => $indice,
        ]);
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Productos Report '],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Productos mas vendidos'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
	}
}
