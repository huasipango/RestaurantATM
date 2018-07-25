<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div style="width:100%;margin-left:20%" >
<h1 style="margin-left:15%">Reporte Ventas  </h1>
<?php $form = ActiveForm::begin([
        'action' => ['ventas'],
        'method' => 'post',
    ]); 
?>


<select id="combo" name="combo" style="margin-left:12%"> 
<option value="diarias" <?php if($comb=="diarias"){ echo "selected";} ?>>Diarias</option> 
<option value="mensuales" <?php if($comb=="mensuales"){ echo "selected";} ?>>Mensuales</option>  
<option value="anuales" <?php if($comb=="anuales"){ echo "selected";} ?>>Anuales</option> 
</select>
<input < id="fecha" type="date" name="fecha" value=<?php echo $fech ?> style="margin-left:5%">
 <input type="submit" value="buscar">
<?php ActiveForm::end(); ?>
<br/>
<div style="margin-left:%">
<?php 
	echo "Ventas:";
	if($fech!=""){
		echo $comb."     ".$fech;
	}
?>
</div>
<br/>
<?php

/* @var $this yii\web\View */

$this->title = 'Reporte Ventas';
	
	echo "<table width=50% border=1 style=overflow: hidden; border-collapse: collapse;>
  <tr>
    <th>#</th>
    <th>fecha</th>
	<th>total</th>
  </tr>";
		$total=0;
		foreach($vectores as  $vector){
		echo " <tr>
			<td>".$vector['fac_id']."</td>
			<td>".$vector['fac_fecha']."</td>
			<td>".$vector['fac_total']."</td>
		  </tr>";
		  $total=$total+$vector['fac_total'];
		}
		
		foreach($vectores as  $vector){
		
		
		}
		echo " <tr>
			<td> </td>
			<td><b>VALOR TOTAL </b></td>
			<td><b>".$total."</b></td>
		  </tr>";
		
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
        'action' => ['pdfventas'],
        'method' => 'post',
    ]); ?>

<input type="hidden" name="combo" value=<?php echo $comb ?>>
<input type="hidden" name="fecha" value=<?php echo $fech ?>>

<input type="submit" style="margin-left:20%"  value="Imprimir PDF">
<?php ActiveForm::end(); ?>

</div>



