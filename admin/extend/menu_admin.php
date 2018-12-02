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
			<a href=""><?php echo $_SESSION['nom'], '-' ,$_SESSION['ape']; ?></a>
		</div>
	</li>
	<li><a href="../inicio"><i class="material-icons">home</i>Inicio</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Propietarios</a></li>
	<li><a href="../clientes"><i class="material-icons">contacts</i>Registrar</a></li>
	<li><a href="../clientes/list_clientes.php"><i class="material-icons">contacts</i>Lista</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Vehiculos</a></li>
	<li><a href="../vehiculos/index.php"><i class="material-icons">directions_car</i>Registrar</a></li>
	<li><a href="../vehiculos/list_vehiculos.php"><i class="material-icons">directions_car</i>Lista</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Pagos</a></li>

	<li><div class="divider"></div></li>

	<li><a class="subheader center">Usuarios</a></li>
	<li><a href="../usuarios"><i class="material-icons">person</i>Registrar</a></li>
	<li><a href="../usuarios/list_usuarios.php"><i class="material-icons">person</i>Lista</a></li>

	<li><div class="divider"></div></li>

	<li><a href="../perfil/index.php"><i class="material-icons">settings</i>Editar perfil</a></li>

	<li><div class="divider"></div></li>

	<li><a href="../../salir.php"><i class="material-icons">power_settings_news</i>Salir</a></li>

	<li><div class="divider"></div></li>

</ul>

	