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
					<h4 class="box-title">Nueva Reservación</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputEmail1">Id Cliente</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="id_cliente">
										<?php $vista -> idClienteController(); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Id Habitacion</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="id_habitacion">
										<?php $vista -> idHabitacionController(); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Fecha de Entrada</label>
								
									<div class="input-group">
										<input type="date" class="form-control" placeholder="mm/dd/yyyy" id="" name="fecha" required>
										<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
									</div>
									<!-- /.input-group -->
								
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Días de Hospedaje</label>
								<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Días" name="dias"  min="1" max="7" required>
							</div>
							<button type="submit" name="reservar" class="btn btn-primary btn-sm waves-effect waves-light">Reservar</button>
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
	$vista -> agregarReservacionController();

?>