<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    
    public function ListaNiveles()
    {
        $this->db->trans_begin();
		$sql="SELECT * FROM tab_nivel WHERE estado=? ";
		$query=$this->db->query($sql,array(1));			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();	
		}	
    }

    /*Busca Menu segun nivel de usuario*/
	public function Busca_niveles($id)
	{
		$this->db->trans_begin();
		$this->db->where('codUsuario',$id);				
		$query = $this->db->get('tab_menu');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();
		}	
	}
	 /*Busca Menu segun nivel de usuario y almacen*/
	public function Busca_niveles_almacen($id,$codAlmacen)
	{
		$this->db->trans_begin();
		$this->db->where('codUsuario',$id);
		$this->db->where('codAlmacen',$codAlmacen);				
		$query = $this->db->get('tab_menu');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();
		}	
	}

	/*Busca Menu con el nivel general 1*/
	public function Busca_niveles_general()	
	{
		$this->db->trans_begin();	
		//$this->db->where('menu_estado','AC');				
		$this->db->where('codUsuario','1');	
		//$this->db->where('su','1');			//Super Usuario	
		$query = $this->db->get('tab_menu');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();
		}
	}

	/*Busca Sub Menu segun nivel ID de Menu*/
	public function Busca_submenu($id_menu)
	{	
		$this->db->trans_begin();
		//$this->db->where('submenu_estado','AC');		
		$this->db->where('codMenu',$id_menu);				
		$query = $this->db->get('tab_submenu');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();
		}

	}
	/*Busca Sub Menu segun nivel de mennu - modificar estado*/
	public function Busca_submenu_actu($rol_id)
	{	
		$this->db->trans_begin();
		$sql="select s.* from tab_submenu s inner join tab_menu m 
		on s.codMenu=m.codMenu where m.codUsuario=?";		
		$query = $this->db->query($sql,$rol_id);			
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query->result_array();
		}

	}

	//Agrega menu segun nivel
	function Agrega_menu_nivel($datos)
	{
		$this->db->trans_begin();
		$this->db->insert('tab_menu', $datos);
		$id = $this->db->insert_id();		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $id;
		}	

	}
	//Agrega submenu segun nivel
	public function Agrega_submenu_nivel($datos2)
	{
		$this->db->trans_begin();
		$query=$this->db->insert_batch('tab_submenu', $datos2);					
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}	

	}

	/*Actualiza estado de Menu segun nivel*/
	public function Actualiza_menu($data)	
	{	
		$estado=$data['estado'];
		$menu_id=$data['codMenu'];
		$rol_id=$data['codUsuario'];
		$codalma=$data['codAlmacen'];
		$this->db->trans_begin();		
		$sql="UPDATE tab_menu SET estado=?,codAlmacen=? WHERE codMenu=? and codUsuario=?";			
		$query = $this->db->query($sql,array($estado,$codalma,$menu_id,$rol_id));	
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}	

	}
	/*Actualiza estado de Sub_Menu segun ID de Menu*/
	public function Actualiza_submenu($data)	
	{	
		$estado=$data['estado'];
		$submenu_id=$data['codSubmenu'];
		$this->db->trans_begin();		
		$sql="UPDATE tab_submenu SET estado=? WHERE codSubmenu=? ";			
		$query = $this->db->query($sql,array($estado,$submenu_id));	
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return $query;
		}	

	}
	

}
?>    