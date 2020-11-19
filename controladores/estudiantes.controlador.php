<?php

class ControladorEstudiantes{

	public function ctrIngresoEstudiante(){

		if(isset($_POST["ingLegajo"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingLegajo"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			   #$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
				$tabla = "estudiantes";
				$item = "legajo";
				$valor = $_POST["ingLegajo"];

				$respuesta = ModeloEstudiantes::mdlMostrarEstudiantes($tabla, $item, $valor);

				if($respuesta["legajo"] == $_POST["ingLegajo"] && $respuesta["password"] == $_POST["ingPassword"]){
					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["legajo"] = $respuesta["legajo"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["password"] = $respuest ["password"];
					$_SESSION["perfil"] = $respuesta["perfil"];

					echo '<script>
					window.location = "perfil";
					</script>';

				}else{
					echo '<br> <div class="alert alert-danger"> Vuelva a intentarlo</div>';
				}


			}

		}

	}

}