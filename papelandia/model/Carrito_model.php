<?PHP
class Carrito extends EntidadBase{
	private $id;
	private $IdUsuario;
	private $fecha;
	private $calle;
	private $altura;
	private $ciudad;
	
	public function __construct($adapter) {
        $table="carro";
        parent::__construct($table, $adapter);
    }
	
	public function __get($property){
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}
	
	public function __set($property, $value){
		if(property_exists($this, $property)){
			$this->$property = $value;
		}
	}
	
	
	
	public function crearCarrito(){
		$qIdUsuario=$this->IdUsuario;
		$qCalle=$this->calle;
		$qAltura = $this->altura;
		$qCiudad=$this->ciudad;
		$query="INSERT INTO carro (idUsuario,fecha,calle,altura,ciudad) VALUES ($qIdUsuario,CURRENT_DATE,'$qCalle','$qAltura','$qCiudad')";
		try{
			return($this->db()->query($query));
		}catch(Exception $e){
			 return ($e->getMessage());
		}
		
	}
	
	public function getCarritoByUsuario($id){
		$sql="SELECT * FROM carro WHERE carro.idUsuario=$id";
		$query=$this->db()->query($sql);
		$row=$query->fetch_object();
		$resultSet=$row;
        return $resultSet;
	}
}

?>