<?php

    class EnlacesPaginas{

        public function enlacesPaginasModel($enlacesModel){
            if (($enlacesModel == "nosotros") || ($enlacesModel == "servicios") || ($enlacesModel == "contactenos")) {
                $module = "Views/modules/".$enlacesModel.".php";
            } elseif ($enlacesModel == "index") {
                $module = "Views/modules/inicio.php";
            } else {
                $module = "Views/modules/inicio.php";
            }

            return $module;
        }
    }

?>
