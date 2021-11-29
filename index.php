


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PhoneShop</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include('header.php'); ?>
<div class="container">
	<h1 class="page-header text-center">PHONESHOP</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>
			<a href="logout.php" type="button" class="btn btn-info">
			Cerrar Sesion
			</a>
<?php 
	session_start();

	if(isset($_SESSION['userid'])){
        $userId = $_SESSION['userid'];
        echo "<h1>Has iniciado sesion: $userId</h1><br><br>";
	}
?>
<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Password</th>
		<th>Acción</th>
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM usuario';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['id_usuario']; ?></td>
						<td><?php echo $row['nombre_usuario']; ?></td>
						<td><?php echo $row['email_usuario']; ?></td>
						<td><?php echo $row['telefono_usuario']; ?></td>
						<td><?php echo $row['pass_usuario']; ?></td>
						<td>
							<a href="#edit_<?php echo $row['id_usuario']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
							<a href="#delete_<?php echo $row['id_usuario']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
						</td>
						<?php include('BorrarEditarModal.php'); ?>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('AgregarModal.php'); ?>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>