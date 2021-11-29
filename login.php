<?php
session_start();
if(isset($_SESSION['userid'])){
    header('location:session.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PhoneShop</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="login">
    <div>
        <h1>PHONESHOP</h1><br>
    </div>
        <div>
            <h2>Tecnologia a tu estilo</h2><br>
        </div>

        
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
                <form action="codLogin.php" method="POST" >
				<input type="text" class="login-field" name="user" value="" placeholder="USUARIO" id="login-name" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" name="pass" value="" placeholder="PASSWORD" id="login-pass" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input type="submit" class="btn btn-primary btn-large btn-block" value="INGRESAR" name="login">
				<a class="login-link" href="#">Olvidaste tu Usuario?</a>
                </form>
			</div>
		</div>
	</div>


</body>
</html>

