
<header class="main-header dis" >

	<!--=====================================
	 LOGOTIPO
	 ======================================-->
	<a href="inicio" class="logo">

		<!-- logo mini -->
		<span class="logo-mini">

			<img src="vistas/img/plantilla/uruz_logo2.jpg" class="img-responsive" style="padding:5px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">

			<img src="vistas/img/plantilla/uruz_logo1.jpg" class="img" style="padding:0px 0px" height="50px">

		</span>

	</a>

	<!--=====================================
	 BARRA DE NAVEGACIÓN
	 ======================================-->
	<nav class="navbar navbar-static-top text-center" id="f" role="navigation" style="background-color: #153959;">

		<!-- Botón de navegación -->

		<div class="col-2 border">
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

				<span class="sr-only">Toggle navigation</span>

			</a>
		</div>
		
			<span class=" navbar-item col-2">

				<img src="vistas/img/plantilla/uruz_logo1.jpg" class="img" style="padding:0px 0px" height="50px">

			</span>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu col-2">

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<?php

						if ($_SESSION["foto"] != "") {

							echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';
						} else {


							echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
						}


						?>

						<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

						<li class="user-body">

							<div class="pull-right">

								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>
	</nav>

</header>
<style>
	@media only screen and (max-width:480px){
		.logo{
			visibility: hidden;
			height: 0px;
		}
		.dis{
			display: flex;
		}
		#f{
			position: absolute;
		}
		
	}
</style>