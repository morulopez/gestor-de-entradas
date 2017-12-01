<?php
/*---------objeto de seguridad-----------*/

Class seguridad{
	
	function password($boton,$nombre,$password){
		$this->boton=$boton;
		$this->nombre=$nombre;
		$this->password=$password;
		if(isset($this->boton)){
			$acceder=file_get_contents("seugridad.txt");
			$nombre=explode(" ", $acceder);
			$usuario=$nombre[0];
			$acceso=$nombre[1];
			if(($this->nombre==$usuario) AND ($this->password==$acceso)){
				setcookie('usuario',$this->nombre,time()+31536000);
			}
		}
	}
	function no_login(){
		if(!isset($_COOKIE['usuario'])){
			return true;
		}else{
			return false;
		}
	}
	function cerrar_sesion($boton_cerrar){
		if(isset($boton_cerrar)){
			setcookie('usuario',false,-1);
		}
	}
}


/*------objeto de entradas------*/

Class entrada{
	
	function calcular_precio($precio_base,$edad,$discapacidad){
		$this->precio_base= $precio_base;
		$this->edad=$edad;
		$this->discapacidad=$discapacidad;
		if($this->edad<15){
				$this->precio_base=30;
					
			if($this->discapacidad=="Visual"){
				$this->precio_base=$this->precio_base/2;
			}

			if($this->discapacidad=="Auditiva"){
				$this->precio_base=$this->precio_base/4*3;
					
			}
          		return $this->precio_base;
		}

		if($this->edad>=60){
				 $this->precio_base=20;

			if($this->discapacidad=="Visual"){
				$this->precio_base=$this->precio_base/2;
			}
			if($this->discapacidad=="Auditiva"){
					$this->precio_base=$this->precio_base/4*3; 
					}
					return $this->precio_base;
		}else{
				if($this->discapacidad=="Auditiva"){
					$this->precio_base=$this->precio_base/4*3;
					return $this->precio_base;
				}
				if($this->discapacidad=="Visual"){
					$this->precio_base=$this->precio_base/2;
				}
				 return $this->precio_base;
				
			}
			
	}
	function precio(){
		return $this->precio_base;
	}
	function validar_entrada($nombre,$edad,$dni){
		 $this->error_formulario=false;
		 $this->nombre=$nombre;
		 $this->edad=$edad;
		 $this->dni=$dni;
		 $array_error= [];
			if(strlen($this->nombre) < 8){
				$this->error_formulario = true;
				array_push($array_error,  "el nombre tiene menos de ocho caracteres");
				
				 
			}
			if(ctype_digit($this->nombre)==1){
				
				$this->error_formulario = true;
				array_push($array_error, "el nombre debe tener solo letras");
				
			}
			if(ctype_digit($this->edad)==0 || ctype_alpha($this->edad)==1 ){
				
				$this->error_formulario = true;
				array_push($array_error, "la edad debe de tener solo numeros");
				
			}
			if(strlen($this->dni)<9 ){
				
				 $this->error_formulario = true;
				 array_push($array_error,"el DNI debe de tener 8 numeros y una letra mayuscula" );
				 
			}
			if($this->error_formulario == true){
				  return $array_error[0]."<br>".$array_error[1]."<br>".$array_error[2]."<br>".$array_error[3];
				}
				 
			
			
	} 
	function acceso(){
		if($this->error_formulario == false){
			
			return true;
		}
	}
	
	
}
/*------------------guardar datos----------------------------*/
Class guardar_datos{
	function guardar_informacion($info){
		$carpeta = "carpeta_entrada/";

		$ficheros = scandir($carpeta);
		$siguiente_ID = count($ficheros) - 2;

		$fecha=date("d-m-y");
		$archivo=fopen("carpeta_entrada/".$siguiente_ID."-".$fecha.".txt","a");
		$json=json_encode($info);
		fwrite($archivo,$json);
		fclose($archivo);
	}
}

?>
