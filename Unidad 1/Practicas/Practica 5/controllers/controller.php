<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){
		include "views/login.php";
	}

	public function pagina1(){
		include "views/registrar.php";
	}

	public function pagina2(){
		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
			$datosController = array( "usuario"=>$_POST["usuarioRegistro"],
								      "password"=>$_POST["passwordRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				#header("location:index.php");

			} else {
				#header("location:google.com");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if ($_GET["action"] == "registrar") {
			// code...
			session_start();

			$_SESSION["registrar"] = true;

			header("location:index.php");
		}

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"],
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["contra"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=productos");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);

			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}

	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");

			}

		}

	}

	#Cargar Lista de Productos
	public function vistaProductosController(){
		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarProducto&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=borrarProducto&id='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#REGISTRO DE Producto
	#------------------------------------
	public function registroNuevoProductoController(){
		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>$_POST["nombre"],
								      "precio"=>$_POST["precio"]);

			$respuesta = Datos::registroProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			} else {
				header("location:index.php?action=productos");
			}

		}

	}

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		echo '<div class="col-md-6">
			  	<label>Nombre:</label>
			  	<input type="text" name="nombre" id="nombres" class="form-control" maxlength="100" value="'. $respuesta["nombre"] .'" required >
		      </div>
		      <div class="col-md-6">
			  	<label>Precio:</label>
			  	<input type="text" name="precio" id="apellidos" class="form-control" maxlength="100" value="'. $respuesta["precio"] .'" required>
			  </div>

			  <div class="col-md-12 pull-right">
				<hr>
			  	<button type="submit" class="btn btn-success">Actualizar</button>
			  </div>';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["nombre"])){

			$datosController = array( "id"=>$_GET["id"],
									  "nombre"=>$_POST["nombre"],
							          "precio"=>$_POST["precio"]);

			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

			else{

				echo "error";

			}

		}

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["id"])){

			$datosController = $_GET["id"];

			$respuesta = Datos::borrarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

		}

	}

	#Cargar la lista de Ventas
	public function vistaVentasController(){
		$respuesta = Datos::vistaVentasModel("ventas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["subtotal"].'</td>
				<td><a href="index.php?action=editarVenta&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=borrarVenta&id='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	public function obtenerProductosController(){
		$respuesta = Datos::obtenerProductosModel("productos");

		foreach($respuesta as $row => $item){
			echo '<option value="'. $item["nombre"] .'">'.$item["nombre"].'</option>';
		}
	}

	#REGISTRO DE Venta
	#------------------------------------
	public function registroNuevaVentaController(){
		if(isset($_POST["nombre"])){
			$datosController = array( "nombre"=>$_POST["nombre"],
								      "precio"=>$_POST["precio"]);

			$respuesta = Datos::registroProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			} else {
				header("location:index.php?action=productos");
			}

		}

	}

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarVentaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarVentaModel($datosController, "ventas");

		echo '<div class="col-md-6">
			  	<label>Nombre:</label>
			  	<input type="text" name="nombre" id="nombres" class="form-control" maxlength="100" value="'. $respuesta["nombre"] .'" required >
		      </div>
		      <div class="col-md-6">
			  	<label>Precio:</label>
			  	<input type="text" name="precio" id="apellidos" class="form-control" maxlength="100" value="'. $respuesta["precio"] .'" required>
			  </div>

			  <div class="col-md-12 pull-right">
				<hr>
			  	<button type="submit" class="btn btn-success">Actualizar</button>
			  </div>';
	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarVentaController(){

		if(isset($_POST["nombre"])){

			$datosController = array( "id"=>$_GET["id"],
									  "nombre"=>$_POST["nombre"],
							          "precio"=>$_POST["precio"]);

			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

			else{

				echo "error";

			}

		}

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarVentaController(){

		if(isset($_GET["id"])){

			$datosController = $_GET["id"];

			$respuesta = Datos::borrarVentaModel($datosController, "ventas");

			if($respuesta == "success"){

				header("location:index.php?action=ventas");

			}

		}

	}

}

?>
