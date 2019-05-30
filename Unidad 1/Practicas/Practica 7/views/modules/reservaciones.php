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
					<h4 class="box-title">Reservaciones</h4>
					<div class="pull-right">
						<a href="index.php?action=agregar_reservacion" class="btn btn-primary btn-rounded btn-bordered waves-effect waves-light">Agregar Reservación</a>
					</div>

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Cliente</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Tipo de Cliente</th>
								<th>Número de Habitación</th>
								<th>Tipo de Habitación</th>
								<th>Precio</th>
								<th>Fecha de Entrada</th>
								<th>Número de Días</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</th>
								<th>Cliente</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Tipo de Cliente</th>
								<th>Número de Habitación</th>
								<th>Tipo de Habitación</th>
								<th>Precio</th>
								<th>Fecha de Entrada</th>
								<th>Número de Días</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$vistaUsuario = new MvcController();
							$vistaUsuario -> vistaReservacionesController();

							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
	</div>
</div>		





