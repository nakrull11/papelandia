<?php
class UsuarioController extends ControladorBase{
	public $conexion;
	public $adapter;
	
	 public function __construct() {
		//session_start();
        parent::__construct();
			
        $this->conexion=new Conexion();
        $this->adapter =$this->conexion->conectar();
    }
	

	public function registro(){
		$this->view("registro",array());
	}
	
	public function insertar(){
				$usuario=new Usuario($this->adapter);
				$usuario->nombre=($_POST["inputNombre"]);
				$usuario->apellido=($_POST["inputApellido"]);
				$usuario->dni=($_POST["inputDNI"]);
				$usuario->email=($_POST["inputEmail"]);
				$dbEmail =($_POST["inputEmail"]);
				$usuario->password=($_POST["inputPassword"]);
				$dbPass =($_POST["inputPassword"]);
				$usuario->estado=1;
				$usuario->fecNac=($_POST["inputFechaNac"]);
				$usuario->telefono=($_POST["inputTelefono"]);
				$usuario->calle=($_POST["inputCalle"]);
				$usuario->altura=($_POST["inputAltura"]);
				$usuario->ciudad=($_POST["inputCiudad"]);
				$usuario->codigoPostal=($_POST["inputCodigo"]);
				
				if(isset($_POST["comprasMayor"])){
						$usuario->cuit=($_POST["inputCuit"]);
						$usuario->cuil = "0";
						$usuario->idTipo = 2;
				}else{
						$usuario->cuil=($_POST["inputCuil"]);
						$usuario->cuit="0";
						$usuario->idTipo=1;
				}
				
					$usuario->guardar();
					$_SESSION["estadoCliente"]="logeado";
					$_SESSION["idUsuario"]=$usuario->obtenerId($usuario->email);
					$idDbUsuario=$usuario->obtenerId($usuario->email);
					settype($idDbUsuario, "integer");
					var_dump($usuario->obtenerId($usuario->email));
					//echo "<script>alert('ocurrio un error al crear el usuario!!')</script>";
				    $carro = new Carrito($this->adapter);
					$carro->IdUsuario =$idDbUsuario;
					$carro->calle = $usuario->calle;
					$carro->altura = $usuario->altura;
					$carro->ciudad = $usuario->ciudad;
					$carro->crearCarrito();
					$this->redirect();
		}
		
		public function cerrarSesion(){
			$_SESSION["estadoCliente"]="NOregistrado";
			$this->redirect();
		}
		
		public function login(){
			if(isset($_POST['email'])){
				
			
			$usuario = new Usuario($this->adapter);
			
			$userEmail=$_POST['email'];
			$passwordUsuario=$_POST['contraseña'];
			
			if($usuario->autenticar($userEmail,$passwordUsuario)>0){
				$idDb=$usuario->obtenerId($userEmail);
				$_SESSION["estadoCliente"]="logeado";
				$_SESSION["idUsuario"]=$idDb;
				$_SESSION["mensajeLogin"]="Bienvenido";
			}else $_SESSION["estadoCliente"]="NOregistrado";
				  $_SESSION["idUsuario"]=$idDb;
				  $_SESSION["mensajeLogin"]="Correo y/o contraseña incorrectos!";
				  $this->redirect();
				  echo "<script>
							alert('Mensaje');
							window.location= 'indexView.php'
						</script>";
			}
		}
		
			
	
	
	
}
?>