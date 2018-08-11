<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    
	/*Listar Usuarios*/
	
	public function Listar_usuarios($estado=null)
	{
		$this->db->trans_begin();
		$sql="select * from tab_usuarios where  estado=?  ";
		$query=$this->db->query($sql,array($estado));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}			

	}
	
	public function BuscarUsuario($id=null)
	{	
		$this->db->trans_begin();
		$sql="select * from tab_usuarios where  codUsuario=?  ";
		$query=$this->db->query($sql,($id));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->row_array();						
		}	
	}
	
	public function BusUsuDni($dni=NULL)
	{

		$this->db->trans_begin();
		$sql="select * from tab_usuarios where  estado=? and dni=?  ";
		$query=$this->db->query($sql,array(1,$dni));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->row_array();
			//return $query->num_rows();					
		}		

	}
	
	public function BusUsuarioUser($user=NULL)
	{
		$this->db->trans_begin();
		$sql="select * from tab_usuarios where  estado=? and usuario=?  ";
		$query=$this->db->query($sql,array(1,$user));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->row_array();
			//return $query->num_rows();					
		}	

	}
	
	public function BusUsuario($iduser=null)
	{
		$this->db->trans_begin();
		$sql="select * from tab_usuarios where  estado=? and codUsuario=?  ";
		$query=$this->db->query($sql,array(1,$iduser));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->row_array();
			//return $query->num_rows();					
		}	

	}
	
	
	/*Agrega  Personal*/
	public function GuardarUsuario($dni,$nombres,$apellidos,$direccion,$mail,$estado,$fnac,$estado,$telefono,$celular,$nivel,$usuario,$clave1,$data)
	{	
		
		$usuario1=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$salt =substr(md5(rand()), 0, 24);;
		$password=hash('sha256', $salt.$clave1);
		$nac=explode("/",$fnac);
		$newfecha=$nac[2].'-'.$nac[1].'-'.$nac[0];
		
		$src = $data['src2'];
		$this->db->trans_begin();
		$sql = "INSERT INTO tab_usuarios (dni,nombres,apellidos ,fechanac,direccion,telefono ,celular,email,usuario,contrasena,salt,codUsu,fecharegistro,estado,codNivel,foto) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query = $this->db->query($sql,array($dni,$nombres,$apellidos,$newfecha,$direccion,$telefono,$celular,$mail,$usuario,$password,$salt,$usuario1,'NOW()',$estado,$nivel,$src));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
			
		
	
	}
	
	/*Modificar Personal*/
	public function ModificaUsuario($iduser,$dni,$nombres,$apellidos,$direccion,$mail,$estado,$fnac,$telefono,$celular,$nivel,$usuario,$password,$salt,$foto)
	{
		
		$usuario1=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$nac=explode("/",$fnac);
		$newfecha=$nac[2].'-'.$nac[1].'-'.$nac[0];
		$this->db->trans_begin();
		$sql="UPDATE tab_usuarios SET dni=?,nombres=?,apellidos=?,fechanac=?,direccion=?,telefono=?,celular=?,email=?,usuario=?,contrasena=?,salt=?,codUsu=?,fecharegistro=?,estado=?,codNivel=?, foto=? WHERE codUsuario=?"	;			
		$query = $this->db->query($sql,array($dni,$nombres,$apellidos,$newfecha,$direccion,$telefono,$celular,$mail,$usuario,$password,$salt,$usuario1,'NOW()',$estado,$nivel,$foto,$iduser));
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}		
		
	
	}
	

	
}

