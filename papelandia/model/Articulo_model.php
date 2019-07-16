<?PHP
class Articulo extends EntidadBase{
	
	private $id;
	private $nombreArticulo;
	private $descripcion;
	private $marca;
	private $foto;
	private $precioMinorista;
	private $cantMinimaMayorista;
	private $porcDescuentoMayorista;
	private $porDescOferta;
	private $categoria;
	private $stock;
	
	 public function __construct($adapter) {
        $table="articulo";
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