<?PHP
class Detalle extends EntidadBase{
	private $idDetalle;
	private $idCarro;
	private $idArticulo;
	private $cantArticulo;
	private $monto;
	
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
	
	public function insertarDetalle(){
		$qIdCarro = $this->idCarro;
		$qIdArticulo= $this->idArticulo;
		$qCantArticulo = $this->cantArticulo;
		$qMonto = $this->monto;
		$query = "INSERT into detalle (idCarro,idArticulo,cantidadArticulo,monto) VALUES ('$qIdCarro','$qIdArticulo','$qCantArticulo','$qMonto');";
		$this->db()->query($query);
	}
	
	//devuelve todos los productos que el usuario cargo para comprar
	public function detallarCarga($idCarro){
		$sql="SELECT * FROM detalle WHERE detalle.idCarro =$idCarro";
		$query=$this->db()->query($sql);
		while($row = $query->fetch_object()){
        $resultSet[]=$row;}
        return $resultSet;
	}
	
	public static function obtenerFotoPorArticulo($id){
		$sql="SELECT DISTINCT articulo.foto FROM articulo,detalle WHERE detalle.idArticulo = articulo.id AND articulo.id= '$id'";
		$query=db()->query($sql);
		$row=$query->fetch_object();
		$resultSet= $row;
		return $resultSet;
	}

	
}

?>