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
                          <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Registro_view.php">Registrarse</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
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
	<img src="imagenes/portada-verde.png" class="img-fluid" style="height:auto; width:100%;" alt="imagen de fondo">
	
   <!-- carrito de compras -->
   <div class="container bg-info">
	<form name="carritoForm">
		<div class="form-row">
			<div class="form-group col-md-3" style="margin-top:10px; font-size:25px;">
				<label for="inputMonto">Monto total a pagar</label>
				<input type="email" class="form-control" id="inputMonto" value="$0,00" readonly>
			</div>
			
		</div>
		
		
		
		<div class="input-group mb-3">
			<div class="input-group-prepend">
			<label class="input-group-text" for="inputGroupSelect01">Metodo de pago</label>
			</div>
			<select class="custom-select" id="inputGroupSelect01">
				<option selected>Elegi un metodo de pago...</option>
				<option value="1">Efectivo</option>
				<option value="2">Tarjeta</option>
			</select>
		</div>
		<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputCodPostal">Codigo Postal</label>
					<input type="email" class="form-control" id="inputCodPostal" placeholder="Cod.Postal">
				</div>
			</div>
		<div class="form-row">
			<div class="form-group col-sm-2 ">
					<button class="btn btn-success" style="" type="submit">Generar boleta</button>
				</div>
				<div class="form-group">
					<a href="Carrito_view.php" class="btn btn-danger btn-md" role="button" aria-pressed="true">Cancelar</a>
				</div>
		</div>
	 </form>	
	</div>
	
  
    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>