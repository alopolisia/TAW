<?php


if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
			<div class="box-content">
				<h4 class="box-title">Default</h4>
				<!-- /.box-title -->
				<div class="dropdown js__drop_down">
					<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
					<ul class="sub-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else there</a></li>
						<li class="split"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
					<!-- /.sub-menu -->
				</div>
				<!-- /.dropdown js__dropdown -->
				<table id="example" class="table table-striped table-bordered display" style="width:100%">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Tipo</th>
							<th>Editar</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Tipo</th>
							<th>Editar</th>
							<th>Borrar</th>
						</tr>
					</tfoot>
					<tbody>
						<?php

						$vistaUsuario = new MvcController();
						$vistaUsuario -> vistaUsuariosController();
						$vistaUsuario -> borrarUsuarioController();

						?>
					</tbody>
				</table>
			</div>
			<!-- /.box-content -->
		</div>
		</dir>
	</dir>
</dir>		

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




