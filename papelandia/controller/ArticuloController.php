<?PHP
class ArticuloController extends ControladorBase{
	public $conexion;
	public $adapter;
	
	 public function __construct() {
        parent::__construct();
		 
        $this->conexion=new Conexion();
        $this->adapter =$this->conexion->conectar();
    }
	
	//muestra los primeros ocho productos en el index
	public function index(){
		$articulo = new Articulo($this->adapter);
		
		$listaArticulos = $articulo->listarPrimeros();
		
		$this->view("index",array(
				"listaArticulos"=>$listaArticulos,
				"UnaVariableDeLaVista"    =>"Valor de la Vista"
			));
	}
	
	public function descripcion(){
		if(isset($_GET["id"])){
			$id=(int)$_GET["id"];
			
			$articulo = new Articulo($this->adapter);
			
			$articulos=$articulo->getById($id);
			
			$this->view("descripcion",array(
					"articulos"=>$articulos,
					"UnaVariableDeLaVista"    =>"Valor de la Vista"
				));
		}
	}
	
	public function prueba(){
		if(isset($_GET["id"])){
			$id=(int)$_GET["id"];
		
			$articulo = new Articulo($this->adapter);
		
			$articulo = $articulo->getById($id);
		
			$this->view("prueba",array(
					"articulo"=>$articulo,
					"UnaVariableDeLaVista"    =>"Valor de la Vista"
				));
		}
	}
}
?>