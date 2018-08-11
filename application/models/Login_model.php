<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    
   
    public function borrar_intentos($value) {
		
     return $this->db->query( "UPDATE tab_usuarios SET intentos = 0,fecha=NOW(),estado='1' WHERE usuario =?",array($value)); 
		
   }
    public function actualiza_intentos($value) {
		
      $this->db->query( "UPDATE tab_usuarios SET intentos = 1,fecha=NOW() WHERE usuario =?",array($value)); 
		
   }
   public function confirma_user($usuario=NULL) {	 
		
		$query=$this->db->query("SELECT intentos, (CASE when fecha is not NULL and DATE_ADD(fecha, INTERVAL 1 MINUTE)>NOW() then 1 else 0 end) as Denied  FROM tab_usuarios  WHERE usuario =? ",array($usuario));	 

		if($query->num_rows()>0):	   		
			$data=$query->row_array();   	   
			if (!$data) {
				return TRUE;
	  		} 
			if ($data["intentos"] >= 3)
			{
				if($data["Denied"] == 1)
				{
					return FALSE;
				}else{
					$this->borrar_intentos($usuario);
					return TRUE;
				}
			}
			return TRUE; 
		else:
			$this->actualiza_intentos($usuario);				 
			return TRUE; 
		endif;    
  	}
	

	public function agregar_intentos($value) {   		  
	  $query=$this->db->query ("SELECT * FROM tab_usuarios WHERE usuario =?",array($value)); 	  
	  $data = $query->row_array();	  
	  if($data)
      {
        $attempts = $data["intentos"]+1;
        if($attempts==3) {
		 $this->db->query("UPDATE tab_usuarios SET intentos=".$attempts.", fecha=NOW(),estado='0' WHERE usuario =?",array($value));
		
		}else {
		 $this->db->query("UPDATE tab_usuarios SET intentos=".$attempts.",fecha=NOW() WHERE usuario =?",array($value));
		 
		}
       }
      else {
	   
	    $this->actualiza_intentos($value);
		
	  }
	  return FALSE; //1
    }

	public function slowEquals($a, $b){ //No time-based attacks
			$a = unpack('C*', $a);
			$b = unpack('C*', $b);
			$diff = count($a) ^ count($b);
			for($i = 1; $i < count($a) && $i < count($b)+1; $i++)
				$diff |= $a[$i] ^ $b[$i];	
			return $diff == 0;
	}
	
    public function compara($user=NULL,$pass=NULL){	

		if(isset($user) && isset($pass) ):
			$sql="SELECT * FROM tab_usuarios where usuario=? and estado=? ";								
			$res=$this->db->query($sql,array($user,1));
			if($res->num_rows() > 0):
				$data=$res->row_array();
				$password=hash('sha256', $data['salt'].$pass);						
				if($this->slowEquals($data['contrasena'],$password)):														
					$datos_sesion = array(
					'iduser'=>$data['codUsuario'],	
					'usuario'=>$data['nombres'],
					'foto'=>$data['foto']
                     
					);
					$this->session->set_userdata($datos_sesion);
					return TRUE ; //Acceso correcto
				else:
					
					return FALSE; //Clave incorrecta
				
				endif;
			else:
				
				return FALSE; //User y Pass no existen
			
			endif;	
			
		else:			
			return FALSE;		
		endif;		
	
	}

	public function AgregaDatosSession($codSucursal=null,$codAlmacen=null){

		if($codSucursal!="" && $codAlmacen!=""){

			$datos_sesion = array(					
                    'codSucursal'=>$codSucursal,
                    'codAlmacen'=>$codAlmacen    
					);
			$this->session->set_userdata($datos_sesion);
			return TRUE;
		}else
		{

			return FALSE;
		}
	}
	
}