<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Papelandia</title>
</head>
<body>
	
	<!-- imagen de portada -->
	<img src="imagenes/portada-verde.png" class="img-fluid" style="height:auto; width:100%;" alt="imagen de fondo">

    <!-- barra de navegacion -->
     <header>
			<div class="container">
             <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-info">
                    <a class="navbar-brand" href="<?php echo $helper->url("articulo","index"); ?>">Papelandia</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenidoNavBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="contenidoNavBar">
                      <ul class="navbar-nav mr-auto">
                        <?PHP
							if($_SESSION["estadoCliente"]=="NOregistrado"){
						  echo "<li class=\"nav-item\">
                          <a class=\"nav-link\" href=".$helper->url("usuario","registro").">Registrarse</a>
							</li>";}
							?>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Ejemplo1</a>
                            <a class="dropdown-item" href="#">Ejemplo2</a>
                            <a class="dropdown-item" href="#">Ejemplo3</a>
                          </div>
                        </li>
						<li class="nav-item active">
                          <a class="nav-link" href="<?PHP echo $helper->url("carrito","carrito");?>"><img src="https://www.sccpre.cat/mypng/full/170-1707415_carrito-de-compras-carro-de-compras-blanco.png" style="width:32px"></a>
                        </li>
                      
						<?PHP 
						if($_SESSION["estadoCliente"]=="logeado"){
						  echo "<li class=\"nav-item mr-auto\">
											<a class=\"nav-link\" href=".$helper->url("usuario","perfil").">Mi perfil</a>
											<a class=\"btn btn-primary\" href=".$helper->url("usuario","cerrarSesion").">Salir</a>
										</li>
								";
						}else if($_SESSION["estadoCliente"]=="NOregistrado"){
							echo "<li class=\"nav-item\"><form class=\"form-inline my-2 my-lg-0\" action=".$helper->url("usuario","login")." method=\"POST\">
										<div class=\"input-group\">
									<div class=\"input-group-prepend\">
										<span class=\"input-group-text\">Email & Contraseña</span>
									</div>
										<input type=\"email\" aria-label=\"Email\" name=\"email\" class=\"form-control\" required>
										<input type=\"password\" aria-label=\"Contraseña\" name=\"contraseña\" class=\"form-control\" required>
									</div>
										<button class=\"btn btn-outline-light my-2 my-sm-0\" type=\"submit\">Ingresar</button>
								  </form></li>";
						} 
						?>
						</ul>
                    </div>
             </nav>
			</div>
		</header>
	
	<!-- imagen de portada -->
	<img src="imagenes/portada-verde.png" class="img-fluid" style="height:auto; width:100%;" alt="imagen de fondo">
	<?php
	$total=0;
	foreach($detalles as $detalle)
	{
		
		$total=$total + $detalle->monto;
	
	}
	?>
   <!-- carrito de compras -->
   <div class="container bg-info">
	<form name="carritoForm">
		<div class="form-row">
			<div class="form-group col-md-3" style="margin:10px; font-size:25px;">
				<label for="inputMonto">Monto total</label>
				<input type="email" class="form-control" id="inputMonto" value="$<?php echo $total?>" readonly>
			</div>
			<div class="form-group col-sm-2" style="margin-top:51px; font-size:25px;">
				<a href="ConfirmarCompra_view.php" class="btn btn-success btn-md active" role="button" aria-pressed="true">Comprar!</a>
			</div>
			<div class="form-group " style="margin-top:51px; font-size:25px;">
				<button class="btn btn-warning" style="" type="submit">Limpiar carrito</button>
			</div>
		</div>
		<?PHP
			//se van a mostrar los articulos de la bd que el usuario a cargado a su carrito
			foreach($detalles as $detalle){
			echo "<div class=\"card\" style=\"width: 18rem;display:inline-flex; margin:15px;\">
			<img src= class=\"card-img-top\" alt=\"...\">
				<div class=\"card-body\">
					<h5 class=\"card-title\">Articulo de ejemplo</h5>
					<a href=\"DetalleArticulo_view.php\" class=\"btn btn-primary\" style=\"margin-bottom: 10px;\">Ver descripcion ejemplo</a>
					<a href=\"#\" class=\"btn btn-success\">Cargar al carrito ejemplo</a>
				</div>
		</div>";
			}
		?>
	 </form>	
	</div>
	
  
    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>