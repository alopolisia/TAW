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
					<h4 class="box-title">Clientes</h4>
					<div class="pull-right">
						<a href="index.php?action=agregar_cliente" class="btn btn-primary btn-rounded btn-bordered waves-effect waves-light">Agregar Cliente</a>
					</div>

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Fecha de Nacimiento</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Tipo</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Fecha de Nacimiento</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Tipo</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$vistaUsuario = new MvcController();
							$vistaUsuario -> vistaClientesController();

							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
	</div>
</div>		





