<?php
include_once("funciones.php");
$seguridad= new    seguridad;
if($seguridad->no_login()){
		header("location:index.php");
	}
/*-----llamamos a objeto entrada------*/
$entrada= new      entrada;
$entrada->         calcular_precio(50,$_POST['edad'],$_POST['discapacidad']);
if(isset($_POST['nombre'])){
		 echo $entrada->validar_entrada($_POST['nombre'],$_POST['edad'], $_POST['DNI']);
	}

if($entrada->acceso()){
			echo "<html>
							<HEAD>
							<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
						    	<link rel='stylesheet' href='entradas.css'>
							</HEAD>
							<body>
								<div class='row'>
									<div class='col-md-4'>
									</div>
									<div class='col-md-4'>
										<div class='row entrada'>
											<div class='col-md-8'>
												<div class='row'>
													<div class='col-md-12'>
													Nombre:".$_POST['nombre']."
													</div>
												</div>
												<div class='row'>
													<div class='col-md-12'>
													Edad: ".$_POST['edad']."
													</div>
												</div>
												<div class='row'>
													<div class='col-md-12'>
													Discapacidad:".$_POST['discapacidad']."
													</div>
												</div>
												<div class='row'>
													<div class='col-md-12'>
													Precio:".$entrada->precio()."€ 
													</div>
												</div>
											</div>
											<div class='col-md-4'>
											<img src='http://www.vivezone.com/photos/128x128/fb532d1f38c3db2a2190b2764d0ec1a1.jpg' class='imagen'>
												</div>
										</div>
									</div>
									<div class='col-md-4'>
									</div>
								</div>
							</body>
						</html>";
					}

/*---------llamamos a objeto json---------*/
$guardar_datos= new guardar_datos;
$guardar_datos->    guardar_informacion($_POST);

?>