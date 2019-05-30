<?php

	if(!$_SESSION["validar"]){

		header("location:index.php?action=ingresar");

		exit();

	}

	$vistaUsuario = new MvcController();

?>

<div id="wrapper">
	<div class="main-content container">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Ganancias por mes</h4>				
						<form method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label for="exampleInputEmail1">Selecciona un mes en específico</label>
								<div class="form-group margin-bottom-20">
									<select class="form-control" name="mes">
										<option value="1">Enero</option>
										<option value="2">Febrero</option>
										<option value="3">Marzo</option>
										<option value="4">Abril</option>
										<option value="5">Mayo</option>
										<option value="6">Junio</option>
										<option value="7">Julio</option>
										<option value="8">Agosto</option>
										<option value="9">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
								</div>
							</div>
							<button type="submit" name="buscar" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Dias</th>
								<th>Precio</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Fecha</th>
								<th>Dias</th>
								<th>Precio</th>
								<th>Subtotal</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$total = $vistaUsuario -> vistaGananciaController();

							?>
						</tbody>
					</table>
					<h1 class="box-title">Total: <?php echo $total; ?></h1>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
	</div>
</div>		





