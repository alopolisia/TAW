<?php

	if(!$_SESSION["validar"]){

		header("location:index.php?action=ingresar");

		exit();

	}

	$vista = new MvcController();
	$valores = $vista -> editarGrupoController();

?>

<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Grupo con id: <?php echo $valores["id"]; ?></h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputPassword1">Id</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Id de la Materia" name="id" value="<?php echo $valores["id"]; ?> " required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Materias</label>
								<select class="form-control select2_1" multiple="multiple" name="id_materia[]" >
									<optgroup label="Alumnos">
										<?php $vista -> nombreMateriasController(); ?>
									</optgroup>
								</select>
							</div>

							<button type="submit" name="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">Actualizar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
		</div>
	</div>
</div>

<?php 

	$vista -> actualizarMateriaController();

?>