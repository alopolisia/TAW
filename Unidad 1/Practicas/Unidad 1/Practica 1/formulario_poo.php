<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>
<?php

//Clase de solicitud
class Solicitud{
    //Propiedades o Atributos
    public $name = "";
    public $nameErr = "";
    public $email = "";
    public $emailErr = "";
    public $gender = "";
    public $genderErr = "";
    public $comment = "";
    public $commentErr = "";
    public $website = "";
    public $websiteErr = "";

    //Método para imprimir las propiedades del objeto
    public function imprimir(){
        echo "<h2>Your Input:</h2>";
        echo $this -> name;
        echo "<br>";
        echo $this -> email;
        echo "<br>";
        echo $this -> website;
        echo "<br>";
        echo $this -> comment;
        echo "<br>";
        echo $this -> gender;
    }

    //Método para validar los datos de entrada
    public function validar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $this-> nameErr = "Name is required";
            } else {
                $this-> name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$this-> name)) {
                    $this-> nameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])) {
                $this-> emailErr = "Email is required";
            } else {
                $this-> email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($this-> email, FILTER_VALIDATE_EMAIL)) {
                    $this-> emailErr = "Invalid email format";
                }
            }
            if (empty($_POST["website"])) {
                $this-> website = "";
            } else {
                $this-> website = test_input($_POST["website"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this-> website)) {
                    $this-> websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $this-> comment = "";
            } else {
                $this-> comment = test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                $this-> genderErr = "Gender is required";
            } else {
                $this-> gender = test_input($_POST["gender"]);
            }
        }
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
$solicitud = new Solicitud();

$solicitud -> validar();

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $solicitud-> name;?>">
    <span class="error">* <?php echo $solicitud-> nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $solicitud-> email;?>">
    <span class="error">* <?php echo $solicitud-> emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $solicitud-> website;?>">
    <span class="error"><?php echo $solicitud-> websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $solicitud-> comment;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($solicitud-> gender) && $solicitud-> gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($solicitud-> gender) && $solicitud-> gender=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $solicitud-> genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    //Imprimir las propiedades
    $solicitud -> imprimir();
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
