<?php
	if ($_SESSION["validar"]) {

?>
		<div class="header-top">
			<div class="container">
				<div class="pull-left">
					<a href="index.html" class="logo">Yu Business</a>
				</div>
				<!-- /.pull-left -->
				<div class="pull-right">
					<div class="ico-item hidden-on-desktop">
						<button type="button" class="menu-button js__menu_button fa fa-bars waves-effect waves-light"></button>
					</div>
					<!-- /.ico-item hidden-on-desktop -->
					<div class="ico-item">
						<a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
						<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
						<!-- /.searchform -->
					</div>
					<!-- /.ico-item -->
					<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
					<!-- /.ico-item fa fa-fa-arrows-alt -->
					
					<!-- /.ico-item -->
					<div class="ico-item">
						<a href="#" class="ico-item fa fa-user js__toggle_open" data-target="#user-status"></a>
						<div id="user-status" class="user-status js__toggle">
							<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
							<h5 class="name"><a href="profile.html">Emily Stanley</a></h5>
							<h5 class="position">Administrator</h5>
							<!-- /.name -->
							<div class="control-items">
								<div class="control-item"><a href="#" title="Settings"><i class="fa fa-gear"></i></a></div>
								<div class="control-item"><a href="#" class="js__logout" title="Log out"><i class="fa fa-power-off"></i></a></div>
							</div>
							<!-- /.control-items -->
						</div>
						<!-- /#user-status -->
					</div>
					<!-- /.ico-item -->
				</div>
				<!-- /.pull-right -->
			</div>
			<!-- /.container -->
		</div>
		<?php 
			if($_SESSION["tipo"] == 1){
		?>
			<nav class="nav-horizontal">
				<div class="container">			
					<ul class="menu">
							<li class="current">
								<a href="index.php?action=alumnos"><i class="ico fa fa-bed"></i><span>Alumnos</span></a>
							</li>
							
							<li class="has-sub">
								<a href="index.php?action=profesores"><i class="ico fa fa-user"></i><span>Profesores</span></a>
							</li>

							<li class="has-sub">
								<a href="index.php?action=materias"><i class="ico fa fa-bar-chart"></i><span>Materias</span></a>
							</li>

							<li class="has-sub">
								<a href="index.php?action=grupos"><i class="ico fa fa-bar-chart"></i><span>Grupos</span></a>
							</li>

							<li class="has-sub">
								<a href="index.php?action=salir"><i class="ico fa fa-sign-out"></i><span>Salir</span></a>
							</li>
					</ul>
					<!-- /.menu -->
				</div>
				<!-- /.container -->
			</nav>

		<?php
			} else {
		?>

			<nav class="nav-horizontal">
				<div class="container">
					
					<ul class="menu">
							<li class="current">
								<a href="index.php?action=reservaciones"><i class="ico fa fa-book"></i><span>Reservaciones</span></a>
							</li>
							
							<li class="has-sub">
								<a href="index.php?action=habitaciones2"><i class="ico fa fa-bed"></i><span>Habitaciones</span></a>
							</li>

							<li class="has-sub">
								<a href="index.php?action=salir"><i class="ico fa fa-sign-out"></i><span>Salir</span></a>
							</li>
							
					</ul>
					<!-- /.menu -->
				</div>
				<!-- /.container -->
			</nav>

		<?php
			} 
		?>

<?php
	} 
?>

