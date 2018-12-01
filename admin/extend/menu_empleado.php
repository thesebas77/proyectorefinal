<nav class="blue">
	<div class="nav-wrapper">
		<a href="../inicio/index.php" class="brand-logo center"><img src="../img/logo.png"style="width:140px "></a>
		<a href="" data-activates="menu" class="button-collpase"> <i class="material-icons">menu</i> </a>
	</div>
</nav>

<ul id="menu" class="side-nav fixed">
	<li>
		<div class="userView">
			<div class="background blue">
				<img class="right" src="../img/logo.png"style="width:110px ">
			</div>
			<a href=""><?php echo $_SESSION['nom'], '-' ,$_SESSION['ape']; ?></a>
		</div>
	</li>
	<li><a href="../inicio"><i class="material-icons">home</i>Inicio</a></li>
	<li><div class="divider"></div></li>
	<li><a href="../perfil/index.php"><i class="material-icons">settings</i>Editar perfil</a></li>
	<li><div class="divider"></div></li>	
	<li><a href="../../salir.php"><i class="material-icons">power_settings_news</i>Salir</a></li>
	<li><div class="divider"></div></li>

</ul>
