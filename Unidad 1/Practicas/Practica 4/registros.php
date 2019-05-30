<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Practica 3</title>

    <!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

	<!-- Color Picker -->
	<link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="wrapper">
        <div class="col-md-12">
            <div class="row small-spacing">

                <div class="col-xs-12">
                    <br>
                    <div class="col-sm-8">
                        <h2><b>Lista de Clientes</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-user-plus"></i>Agregar un nuevo cliente</a>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="box-content">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                include("database.php");
                                $bd = new Database();
                                $clientes = $bd->read();

                                //Desplegar la tabla
                                while ($row = mysqli_fetch_array($clientes)) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['nombres'] . "</td>";
                                    echo "<td>" . $row['apellidos'] . "</td>";
                                    echo "<td>" . $row['telefono'] . "</td>";
                                    echo "<td>" . $row['direccion'] . "</td>";
                                    echo "<td>" . $row['correo_electronico'] . "</td>";
                                    echo "<td>" . '<div class="btn-group">' .
                                    '<a href="update.php?id='.$row['id']. '" class="btn btn-info btn-xs"  title="Actualizar">
                                    <i class="fa fa-edit"></i> </a>'.
                                    '<a href="delete.php?id='.$row['id']. '" class="btn btn-info btn-xs"  title="Eliminar" onclick="return confirmation()">
                                    <i class="fa fa-trash"></i> </a></div>'
                                    ."</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript">
    //Funcion para la confirmacion del boton de eliminar
        function confirmation(){
            if (confirm("Seguro que desea eliminar el registro?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Data Tables -->
    <script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
    <script src="assets/scripts/datatables.demo.min.js"></script>

    <script src="assets/scripts/main.min.js"></script>
</body>
</html>
