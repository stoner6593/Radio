<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    public function Listar_slider($estado=null)
	{
		$this->db->trans_begin();
		$sql="select * from tab_slider where  estado=? ";
		$query=$this->db->query($sql,array($estado));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}			

	}

	 public function Mostrar_slider($estado=null,$publicado=null)
	{
		$this->db->trans_begin();
		$sql="select * from tab_slider where  estado=? and publicado=? ";
		$query=$this->db->query($sql,array($estado,$publicado));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}			

	}
	
  

	public function CargaSlider($id=NULL)
	{

		$this->db->trans_begin();
		$sql="select * from tab_slider where   idslider=?  ";
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
	public function GuardarSlider($despequenia,$descripcion,$data,$estado)
	{	
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql = "INSERT INTO tab_slider (despequenia,des_grande,estado,codUser,fecha_creacion,foto,publicado) 
				VALUES(?,?,?,?,?,?,?)";
		$query = $this->db->query($sql,array($despequenia,$descripcion,$estado,$usuario,$fecha,$data['src2'],0));
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
			
	
	}

	public function ModificarSlider($despequenia,$descripcion,$foto,$estado,$idslider)
	{
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql="UPDATE tab_slider SET despequenia=?,des_grande=?,estado=?,codUser=?,fecha_creacion=?,foto=? WHERE idslider=?";			
		$query = $this->db->query($sql,array($despequenia,$descripcion,$estado,$usuario,$fecha,$foto,$idslider));
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}		
		
	
	}

	public function Cambiar_estadoslider($idslider,$estado)
	{
		
		$usuario=$this->session->userdata('iduser');
		$fecha=date("Y-m-d");
		$this->db->trans_begin();
		$sql="UPDATE tab_slider SET publicado=? WHERE idslider=?";			
		$query = $this->db->query($sql,array($estado,$idslider));
		
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