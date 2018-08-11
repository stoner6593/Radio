<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    
	/******FUNCIONES PARA MOSTRAR EL MENU EN EL SISTEMA******/
	
	public function ver_menu()
	{
		$CodUsuario=$this->session->userdata('iduser');

		$sql="select * from tab_menu where codUsuario=? and estado=? order by codMenu asc";
		$query = $this->db->query($sql,array($CodUsuario,1));
		if($query->num_rows() > 0){
			
			return  $query->result_array(); 
		}else{
			return null;
		}

	}

	public function ver_submenu($cod)	{
		
		$sql="select s.* from tab_submenu s left join tab_menu m on s.codMenu=m.codMenu
		where s.estado=? and s.codMenu=?  order by s.codSubMenu asc";
		$query = $this->db->query($sql,array(1,$cod));
		if($query->num_rows() > 0){			
			return $query->result_array();
		}else{
			return null;
		}

	}
	
   /**************************************/
	/*Menu Segun Usuarios*/
	public function ver_menu2()
	{
		$this->db->where('per_id','1');				
		$query = $this->db->get('tabmenu');
		if($query->num_rows() > 0){
			return $query->result_array();
			//return  $query->row_array(); 
		}

	}

	public function ver_submenu2($cod)	{		
		$this->db->where('codmenu',$cod);
		$this->db->where('per_id','1');		
		$query = $this->db->get('tabsubmenu');
		if($query->num_rows() > 0){			
			return $query->result_array();
		}

	}

	
	
}

