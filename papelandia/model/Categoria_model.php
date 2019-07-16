<?PHP
class Categoria extends EntidadBase{
	private $id;
	private $nombreCategoria;
	private $descripcionCategoria;
	private $estadoCategoria;
	
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
	
}
?>