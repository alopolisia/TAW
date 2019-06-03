<?php

	if(!$_SESSION["validar"]){

		header("location:index.php?action=ingresar");

		exit();

	}

	$vista = new MvcController();
	$valores = $vista -> editarProfesorController();

?>

<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Profesor con id: <?php echo $valores["id"]; ?></h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<input type="hidden" value="<?php echo $valores["id"]; ?> " name="id">
							<div class="form-group">
								<label for="exampleInputPassword1">Nombre</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Completo" name="nombre" value="<?php echo $valores["nombre"]; ?>" required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Fecha de Nacimiento</label>
								
									<div class="input-group">
										<input type="date" class="form-control" placeholder="mm/dd/yyyy" id="" name="fecha_naci" value="<?php echo $valores["fecha_naci"]; ?>" required>
										<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
									</div>
									<!-- /.input-group -->
								
							</div>
				
							<div class="form-group">
								<label for="exampleInputEmail1">Correo</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo Electrónico" name="correo" value="<?php echo $valores["correo"]; ?>" required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Telefono</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" value="<?php echo $valores["telefono"]; ?>" required>
							</div>
							
							<div class="box-content">
								<h4 class="box-title">Imagen</h4>
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

	$vista -> actualizarProfesorController();

?>