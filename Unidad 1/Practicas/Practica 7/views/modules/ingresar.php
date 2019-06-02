
	<div id="single-wrapper">
		<form method="post" action="#" class="frm-single">
			<div class="inside">
				<div class="title"><strong>Yu</strong>School Assistent</div>
				<!-- /.title -->
				<div class="frm-title">Login</div>
				<!-- /.frm-title -->
				<div class="frm-input"><input name="usuarioIngreso" required type="text" placeholder="Usuario" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
				<!-- /.frm-input -->
				<div class="frm-input"><input name="passwordIngreso" required type="password" placeholder="Contraseña" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
				<!-- /.frm-input -->

				<!-- /.clearfix -->
				<button type="submit" class="frm-submit">Ingresar<i class="fa fa-arrow-circle-right"></i></button>

				<!-- /.row -->
				<a href="index.php?action=registrar" class="a-link"><i class="fa fa-key"></i>No tienes una cuenta? Registrar.</a>
				<div class="frm-footer">YuSchoolAssistent © 2019.</div>
				<!-- /.footer -->
			</div>
			<!-- .inside -->
		</form>
		<!-- /.frm-single -->
	</div><!--/#single-wrapper -->

<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>
