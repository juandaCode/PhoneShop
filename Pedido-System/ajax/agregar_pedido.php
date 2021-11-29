<?php
	/*-------------------------
	ejemplo completo
	---------------------------*/
session_start();
$session_id= session_id();
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
/*if (isset($_POST['nombre_producto'])){$nombre_producto=$_POST['nombre_producto'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['codigo_producto'])){$codigo_producto=$_POST['codigo_producto'];}
if (isset($_POST['precio_producto'])){$precio_producto=$_POST['precio_producto'];}
if (isset($_POST['id_marca_producto'])){$idmarca_producto=$_POST['id_marca_producto'];}*/

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	
	
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id=intval($_GET['id']);
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id."'");
}



	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
if (!empty($nombre_producto) and !empty($codigo_producto) and !empty($precio_producto) and !empty($id_marca_producto))
{
$insert_query=mysqli_query($con, "INSERT INTO producto (nombre_producto,codigo_producto,precio_producto,id_marca_producto,session_id) 
VALUES ('$nombre_producto','$codigo_producto','$precio_producto', '$id_marca_producto','$session_id')");
}
if (isset($_GET['codigo_producto']))//codigo elimina un elemento del array
{
	$cod=intval($_GET['codigo_producto']);
$delete=mysqli_query($con, "DELETE FROM producto WHERE codigo_producto='".$cod."'");
}

?>
<table class="table">
<tr>
	<th>NOMBRE</th>
	<th>CODIGO</th>
	<th>CANT.</th>
	<th>PRECIO</th>
	<th><span class="pull-right">PRECIO UNIT.</span></th>
	<th><span class="pull-right">PRECIO TOTAL</span></th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "SELECT * FROM producto, tmp where productos.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$nombre_producto=$row["nombre_producto"];
	$codigo_producto=$row['codigo_producto'];
	$precio_producto=$row['precio_producto'];
	$nombre_producto=$row['nombre_producto'];
	$id_marca_producto=$row['id_marca_producto'];
	if (!empty($id_marca_producto))
	{
	$sql_marca=mysqli_query($con, "SELECT nombre_marca FROM marcas WHERE id_marca='$id_marca_producto'");
	$rw_marca=mysqli_fetch_array($sql_marca);
	$nombre_marca=$rw_marca['nombre_marca'];
	$marca_producto=" ".strtoupper($nombre_marca);
	}
	else {$marca_producto='';}
	$precio_producto=$row['precio_producto'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
			<td><?php echo $codigo_producto;?></td>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto.$marca_producto;?></td>
			<td><span class="pull-right"><?php echo $precio_venta_f;?></span></td>
			<td><span class="pull-right"><?php echo $precio_total_f;?></span></td>
			<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
		</tr>		
		<?php
	}

?>
<tr>
	<td colspan=4><span class="pull-right">TOTAL $</span></td>
	<td><span class="pull-right"><?php echo number_format($sumador_total,2);?></span></td>
	<td></td>
</tr>
</table>
			