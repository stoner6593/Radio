<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    public function Listar_videos($estado=null)
	{
		$this->db->trans_begin();
		$sql="select * from videos_destacados where  estado=? ";
		$query=$this->db->query($sql,array($estado));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}			

	}

	 public function Listar_videos_destacados($estado=null,$destacado=null)
	{
		$this->db->trans_begin();
		$sql="select * from videos_destacados where  estado=? and destacado=?";
		$query=$this->db->query($sql,array($estado,$destacado));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}			

	}
	
  

	public function CargaVideo($id=NULL)
	{

		$this->db->trans_begin();
		$sql="select * from videos_destacados where   idvideos=?  ";
		$query=$this->db->query($sql,array($id));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->row_array();
			//return $query->num_rows();					
		}		

	}
	public function GuardarVideo($despequenia,$descripcion,$urlvideo,$destacado,$estado)
	{	
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql = "INSERT INTO videos_destacados (des_corta,des_larga,estado,codUsu,fecha_creacion,url_video,publicado,destacado) 
				VALUES(?,?,?,?,?,?,?,?)";
		$query = $this->db->query($sql,array($despequenia,$descripcion,$estado,$usuario,$fecha,$urlvideo,0,$destacado));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
			
	
	}

	public function ModificarSlider($despequenia,$descripcion,$urlvideo,$destacado,$estado,$idvideo)
	{
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql="UPDATE videos_destacados SET des_corta=?,des_larga=?,estado=?,codUsu=?,fecha_creacion=?,url_video=?,destacado=? WHERE idvideos=?";			
		$query = $this->db->query($sql,array($despequenia,$descripcion,$estado,$usuario,$fecha,$urlvideo,$destacado,$idvideo));
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}		
		
	
	}

	public function Cambiar_estadovideo($idvideo,$estado)
	{
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql="UPDATE videos_destacados SET publicado=? WHERE idvideos=?";			
		$query = $this->db->query($sql,array($estado,$idvideo));
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}		
		
	
	}
    
}

?>    