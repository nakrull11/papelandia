<?PHP
$_SESSION["estadoCliente"];
$_SESSION["idUsuario"];
?>

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
	
	
	
	<div class="container-fluid">
	<h2>Registro</h2>
	</div>
	
    <!-- formulario de registro -->
	<div class="container-fluid bg-info">
		<form name="registro" action="<?php echo $helper->url("usuario","insertar");?>" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" name="inputEmail" placeholder="Email" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Password</label>
					<input type="password" class="form-control" name="inputPassword" placeholder="Password" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputNombre">Nombre</label>
					<input type="text" class="form-control" name="inputNombre" placeholder="Nombre" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputApellido">Apellido</label>
					<input type="text" class="form-control" name="inputApellido" placeholder="Apellido" required>
				</div>
				<div class="form-group col-md-3">
					<label for="inputTelefono">Numero de Telefono</label>
					<input type="text" class="form-control" name="inputTelefono" placeholder="2664123456" required>
				</div>
				<div class="form-group col-md-3">
					<label for="inputCiudad">Ciudad</label>
					<input type="text" class="form-control" name="inputCiudad" placeholder="La punta" required>
				</div>
				<div class="form-group col-md-3">
					<label for="inputCalle">Calle</label>
					<input type="text" class="form-control" name="inputCalle" placeholder="Calle" required>
				</div>
				<div class="form-group col-md-3">
					<label for="inputAltura">Altura</label>
					<input type="text" class="form-control" name="inputAltura" placeholder="Altura" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputFechaNac">Fecha Nacimiento</label>
					<input type="date" class="form-control " name="inputFechaNac" placeholder="dd/mm/aa" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputDNI">Numero DNI</label>
					<input type="text" class="form-control " name="inputDNI" placeholder="DNI" required>
				</div>
			</div>
			
				<div class="form-row">
					<div class="form-check col-md-6 ">
						<input class="form-check-input" type="checkbox" name="comprasMayor" style="margin-left:10px;" onclick="document.getElementById('cuit').disabled =!this.checked;document.getElementById('cuil').disabled = this.checked;">
						<label class="form-check-label" for="gridCheck" style="margin-left:25px;">
						Compras por mayor
						</label><br>
							<div class="form-group ">
								<label for="inputCuit">CUIL</label>
								<input type="text" class="form-control" id="cuil" name="inputCuil" required>
							</div>
							<div class="form-group ">
								<label for="inputCuil">CUIT de tu Empresa</label>
								<input type="text" class="form-control" id="cuit" name="inputCuit" disabled>
							</div>		
					</div>
				<div class="form-group col-md-6">
					<label for="inputCodigo">Codigo de Postal</label>
					<input type="number" class="form-control-lg " name="inputCodigo" placeholder="ej. 5700" required>
				</div>
				
				</div>
				
			<button type="submit" name="envio" class="btn btn-primary">Registrarse</button>
		</form>
	</div>
	
  

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>