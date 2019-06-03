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
					<h4 class="box-title">Materias</h4>
					<div class="pull-right">
						<a href="index.php?action=agregar_materia" class="btn btn-primary btn-rounded btn-bordered waves-effect waves-light">Agregar Materia</a>
					</div>

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Profesor</th>
                				<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Profesor</th>
                				<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$vistaUsuario = new MvcController();
							$vistaUsuario -> vistaMateriasController();

							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
				<div class="box-content">
					<h4 class="box-title">Alumnos por Materia</h4>				
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputEmail1">Selecciona una materia para ver sus alumnos:</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="id">
										<?php $vistaUsuario -> NombreMateriasController(); ?>
									</select>
								</div>
							</div>
							<button type="submit" name="buscar" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Matricula</th>
								<th>Nombre</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Matricula</th>
								<th>Nombre</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$total = $vistaUsuario -> vistaAlumnoMateriaController();

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>		





