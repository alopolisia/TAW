<?php

if(!$_SESSION["validar"]){

	header("location:index.php");

	exit();

}

?>
<div id="wrapper">
    <div class="col-md-12">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <br>
                <div class="col-sm-8">
                    <h2><b>Lista de Ventas</b></h2>
                </div>
                <div class="col-sm-4">
                    <a href="index.php?action=nuevaVenta" class="btn btn-info add-new"><i class="fa fa-user-plus"></i>Agregar una nueva Venta</a>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box-content">
                    <table class="table table-striped table-bordered display">

                		<thead>

                			<tr>
                				<th>Id</th>
                				<th>Nombre</th>
                				<th>Cantidad</th>
                				<th>Subtotal</th>
                				<th>Editar</th>
                                <th>Borrar</th>

                			</tr>

                		</thead>

                		<tbody>

                			<?php

                			$vistaUsuario = new MvcController();
                			$vistaUsuario -> vistaVentasController();
                			?>

                		</tbody>

                	</table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";

	}

}

?>
