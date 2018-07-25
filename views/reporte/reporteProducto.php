<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div style="width:100%;margin-left:20%">
<h1 >Reporte Producto mas Vendido </h1>

<?php

/* @var $this yii\web\View */


$this->title = 'Reporte Productos';



echo "<table width=50% border=1 style=overflow: hidden; border-collapse: collapse;>
  <tr>
    <th>Nombre</th>
	<th>Veces Vendido</th>
  </tr>";
foreach($indice as $ind){
			echo " <tr>
				<td>".$ind['nombre']."</td>
				<td>".$ind['frecuencia']."</td>
			  </tr>";
	}
	echo "</table>";
?>
<img style="margin-left:20%" src="http://localhost/RestaurantATM/images/firma/firma1.jpg" border="1" alt="Este es el ejemplo de un texto alternativo" width="200" height="100"  align="middle" ><br/>
<B style="margin-left:20%">Sr. José Carrillo    </B><br/>
<B style="margin-left:5%">http://localhost/RestaurantATM/web/index.php?r=site%2Findex</B><br/>
<div style="margin-left:17%">
<?php  $mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?><br/>
</div>
<?php $form = ActiveForm::begin([
        'action' => ['pdfproductos'],
        'method' => 'get',
    ]); ?>
<input style="margin-left:20%" type="submit" value="Imprimir PDF">
<?php ActiveForm::end(); ?>
</div>



