<nav class="blue darken-3">
	<div class="nav-wrapper">
		<a href="../inicio/index.php" class="brand-logo center"><img src="../img/logo.png"style="width:140px "></a>
		<a href="" data-activates="menu" class="button-collpase"> <i class="material-icons">menu</i> </a>
	</div>
</nav>

<ul id="menu" class="side-nav fixed">
	<li>
		<div class="userView">
			<div class="background blue darken-3">
				<img class="right" src="../img/logo.png"style="width:110px ">
			</div>
			<strong class="white-text"><?php echo $_SESSION['nom'];?>  <?php echo $_SESSION['ape'];  ?></strong>
		</div>
	</li>
	<li><a href="../inicio"><i class="material-icons green-text">home</i>Inicio</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Propietarios</a></li>
	<li><a href="../clientes"><i class="material-icons blue-text">contacts</i>Registrar</a></li>
	<li><a href="../clientes/list_clientes.php"><i class="material-icons blue-text">contacts</i>Lista</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Vehiculos</a></li>
	<li><a href="../vehiculos/index.php"><i class="material-icons red-text">directions_car</i>Registrar</a></li>
	<li><a href="../vehiculos/list_vehiculos.php"><i class="material-icons red-text">directions_car</i>Lista</a></li>
	<li><a href="../vehiculos/list_baja_vehiculos.php"><i class="material-icons red-text">local_car_wash</i>Bajas</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Informes</a></li>
	<li><a href="../informes/recaudacion.php"><i class="material-icons orange-text">info</i>Recaudación</a></li>
	<li><a href="../informes/deuda.php"><i class="material-icons orange-text">info</i>Deuda Fiscal</a></li>
	<li><a href="../importacion/importarIndex.php"><i class="material-icons orange-text">info</i>Importar Cotización fiscal nacional</a></li>
    

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Usuarios</a></li>
	<li><a href="../usuarios"><i class="material-icons purple-text">person</i>Registrar</a></li>
	<li><a href="../usuarios/list_usuarios.php"><i class="material-icons purple-text">person</i>Lista</a></li>

	<li><div class="divider"></div></li>

	<li><a href="../perfil/index.php"><i class="material-icons grey-text">settings</i>Editar perfil</a></li>

	<li><div class="divider"></div></li>

	<li><a href="../../salir.php"><i class="material-icons red-text">power_settings_news</i>Salir</a></li>

	<li><div class="divider"></div></li>

</ul>

	