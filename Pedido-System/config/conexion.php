<?php
	/*-------------------------
	Autor: ruby  benitez
	
	---------------------------*/
	# conectarse la base de datos
    $con=@mysqli_connect($localhost, $root, $clave, $bd);
    if(!$con){
        die("imposible conectarse EN ESTE MOMENTO : ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló ULEVA DE NUEVO : ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
