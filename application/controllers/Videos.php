<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

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
        
            
            $data['contenido'] = $this->load->view('videos',$data_content,TRUE);               
       		 $this->load->view('principal',$data);
            
        else:
           redirect(base_url());
        endif;  
        
	}


    public function Listar_videos_destacados()    
    {   
       /* if($this->input->is_ajax_request())
        {*/
            
                $estado =1;// $this->input->post("estado");         
                $destacado =1;// $this->input->post("destacado");         
                $this->load->model(array('Videos_model'));
                $cant=$this->Videos_model->Listar_videos_destacados($estado,$destacado);                  
                $data_content['datos'] = $cant;                
               
                echo json_encode($cant);
                
           
       /* }else{
            show_404();
        } */ 
                    
    }

    public function get_youtube_video_ID($youtube_video_url) {
      /**
      * Pattern matches
      * http://youtu.be/ID
      * http://www.youtube.com/embed/ID
      * http://www.youtube.com/watch?v=ID
      * http://www.youtube.com/?v=ID
      * http://www.youtube.com/v/ID
      * http://www.youtube.com/e/ID
      * http://www.youtube.com/user/username#p/u/11/ID
      * http://www.youtube.com/leogopal#p/c/playlistID/0/ID
      * http://www.youtube.com/watch?feature=player_embedded&v=ID
      * http://www.youtube.com/?feature=player_embedded&v=ID
      */
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $youtube_video_url, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;
    }

    public function GetYoutubeID($url)
    {
        if (strstr($url,'youtu.be'))
        {
            return str_ireplace(array('https://youtu.be/','http://youtu.be/'),'',$url);
        }
        else
        {
            parse_str( parse_url( $url, PHP_URL_QUERY ), $temp );
            return $temp['v'];
        }
    }

	public function GuardarVideo()   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                $this->form_validation->set_rules('despequenia','Des. Corta','trim|htmlspecialchars|max_length[50]'); 
                $this->form_validation->set_rules('descripcion','Descripcion','required|trim|htmlspecialchars|max_length[2000]');                   
            	$this->form_validation->set_rules('urlvideo','URL Video','trim|max_length[250]');
                $this->form_validation->set_rules('destacado','Destacado','trim');
                $this->form_validation->set_rules('estado','Estado','trim');
                
            
                if($this->form_validation->run()==FALSE)
                {
                    $res = array('success' =>0, 'errors' => $this->form_validation->error_array());                     
                }else{                  
                        $despequenia =($this->input->post("despequenia"));
                        $descripcion =($this->input->post("descripcion")); 
                      	$urlvideo = $this->get_youtube_video_ID($this->input->post("urlvideo"));
                        $destacado = $this->input->post("destacado");
                        $estado = $this->input->post("estado");
                      	
                        if(isset($estado)){ 
                            $estado=1; 
                        }else{ 
                            $estado=0; 
                        }
                        if(isset($destacado)){ 
                            $destacado=1; 
                        }else{ 
                            $destacado=0; 
                        }
                   
                        $this->load->model('Videos_model'); 

	               
                        $veri_unidad=$this->Videos_model->GuardarVideo($despequenia,$descripcion,$urlvideo,$destacado,$estado);
                                
                        if($veri_unidad):
                            $res = array('success' =>'Video registrado', 'errors' => 0);                                      
                        else:
                            $res = array('success' =>0, 'errors' => 'Error al registrar Video');                                      
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


    public function ModificarVideo()   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                $this->form_validation->set_rules('idvideo','ID Video','required|trim|htmlspecialchars|is_natural'); 
                $this->form_validation->set_rules('despequenia','Des. Corta','trim|htmlspecialchars|max_length[50]'); 
                $this->form_validation->set_rules('descripcion','Descripcion','required|trim|htmlspecialchars|max_length[2000]');                   
                $this->form_validation->set_rules('urlvideo','URL Video','trim|max_length[250]');
                $this->form_validation->set_rules('destacado','Destacado','trim');
                $this->form_validation->set_rules('estado','Estado','trim');
                
            
                if($this->form_validation->run()==FALSE)
                {
                    $res = array('success' =>0, 'errors' => $this->form_validation->error_array());                     
                }else{                  
                        $idvideo =($this->input->post("idvideo"));
                        $despequenia =($this->input->post("despequenia"));
                        $descripcion =($this->input->post("descripcion")); 
                      	$estado = $this->input->post("estado");
                        $urlvideo = $this->input->post("urlvideo");
                        $destacado = $this->input->post("destacado");

                      	if(isset($estado)){ 
                            $estado=1; 
                        }else{ 
                            $estado=0; 
                        }
                        if(isset($destacado)){ 
                            $destacado=1; 
                        }else{ 
                            $destacado=0; 
                        }
                   
                        $this->load->model('Videos_model');
                   

                        $veri_unidad=$this->Videos_model->ModificarSlider($despequenia,$descripcion,$urlvideo,$destacado,$estado,$idvideo);
                                
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

    public function Cambiar_estadovideo($idvideos=null,$estado=null)   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                     
                       
                $this->load->model('Videos_model');                 
     
                $video=$this->Videos_model->Cambiar_estadovideo($idvideos,$estado);
                        
                if($video):
                    $res = array('success' =>'Video actualizado'.$estado, 'errors' => 0);                                      
                else:
                    $res = array('success' =>0, 'errors' => 'Error al  actualizar Video');                                      
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


      public function CargaVideo()    
    {   
         if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $id = $this->input->post("idvideo");         
                $this->load->model(array('Videos_model'));
                $cant=$this->Videos_model->CargaVideo($id);                
                $data_content['datos'] = $cant;                
              	
              	if($cant)
              	{
              		$res = array('success1' =>$this->decode($data_content['datos']) , 'errors' => 0);      
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

    public  function decode($data) {
        if (is_array($data)) {
            return array_map(array($this,'decode'), $data);
        }
        if (is_object($data)) {
            $tmp = clone $data; // avoid modifing original object
            foreach ( $data as $k => $var )
                $tmp->{$k} = $this->decode($var);
            return $tmp;
        }
        return html_entity_decode($data);
    }

	public function Listar_videos($estado=NULL)    
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $this->load->model('Videos_model');       
                
                $res=$this->Videos_model->Listar_videos($estado);
                $variable = array();
                $i=0;   
                if($res):
                    foreach($res as $row)
                    {   
                        $variable[$i][]=$row['idvideos'];
                        $variable[$i][]=strip_tags($row['des_corta'],"<p><i><strong>");      
                        $variable[$i][]=html_entity_decode ($row['des_larga']); 
                        $variable[$i][]=$row['publicado'];                                       
                        $variable[$i][]='<a  data-placement="right" title="Modificar Video"  data-id-video="'.$row['idvideos'].'" id="modifica_video" class="badge badge-info  "><i class="fa fa-edit"></i></a>';
                        if($row['publicado']==0){
                           $variable[$i][]='<a  data-placement="right" title="Publicar Video"  data-id-video1="'.$row['idvideos'].'" id="publicar_video" class="btn btn-warning btn-icon btn-circle btn-sm "><i class="fa fa-eye"></i></a>';
                    	}else{

                    		$variable[$i][]='<a  data-placement="right" title="Quitar Video"  data-id-video1="'.$row['idvideos'].'" id="pendiente_video" class="btn btn-success btn-icon btn-circle btn-sm "><i class="fa fa-eye-slash"></i></a>';
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