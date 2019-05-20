<?php

class Paginas{

	public function enlacesPaginasModel($enlaces){

		if($enlaces == "productos" || $enlaces == "ventas" || $enlaces == "editarProducto" || $enlaces == "borrarProducto" || $enlaces == "salir" || $enlaces == "nuevoProducto" || $enlaces == "nuevaVenta" || $enlaces == "editarVenta" || $enlaces == "borrarVenta"){

			$module =  "views/modules/".$enlaces.".php";

		}

		else if($enlaces == "index"){

			$module =  "views/modules/login.php";

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
