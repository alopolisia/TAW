<?php
    include("database.php");
    $bd = new Database();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Practica 3</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="../Deportes/assets/styles/style.min.css">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="../Deportes/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="../Deportes/assets/plugin/waves/waves.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../Deportes/assets/plugin/sweet-alert/sweetalert.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="../Deportes/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../Deportes/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

    <!-- Color Picker -->
    <link rel="stylesheet" href="../Deportes/assets/color-switcher/color-switcher.min.css">


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
                        <h2><b>Contando Datos</b></h2>
                    </div>
                </div>

                <!-- Tabla de Usuarios -->
                <div class="col-xs-12">
                    <div class="box-content">
                        <table class="table table-striped">
                            <caption><h1>TOTALES</h1></caption>
                            <thead>
                                <tr>
                                    <th>Usuarios</th>
                                    <th>Tipos</th>
                                    <th>Status</th>
                                    <th>Accesos</th>
                                    <th>Usuarios Activos</th>
                                    <th>Usuarios Inactivos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #Cantidad de Usuarios
                                $sql = "SELECT * FROM user";
                                $cant1 = $bd->read($sql)->rowCount();

                                #Cantidad de Tipo de Usuarios
                                $sql = "SELECT * FROM user_type";
                                $cant2 = $bd->read($sql)->rowCount();

                                #Cantidad de Tipo de Estado
                                $sql = "SELECT * FROM status";
                                $cant3 = $bd->read($sql)->rowCount();

                                #Cantidad de Acceso
                                $sql = "SELECT * FROM user_log";
                                $cant4 = $bd->read($sql)->rowCount();

                                #Cantidad de Usuarios Activos
                                $sql = "SELECT * FROM user WHERE user_type_id=1";
                                $cant5 = $bd->read($sql)->rowCount();

                                #Cantidad de Usuarios Inactivos
                                $sql = "SELECT * FROM user WHERE user_type_id=2";
                                $cant6 = $bd->read($sql)->rowCount();

                                #Mostrar la tabla
                                echo "<tr>";
                                echo "<td>" . $cant1 . "</td>";
                                echo "<td>" . $cant2 . "</td>";
                                echo "<td>" . $cant3 . "</td>";
                                echo "<td>" . $cant4 . "</td>";
                                echo "<td>" . $cant5 . "</td>";
                                echo "<td>" . $cant6 . "</td>";
                                echo "</tr>";

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabla de Usuarios -->
                <div class="col-xs-12">
                    <div class="box-content">
                        <table class="table table-striped">
                            <caption><h2>Tabla - User</h2></caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Satus Id</th>
                                    <th>User Type Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user";

                                $clientes = $bd->read($sql);

                                //Desplegar la tabla
                                foreach($clientes as $row) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['pass'] . "</td>";
                                    echo "<td>" . $row['status_id'] . "</td>";
                                    echo "<td>" . $row['user_type_id'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabla de Log de Usuario -->
                <div class="col-xs-12">
                    <div class="box-content">
                        <table class="table table-striped">
                            <caption><h2>Tabla - User Log</h2></caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date logged</th>
                                    <th>User Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user_log";

                                $clientes = $bd->read($sql);

                                //Desplegar la tabla
                                foreach($clientes as $row) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['date_logged'] . "</td>";
                                    echo "<td>" . $row['user_id'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabla de Tipo de Usuario -->
                <div class="col-xs-12">
                    <div class="box-content">
                        <table class="table table-striped">
                            <caption><h2>Tabla - User Type</h2></caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user_type";

                                $clientes = $bd->read($sql);

                                //Desplegar la tabla
                                foreach($clientes as $row) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabla de Estado de Usuario -->
                <div class="col-xs-12">
                    <div class="box-content">
                        <table class="table table-striped">
                            <caption><h2>Tabla - Satus</h2></caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM status";

                                $clientes = $bd->read($sql);

                                //Desplegar la tabla
                                foreach($clientes as $row) {
                                    echo "<tr>";
                                    echo '<th scope="row">' . $row['id'] . '</th>';
                                    echo "<td>" . $row['name'] . "</td>";
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

    <script src="../Deportes/assets/scripts/jquery.min.js"></script>
    <script src="../Deportes/assets/scripts/modernizr.min.js"></script>
    <script src="../Deportes/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Deportes/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Deportes/assets/plugin/nprogress/nprogress.js"></script>
    <script src="../Deportes/assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="../Deportes/assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="../Deportes/assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Data Tables -->
    <script src="../Deportes/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../Deportes/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="../Deportes/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="../Deportes/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
    <script src="../Deportes/assets/scripts/datatables.demo.min.js"></script>

    <script src="../Deportes/assets/scripts/main.min.js"></script>
</body>
</html>
