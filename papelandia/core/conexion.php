<?PHP
class Conexion{
	private $driver;
	private $host, $user, $pass, $database, $charset;
	
	 public function __construct() {
        $db_cfg = require_once 'config/db_config.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }
	
	public function conectar(){
		 if($this->driver=="mysql" || $this->driver==null){
 
			try{
				$conexion=new mysqli($this->host, $this->user, $this->pass, $this->database);
				$conexion->query("SET NAMES '".$this->charset."'");
			}catch(Exception $e){
				echo 'Mensaje : ' .$e->getMessage(); 	
			}
        }
        
        return $conexion;
	}
}
?>