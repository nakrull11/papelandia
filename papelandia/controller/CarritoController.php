<?PHP
class CarritoController extends ControladorBase{
	public $conexion;
	public $adapter;
	
	 public function __construct() {
		//session_start();
        parent::__construct();
			
        $this->conexion=new Conexion();
        $this->adapter =$this->conexion->conectar();
    }
	
	public function carrito(){
		$this->view("carrito",array());
	}
}
?>