<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<style>

		nav{
			position:relative;
			margin:auto;
			width:100%;
			height:auto;
			background:black;
		}

		nav ul{
			position:relative;
			margin:auto;
			width:50%;
			text-align: center;
		}

		nav ul li{
			display:inline-block;
			width:24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color:white;
			text-decoration: none;
		}

		
	</style>
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

<?php include "modules/navegacion.php"; ?>


<section>

<?php

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>

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
