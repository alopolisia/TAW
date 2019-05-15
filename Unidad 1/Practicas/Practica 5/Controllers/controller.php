<?php

    class MvcController{
        //Llamar a la plantilla
        public function plantilla(){
            //include se utiliza para invocar el archivo que tiene el cógio HTML
            include "Views/template.php";
        }

        //Interacción con el usuario
        public function enlacesPaginasController(){
            if (isset($_GET["action"])) {
                $enlacesController = $_GET["action"];
            } else {
                $enlacesController = "index";
            }

            //Invocacion a un modelo -> llamando la clase::metodo()
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);

            include $respuesta;
        }

    }

?>
