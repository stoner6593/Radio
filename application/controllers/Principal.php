<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));

	}
    
    public function index()
	{
		$this->load->model(array('Videos_model'));	
       		
		$this->load->model(array('Menu_model','Slider_model'));	
		
		if($this->session->userdata('usuario')!='' ):
                                           
            $data_content['menu'] = $this->Menu_model->ver_menu(); 

        
            
            //$data['contenido'] = $this->load->view('videos',$data_content,TRUE);               
       		$this->load->view('principal',$data_content);
            
        else:
        	$data_content['slider'] = $this->Slider_model->Mostrar_slider(1,1); 
        	$data_content['videos'] = $this->Videos_model->Listar_videos_destacados(1,0); 
        	//$data['contenido'] = $this->load->view('videos_destacados',$data_content,TRUE); 
           $this->load->view('indice',$data_content);   
        endif;  
		
    }
}

?>