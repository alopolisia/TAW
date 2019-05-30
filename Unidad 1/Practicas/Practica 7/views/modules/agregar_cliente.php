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
				<div class="box-content card white">
					<h4 class="box-title">Nuevo Cliente</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputPassword1">Nombre</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Completo" name="nombre" required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Fecha de Nacimiento</label>
								
									<div class="input-group">
										<input type="date" class="form-control" placeholder="mm/dd/yyyy" id="" name="fecha_naci" required>
										<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
									</div>
									<!-- /.input-group -->
								
							</div>
				
							<div class="form-group">
								<label for="exampleInputEmail1">Correo</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo Electrónico" name="correo" required>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Telefono</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tipo</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="tipo">
										<option value="habitual">Habitual</option>
										<option value="esporádico">Esporádico</option>
									</select>
								</div>
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
	$vista -> agregarClienteController();

?>