
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
                    <div class="col-sm-4">
                        <h2><b>Lista de Jugadores</b></h2>
                    </div>
                    <div class="">
                        <div class="col-sm-4">
                            <a href="registros2.php" class="btn btn-info add-new"><i class="fa fa-user-plus"></i>Ir a la sección de Basquetbol</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="create.php" class="btn btn-info add-new"><i class="fa fa-user-plus"></i>Agregar un nuevo jugador</a>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12">
                    <div class="box-content">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Número de Dorso</th>
                                    <th>Nombre</th>
                                    <th>Posición</th>
                                    <th>Carrera</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Número de Dorso</th>
                                    <th>Nombre</th>
                                    <th>Posición</th>
                                    <th>Carrera</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                include("database.php");
                                $bd = new Database();

                                $sql = "SELECT * FROM futbol";

                                $clientes = $bd->read($sql);

                                //Desplegar la tabla
                                foreach($clientes as $row) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['posicion'] . "</td>";
                                    echo "<td>" . $row['carrera'] . "</td>";
                                    echo "<td>" . $row['correo'] . "</td>";
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

    <script type="text/javascript">
    function cambiarTipo($var){
        if ($_SESSION['tipo'] == 1) {

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
