<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>
<?php
require 'conexion_bd.php';

//Clase de solicitud
class Maestro{
    //Propiedades o Atributos
    public $nombre = "";
    public $nombreErr = "";
    public $carrera = "";
    public $carreraErr = "";
    public $telefono = "";
    public $telefonoErr = "";
    public $cont = 0;

    //Método para validar los datos de entrada
    public function validar($con){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
                $this-> nombreErr = "Ingrese su nombre";
            } else {
                $this-> nombre = test_input($_POST["nombre"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$this-> nombre)) {
                    $this-> nombreErr = "Solamente esta permitido letras y especios blancos";
                } else {
                    $this-> cont++;
                }
            }

            $this-> carrera = test_input($_POST["carrera"]);

            if (empty($_POST["telefono"])) {
                $this-> telefonoErr = "Ingrese su telefono";
            } else {
                $this-> telefono = test_input($_POST["telefono"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9]*$/",$this-> telefono)) {
                    $this-> telefonoErr = "Solamente esta permitido números";
                } else {
                    $this-> cont++;
                }
            }

            //Si cumple la condicion entonces se registra en la base de datos
            if ($this-> cont == 2) {
                $this-> registrar($con);
            }

        }
    }

    //funcion para hacer registro de alumno en la base de datos
    public function registrar($con){
        $sql = "INSERT INTO Maestros (nombre, carrera, telefono)
                    VALUES ('".$this->nombre ."', '".$this->carrera."', '".$this->telefono."')";

        mysqli_query($con,$sql) or die('Error al ejecutar la insersión :v');
    }

    //Funcion para limpiar las cajas de texto
    public function limpiar(){
        $this-> nombre = "";
        $this-> telefono = "";
    }

}

//Función para limpiar el dato de entrada
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Se crea el objeto de la clase Solicitud
$maestro = new Maestro();

$maestro -> validar($conexion);

$maestro -> limpiar();

?>

<h2>Registro de Maestro</h2>
<p><span class="error">* Campos Necesarios</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $maestro-> nombre;?>">
    <span class="error">* <?php echo $maestro-> nombreErr;?></span>
    <br><br>

    Carrera:
    <select name="carrera">
        <option value="ITI">ITI</option>
        <option value="IM">IM</option>
        <option value="ITM">ITM</option>
        <option value="ISA">ISA</option>
        <option value="PYMES">PYMES</option>
    </select>
    <br><br>

    Telefono: <input type="text" name="telefono" value="<?php echo $maestro-> telefono;?>">
    <span class="error">* <?php echo $maestro-> telefonoErr;?></span>
    <br><br>

    <input type="submit" name="submit" value="Registrar">
</form>

<h4><a href="index.php">Volver al Inicio</a></h4>

</body>
</html>
