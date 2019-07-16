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

	<div class="container">
		<img src="imagenes/portada-blanco.png" class="img-fluid" alt="imagen de fondo">
	</div>
	
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
                          <a class="nav-link" href="<?PHP echo $helper->url("detalle","listarDetalle");?>"><img src="https://www.sccpre.cat/mypng/full/170-1707415_carrito-de-compras-carro-de-compras-blanco.png" style="width:32px"></a>
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
	<img src="imagenes/portada-verde.png" class="img-fluid" alt="imagen de fondo">
	
	<!-- titulo de la pagina -->
	<div class="container-fluid">
	<h2>Detalle: <?php echo $articulo->nombreArticulo; ?></h2>
	</div>
	
	<!-- cartas de articulos -->
	<div class="container bg-info">
		<div class="row">
		<form name="carritoForm" action="<?php echo $helper->url("detalle","agregarDetalle")?>" method="POST">
		<div class="card mb-3" style="max-width: 540px; margin-top:20px;">
			<div class="row no-gutters">
				<div class="col-md-4">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $articulo->foto ).'"/ class="card-img" alt="...">'; ?>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?php $articulo->nombreArticulo ?></h5>
							<p class="card-text"><?php echo $articulo->descripcion; ?></p>
							<p class="card-text"><strong>Marca</strong>:<?php echo $articulo->marca; ?></p>
							<p class="card-text"></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col bg-light" style="margin:15px; border-radius:5px;">
		<ul style="margin:30px;">
			<li>Precio: <?php echo $articulo->precioMinorista ?></li>
			<input type="hidden" name="precioMinorista" value=<?php echo $articulo->precioMinorista ?>>
			<input type="hidden" name="articuloId" value=<?php echo $articulo->id ?>>
			<li>Stock:  <?php echo $articulo->stock ?></li>
			<li>Mayorista Min.Unidades: <?php echo $articulo->cantMinimaMayorista ?></li>
			<li>Descuento Mayorista: <?php echo $articulo->porcDescuentoMayorista ?>%</li>
			<li>Precio Final: $<?php echo $articulo->precioMinorista ?></li>
		</ul>
		
		<div class="form-row">
			<div class="form-group col-md-3" style="margin:10px;">
				<label for="inputCantidad">Cantidad</label>
					<input type="number" class="form-control" min="1" max="<?php echo $articulo->stock ?>" name="inputCantidad" required> 
			</div>
			<div class="form-group " style="margin-top:40px;">
					<button class="btn btn-success" style="" type="submit">Agregar  al carrito</button>
			</div>
				<div class="form-group col-md-3" style="margin-top:40px;">
					<a href="Carrito_view.php" class="btn btn-info" role="button" aria-pressed="true">Cancelar</a>
				</div>
		</div>
		</div>
		</form>
		</div>
	</div>
		
  
    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>