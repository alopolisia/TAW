<?php

	if(!$_SESSION["validar"]){

		header("location:index.php?action=ingresar");

		exit();

	}

	$vista = new MvcController();
	$valores = $vista -> editarHabitacionController();

?>

<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Habitación <?php echo $valores["numero"]; ?></h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<input type="hidden" value="<?php echo $valores["numero"]; ?> " name="numero">
							<div class="form-group">
								<label for="exampleInputEmail1">Tipo</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="tipo">
										<option value="simple">Simple</option>
										<option value="doble">Doble</option>
										<option value="matrimonial">Matrimonial</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Precio</label>
								<input type="text" value="<?php echo $valores["precio"]; ?> " class="form-control" id="exampleInputPassword1" placeholder="Precio de la habitación" name="precio" required>
							</div>
							<div class="box-content">
								<h4 class="box-title">Nueva Imagen</h4>
								<!-- /.dropdown js__dropdown -->
								<input type="file" name="file" required id="input-file-now" class="dropify" />
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

	$vista -> actualizarHabitacionController();

?>