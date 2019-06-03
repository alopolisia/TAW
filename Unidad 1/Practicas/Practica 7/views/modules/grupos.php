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
					<h4 class="box-title">Grupos</h4>
					<div class="pull-right">
						<a href="index.php?action=agregar_grupo" class="btn btn-primary btn-rounded btn-bordered waves-effect waves-light">Agregar Grupo</a>
					</div>

					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
                				<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</th>
                				<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$vistaUsuario = new MvcController();
							$vistaUsuario -> vistaGruposController();

							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
				<div class="box-content">
					<h4 class="box-title">Materias por Grupo</h4>				
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputEmail1">Selecciona un grupo para ver sus materias:</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="id">
										<?php $vistaUsuario -> idGrupoController(); ?>
									</select>
								</div>
							</div>
							<button type="submit" name="buscar" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id de la Materia</th>
								<th>Nombe de la Materia</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id de la Materia</th>
								<th>Nombe de la Materia</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$total = $vistaUsuario -> vistaMateriaGrupoController();

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>		





