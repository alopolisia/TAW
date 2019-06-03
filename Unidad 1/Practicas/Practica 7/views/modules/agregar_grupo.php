<?php

	if(!$_SESSION["validar"]){

		header("location:index.php?action=ingresar");

		exit();

	}

	$vista = new MvcController();
?>
<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Nuevo Grupo</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputPassword1">Id</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Id" name="id" required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Materias</label>
								<select class="form-control select2_1" multiple="multiple" name="id_materia[]" >
									<optgroup label="Materias">
										<?php $vista -> nombreMateriasController(); ?>
									</optgroup>
								</select>
							</div>
							
							<button type="submit" name="agregar" class="btn btn-primary btn-sm waves-effect waves-light">Agregar</button>
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

	$vista = new MvcController();
	$vista -> agregarGrupoController();

?>