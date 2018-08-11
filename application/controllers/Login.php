<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		//$this->load->helper("configuracion");	

	}
	
	
	public function index()
	{
		
		if($this->session->userdata('usuario')!='' ):
			$this->load->model(array('Menu_model'));							
			$data_content['menu'] = $this->Menu_model->ver_menu();				
        $this->load->view('principal',$data_content);
			
		else:
        
            $data['dato']="";
			$this->load->view('login',$data);
		endif;	
		
		
	}
	public function verifica(){

        if($this->input->is_ajax_request())
        {
		
			$this->form_validation->set_rules('usuario','Usuario','trim|required');
			$this->form_validation->set_rules('clave','Clave','required|trim');       
            
	
				if($this->form_validation->run()==FALSE){					
					$errores = array(
						'usuario' => form_error('usuario'),
						'clave' => form_error('clave'),                      
						'respuesta'=>'fail'
					);
			  
					echo json_encode($errores);
	
					return FALSE;
				}else{
					$this->load->model('login_model');	
					$usuario = $this->input->post("usuario");
					$pass = $this->input->post("clave");
					$confirip=$this->login_model->confirma_user($usuario);
					$veri_user = $this->login_model->compara($usuario,$pass);
					 
                    if($confirip==TRUE):						
						if($veri_user==TRUE):
							 $res=array("dato"=>$veri_user,													 			
										'respuesta'=>'ok',
										'msg'=>'Acceso Permitido');
						else:
							$add=$this->login_model->agregar_intentos($usuario);
							$res=array(
							 			'respuesta'=>'fail2',
										'msg'=>'Error Datos Incorrectos');						
							
						endif;
					else:	
						$res=array('respuesta'=>'fail3',
									'msg'=>'Acceso denegado por intentos Fallidos');
							
						  
					endif;
					echo json_encode($res); 
				}	

		}else{
				redirect(base_url());
		
		}


	}

	public function AgregaDatosSession($codSucursal,$codAlmacen){
		if($this->session->userdata('usuario')!='' ):
			$this->load->model(array('Login_model'));
			$valida=$this->Login_model->AgregaDatosSession($codSucursal,$codAlmacen);
			if(!$valida){
				
				 $ArrayMessage=array("success"=> 0,"errors"=>"Error al asignar datos a la sessi&oacute;n"); 
			}
			else{
				 $ArrayMessage=array("success"=> "","errors"=>0); 
			}
			echo json_encode($ArrayMessage);
		endif;	
	}
	public function salir(){
		$this->session->sess_destroy();			
		$rpt=array('Respuesta' => 'Sesi&oacute;n Destruida' );
		echo json_encode($rpt);
		
		
	}

}
