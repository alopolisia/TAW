<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Practica 3</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Rouand|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style media="screen">

    </style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Lista de Clientes</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-user-plus"></i>Agregar un nuevo cliente</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
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
                                     '<a href="delete.php?id='.$row['id']. '" class="btn btn-info btn-xs"  title="Eliminar">
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
</body>
</html>
