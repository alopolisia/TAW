<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || 
			$enlaces == "habitaciones" || $enlaces == "agregar_habitacion" || $enlaces == "editar_habitacion" ||
			$enlaces == "borrar_habitacion" || $enlaces == "clientes" || $enlaces == "agregar_cliente" || $enlaces == "editar_cliente" ||
			$enlaces == "borrar_cliente" || $enlaces == "reservaciones" || $enlaces == "agregar_reservacion" ||
			$enlaces == "editar_reservacion" || $enlaces == "borrar_reservacion" || $enlaces == "habitaciones2" || $enlaces == "ganancia" ||
      $enlaces == "alumnos" || $enlaces == "agregar_alumno"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>