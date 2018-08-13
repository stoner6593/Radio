<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();	
        $this->load->library(array('session','Consultadocumento'));
	}
    public $upload_path1 = "./gallery/picture/slider/";
    public $upload_path_thumb1 = "./gallery/picture/thumb/"; 
    
    public function index()
	{
		 if($this->session->userdata('usuario')!='' ):
            $this->load->model(array('Menu_model'));                                
            $data_content['menu'] = $this->Menu_model->ver_menu(); 
        
            
            $data['contenido'] = $this->load->view('slider',$data_content,TRUE);               
       		 $this->load->view('principal',$data);
            
        else:
           redirect(base_url());
        endif;  
        
	}



	public function GuardarSlider()   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                $this->form_validation->set_rules('despequenia','Des. Corta','trim|htmlspecialchars|max_length[50]'); 
                $this->form_validation->set_rules('descripcion','Descripcion','trim|htmlspecialchars|min_length[3]|max_length[100]');                   
            	$this->form_validation->set_rules('estado','Estado','trim');
                
            
                if($this->form_validation->run()==FALSE)
                {
                    $res = array('success' =>0, 'errors' => $this->form_validation->error_array());                     
                }else{                  
                        $despequenia =($this->input->post("despequenia"));
                        $descripcion =($this->input->post("descripcion")); 
                      	$estado = $this->input->post("estado");
                      	if(isset($estado)){ 
                            $estado=1; 
                        }else{ 
                            $estado=0; 
                        }
                   
                        $this->load->model('Slider_model'); 

	                    $data['src2'] = "";
                        if(!empty($_FILES['src2']['name'])) {
                            $image=$this->_upload_picture('src2');                                    
                            if(!empty($image['file_name'])){
                                $data['src2'] = $image['file_name'];
                                
                            }
                        }   
                        $veri_unidad=$this->Slider_model->GuardarSlider($despequenia,$descripcion,$data,$estado);
                                
                        if($veri_unidad):
                            $res = array('success' =>'Slider registrado', 'errors' => 0);                                      
                        else:
                            $res = array('success' =>0, 'errors' => 'Error al registrar Slider');                                      
                        endif;
                          
                }   
                
                echo json_encode($res);     
                

            else: 
                redirect(base_url());
            endif;
        }
        else
        {
            show_404();
        }

    }


    public function ModificarSlider()   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                $this->form_validation->set_rules('idslider','ID Slider','required|trim|htmlspecialchars|is_natural'); 
                $this->form_validation->set_rules('despequenia','Des. Corta','trim|htmlspecialchars|max_length[50]'); 
                $this->form_validation->set_rules('descripcion','Descripcion','trim|htmlspecialchars|min_length[3]|max_length[100]');                   
            	$this->form_validation->set_rules('estado','Estado','trim');
                
            
                if($this->form_validation->run()==FALSE)
                {
                    $res = array('success' =>0, 'errors' => $this->form_validation->error_array());                     
                }else{                  
                        $idslider =($this->input->post("idslider"));
                        $despequenia =($this->input->post("despequenia"));
                        $descripcion =($this->input->post("descripcion")); 
                      	$estado = $this->input->post("estado");
                      	if(isset($estado)){ 
                            $estado=1; 
                        }else{ 
                            $estado=0; 
                        }
                   
                        $this->load->model('Slider_model'); 
                        $bus_slider=$this->Slider_model->CargaSlider($idslider);  
                       	$data['src2'] = "";
                        if(!empty($_FILES['src2']['name'])) {
                            $image=$this->_upload_picture('src2');
                            if(!empty($image['file_name'])){
                                $data['src2'] = $image['file_name'];
                            }
                        }
                        $src = $data['src2'];
                        if($src==''):
                            $foto=$bus_slider['foto'];

                        else:
                            $foto=$src;
                           
                            @unlink( $this->upload_path1 . trim($bus_slider['foto']) );
                            @unlink( $this->upload_path_thumb1 . trim($bus_slider['foto']) );
                        endif;  

                        $veri_unidad=$this->Slider_model->ModificarSlider($despequenia,$descripcion,$foto,$estado,$idslider);
                                
                        if($veri_unidad):
                            $res = array('success' =>'Slider registrado', 'errors' => 0);                                      
                        else:
                            $res = array('success' =>0, 'errors' => 'Error al registrar Slider');                                      
                        endif;
                          
                }   
                
                echo json_encode($res);     
                

            else: 
                redirect(base_url());
            endif;
        }
        else
        {
            show_404();
        }

    }

    public function Cambiar_estadoslider($idslider=null,$estado=null)   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                     
                       
                $this->load->model('Slider_model'); 
                
                /*if(isset($estado)){ 
                    $estado=1; 
                }else{ 
                    $estado=0; 
                }*/
                
                $slider=$this->Slider_model->Cambiar_estadoslider($idslider,$estado);
                        
                if($slider):
                    $res = array('success' =>'Slider actualizado'.$estado, 'errors' => 0);                                      
                else:
                    $res = array('success' =>0, 'errors' => 'Error al  actualizar Slider');                                      
                endif;
                     
                echo json_encode($res);     
                

            else: 
                redirect(base_url());
            endif;
        }
        else
        {
            show_404();
        }

    }


    public function CargaSlider()    
    {   
         if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $id = $this->input->post("idslider");         
                $this->load->model(array('Slider_model'));
                $cant=$this->Slider_model->CargaSlider($id);                
                $data_content['datos'] = $cant;                
              	
              	if($cant)
              	{
              		$res = array('success1' =>$data_content['datos'] , 'errors' => 0);      
              	}else{
              		$res = array('success1' =>0 , 'errors' => "No hay registros");  
              	}
                echo json_encode($res);
                
            else:
                redirect(base_url());           
            endif;
        }else{
            show_404();
        }  
                    
    }


	public function Listar_slider($estado=NULL)    
    {   
       if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $this->load->model('Slider_model');       
                
                $res=$this->Slider_model->Listar_slider($estado);
                $variable = array();
                $i=0;   
                if($res):
                    foreach($res as $row)
                    {   
                        $variable[$i][]=$row['idslider'];
                        $variable[$i][]=$row['despequenia'];      
                        $variable[$i][]=$row['des_grande']; 
                        $variable[$i][]=$row['publicado'];                                       
                        $variable[$i][]='<a  data-placement="right" title="Modificar Slider"  data-id-slider="'.$row['idslider'].'" id="modifica_slider" class="badge badge-info  "><i class="fa fa-edit"></i></a>';
                        if($row['publicado']==0){
                           $variable[$i][]='<a  data-placement="right" title="Publicar Slider"  data-id-slider1="'.$row['idslider'].'" id="publicar_slider" class="btn btn-warning btn-icon btn-circle btn-sm "><i class="fa fa-eye"></i></a>';
                    	}else{

                    		$variable[$i][]='<a  data-placement="right" title="Quitar Slider"  data-id-slider1="'.$row['idslider'].'" id="pendiente_slider" class="btn btn-success btn-icon btn-circle btn-sm "><i class="fa fa-eye-slash"></i></a>';
                    	}
                      
                        $i++;
                    }
                endif;      
                    $total['aaData']=$variable;
                    echo json_encode($total);
                        
            else:
                    
                    redirect(base_url());
            endif;  
         }else{
            show_404();
         } 
            
    }



   public function _upload_picture( $src_name ){
	    $config['upload_path'] = $this->upload_path1;
	    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';  
	    //$config['max_size']  = '12288';  
	    $config['max_size']  = '12288000';  
	    $config['max_width']  = '0';  
	    $config['max_height']  = '0'; 
	    $config['file_name']  = sha1( time() . mt_rand() ); 
	    $this->load->library('upload', $config); 

	    if ( ! $this->upload->do_upload($src_name)){
	        $error = array('error' => $this->upload->display_errors('', '<br/>'));
	        return $error;
	    }else{
	        $data = $this->upload->data();
	        if($data['is_image'] == 1) {  
	            $this->load->helper("imagenes_helper");
	            //redimensionar( $data['full_path'], 1024, 768, false);
	            //redimensionar( $data['full_path'], 76, 76, true, $this->upload_path_thumb );
	            return $data;
	        }else{
	            $error = array('error' => $this->upload->display_errors('', '<br/>'));
	            return $error;
	        }
	    }
    }
    
    
}

?>