<?PHP
class Usuario extends EntidadBase{
	private $id;
	
	private $nombre;
	private $apellido;
	private $dni;
	private $email;
	private $password;
	private $idTipo;
	private $estado;
	private $fecNac;
	private $telefono;
	private $calle;
	private $altura;
	private $ciudad;
	private $codigoPostal;
	private $cuil;
	private $cuit;
	
	
	 public function __construct($adapter) {
        $table="usuario";
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
	
	public function guardar(){
			$salt=bin2hex(random_bytes(32));
			$passwordSalteado=$this->password.$salt;
			$passwordHasheado=hash('sha256',$passwordSalteado);
			$qNombre = $this->nombre;
			$qApellido = $this->apellido;
			$qDni = $this->dni;
			$qEmail = $this->email;
			$qIdTipo = $this->idTipo;
			$qEstado =$this->estado;
			$qFecNac = $this->fecNac;
			$qTelefono = $this->telefono;
			$qCalle = $this->calle;
			$qAltura = $this->altura;
			$qCiudad = $this->ciudad;
			$qCodigoPostal = $this->codigoPostal;
			$qCuil = $this->cuil;
			$qCuit = $this->cuit;
			$query= "INSERT INTO usuario (nombre,apellido,dni,email,password,salt,idTipo,estado,fecNac,telefono,calle,altura,ciudad,codigoPostal,cuil,cuit)
					VALUES('$qNombre','$qApellido','$qDni','$qEmail','$passwordHasheado','$salt',$qIdTipo,'$qEstado','$qFecNac','$qTelefono','$qCalle','$qAltura','$qCiudad','$qCodigoPostal','$qCuil','$qCuit');";
			$this->db()->query($query);
			//$this->db()->error;
		
					
	}
	
	public function autenticar($email,$pass){
		$query= "SELECT id,salt,password FROM usuario WHERE usuario.email='$email'";
		$result=$this->db()->query($query) or die('Fallo la autenticacion' . $db->error);
			if($result->num_rows == 1){
				$row=$result->fetch_assoc();
				$id=$row['id'];
				$salt=$row['salt'];
				$passwordSalteado = $pass . $salt;
				$passwordHasheado = hash('sha256',$passwordSalteado);
				if($passwordHasheado == $row['password']){
					return $id;
			}else{ 
				return -1;
			}
			
			}else return -2;
	}		
	
	public function obtenerId($email){
		$query="SELECT id FROM usuario WHERE usuario.email ='$email'";
		$result= $this->db()->query($query);
			if($result->num_rows > 0){
				$row=$result->fetch_assoc();
				$id=$row['id'];
			}
		return $id;
	}
	
}
?>