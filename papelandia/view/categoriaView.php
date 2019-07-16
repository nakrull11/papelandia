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
                    <a class="navbar-brand" href="index.php">Papelandia</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenidoNavBar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="contenidoNavBar">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Registro_view.php">Registrarse</a>
                        </li>
                        <li class="nav-item dropdown active">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias <span class="sr-only">(current)</span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Categoria_view.php">Ejemplo1</a>
                            <a class="dropdown-item" href="Categoria_view.php">Ejemplo2</a>
                            <a class="dropdown-item" href="Categoria_view.php">Ejemplo3</a>
                          </div>
                        </li>
						<li class="nav-item active">
                          <a class="nav-link" href="Carrito_view.php"><img src="imagenes/carrito-compras.png" style="width:32px"></a>
                        </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Email & Contraseña</span>
								</div>
								<input type="text" aria-label="Usuario" class="form-control">
								<input type="password" aria-label="Contraseña" class="form-control">
						</div>
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ingresar</button>
                      </form>
                    </div>
             </nav>
			</div>
    </header>
    
	<!-- imagen de portada -->
	<img src="imagenes/portada-verde.png" class="img-fluid" alt="imagen de fondo">
	
	<!-- titulo de la pagina -->
	<div class="container-fluid">
	<h2>Categoria: Ejemplo</h2>
	</div>
	
	<!-- cartas de articulos -->
	<div class="container-fluid bg-info">
		
		
		<div class="input-group mb-2 col-3">
			<div class="input-group-prepend">
			<label class="input-group-text" for="inputGroupSelect01" style="margin-top:20px;">Orden</label>
			</div>
			<select class="custom-select" id="inputGroupSelect01" style="margin-top:20px;">
				<option selected>Mas Relevantes</option>
				<option value="1">Mayor a menor precio</option>
				<option value="2">Menos a mayor precio</option>
				<option value="2">Mayor Descuento</option>
			</select>
		</div>
		<?PHP
			//se van a mostrar los articulos de la bd
			for($i=0;$i<4;$i++){
			echo "<div class=\"card\" style=\"width: 18rem;display:inline-flex; margin:15px;\">
					<img src=\"imagenes/ejemploArticulo.jpg\" class=\"card-img-top\" alt=\"...\">
						<div class=\"card-body\">
							<h5 class=\"card-title\">Articulo de ejemplo</h5>
							<p class=\"card-text\">Descripcion de articulo de ejemplo</p>
							<a href=\"#\" class=\"btn btn-primary\">Cargar al carrito ejemplo</a>
						</div>
				</div>";
			}
		?>
	</div>
  
    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>