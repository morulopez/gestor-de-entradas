<?php
	include_once("funciones.php");
?>
<html>
	<Head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="entradas.css">
	</Head>
	<body>
		<h1>probando</h1>
		<div class="container">
			<form action="" method="POST">
				 <div class="form-group">
					<label for="usuario_form">Usuario</label>
					<input type="text" class="form-control" name="usuario" id="usuario_form">
				</div>
				<div class="form-group">
					<label for="password_form">Contraseña</label>
					<input type="password" class="form-control" name="password" id="password_form">
				</div>
					<input type="submit" name="boton" class="btn btn-primary btn-lg btn-block">
			</form>	
				</div>

	</body>
</html>
<?php
	$seguridad = new seguridad;
	if(isset($_POST["usuario"])){
		$seguridad->password($_POST["boton"],$_POST["usuario"],$_POST["password"]);
		header("location:gestion.php");
	}
	
	
	
	

?>
