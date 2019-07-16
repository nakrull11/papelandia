<?PHP
class DetalleController extends ControladorBase{
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
	
	public function agregarDetalle(){
		if($_SESSION["estadoCliente"]=="logeado"){
			$idUser=$_SESSION["idUsuario"];
			settype($idUser,"integer");
			$carrito = new Carrito($this->adapter);
			$carrito =$carrito->getCarritoByUsuario($idUser);
			$detalle = new Detalle($this->adapter);
			$detalle->idCarro = $carrito->idCarro;
			$detalle->idArticulo = $_POST["articuloId"];
			$detalle->cantArticulo=$_POST["inputCantidad"];
			$cantArticulos = $detalle->cantArticulo;
			$monto= $_POST['precioMinorista'];
			settype($cantArticulos,"double");
			settype($monto,"double");
			$detalle->monto = $cantArticulos * $monto;
			$detalle->insertarDetalle();
			var_dump($idUser,$detalle->idCarro,$detalle->idArticulo,$detalle->cantArticulo,$detalle->monto);
			$this->redirect();
		}
	}
	
	public function listarDetalle(){
		if($_SESSION["estadoCliente"]=="logeado"){
			$idUser=$_SESSION["idUsuario"];
			settype($idUser,"integer");
			$carrito = new Carrito($this->adapter);
			$carrito =$carrito->getCarritoByUsuario($idUser);
			$detalle = new Detalle($this->adapter);
			$detalles = $detalle->detallarCarga($carrito->idCarro);
		}
		
		$this->view("detalle",array(
				"detalles"=>$detalles
			));
	}
	
	public function obtenerFoto(){
		if($_SESSION["estadoCliente"]=="logeado"){
			$idUser=$_SESSION["idUsuario"];
			settype($idUser,"integer");
			$carrito = new Carrito($this->adapter);
			$carrito =$carrito->getCarritoByUsuario($idUser);
			$detalle = new Detalle($this->adapter);
			$detalle = $detalle->detallarCarga($carrito->idCarro);
			$foto = $detalle->obtenerFotoPorArticulo($detalle->idArticulo);
		}
		return $foto;
	}
	
}
?>