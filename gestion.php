<?php
include_once("funciones.php");
?>
<html>
	<HEAD>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    	<link rel="stylesheet" href="entradas.css">
	</HEAD>
	<body>
		<div class="row">
			<div class="col-md-6">
				<form action="entrada.php" method="POST" class="form_horizontal form_gestion">
					<div class="form-group">
						<label for="nombre_apellidos">Nombre y Apellidos</label>
						<input type="text" class="form-control" name="nombre" id="nombre_apellidos">
					</div>
					<div class="form-group">
						<label for="DNI">DNI</label>
						<input type="text" class="form-control" name="DNI" id="DNI">
					</div>
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="text" class="form-control" name="edad" id="edad">
					</div>
					<div class="form-group">
						<label for="sel1" >Pais de residencia</label>
					      <select class="form-control" id="sel1" name="pais" placeholder="España">
					        <option>España</option>
					        <option>Francia</option>
					        <option>Inglaterra</option>
					        <option>Italia</option>
					      </select>
					</div>
					<div class="form-group">
						<div class="radio">
						      <label><input type="radio" name="radio2">Hombre</label>
						    </div>
						    <div class="radio">
						      <label><input type="radio" name="radio2">Mujer</label>
						    </div>
					</div>
					<div class="form-group">
						<label for="sel1">Discapacidad</label>
					      <select class="form-control" id="sel1" name="discapacidad" placeholder="No">
					        <option>No</option>
					        <option>Visual</option>
					        <option>Auditiva</optio>
					      </select>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block color_boton" name="CORRECTO">Enviar</button>
				</form>
			</div>
			<div class="col-md-6">
			    <div class="col-md-3">
			    </div>
			     <div class="col-md-3">
			    </div>
			     <div class="col-md-3">
			    </div>
				<div class="col-md-3">
					<form action="" method="POST">
						<button type="submit" class="btn btn-primary btn-lg btn-block color_boton" name="boton_cerrar">
						Cerrar Sesion 
						</button>
					</form>
<?php

/*---------seguridad-------------*/
	$seguridad= new seguridad;
	if($seguridad->no_login()){
		header("location:index.php");
	}
	if(isset($_POST['boton_cerrar'])){
		$seguridad->cerrar_sesion($_POST["boton_cerrar"]);
		header("location:index.php");
	}
	$entrada= new entrada;
/*---------entradas--------------*/

?>
				</div>
			</div>

		</div>
	</body>

</html>