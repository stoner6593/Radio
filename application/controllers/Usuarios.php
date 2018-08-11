<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			
        $this->load->library('session');
	}
    public $upload_path = "./gallery/picture/";
    public $upload_path_thumb = "./gallery/picture/thumb/"; 

    public function index()
    {
        try{
            
            if($this->session->userdata('usuario')!='' ):
                $this->load->model(array('Sucursal_model','Menu_model','Niveles_model','Empresa_model'));                                
                $data_content['menu'] = $this->Menu_model->ver_menu(); 
                $data_content['niveles']= $this->Niveles_model->ListaNiveles();
                $data_content['empresas']=$this->Empresa_model->CargaEmpresas();
                $data['contenido'] = $this->load->view('usuarios',$data_content,TRUE);               
            $this->load->view('principal',$data);
                
            else:
               redirect(base_url());
            endif;  
            
        }
        catch(Exception $e){
            echo json_encode($ArrayMessage=array('success'=>0,'errors'=>$e->getMessage()));
        }
    }

    public function BuscarUsuario()    
    {   
         if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $id = $this->input->post("id");         
                $this->load->model(array('Usuarios_model'));
                $cant=$this->Usuarios_model->BuscarUsuario($id);
                $fe=$cant['fechanac'] ? $cant['fechanac'] : date('Y-m-d');  
                $fec=explode("-",$fe);
                $fnac=$fec[2].'/'.$fec[1].'/'.$fec[0];
                $data_content['fecha_nac'] = $fnac;         
                $data_content['datos'] = $cant;                
                //$contenido = $this->load->view('personal_modi',$data_content,true);
                echo json_encode($data_content);
                
            else:
                redirect(base_url());           
            endif;
        }else{
            show_404();
        }  
                    
    }

    public function BuscaUsuarioDni() 
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $dni = $this->input->post("dni");
                if($dni)
                {
                    $this->load->model('Usuarios_model');
                    $cant=$this->Usuarios_model->BusUsuDni($dni);
                    $nombre="";             
                    if($cant):                  
                        $nombre=$cant['nombres'].' '.$cant['apellidos'];
                        $data=array("respuesta"=>"fail","msg"=>"DNI Ya se encuentra registrado: <strong>".$nombre."</strong>");                 
                    else:                   
                        $data=array("respuesta"=>"ok","msg"=>"DNI sin registrar");              
                    endif;
                
                }else{
                    show_404(); 
                }
                echo json_encode($data);
            else:
                redirect(base_url());
            endif;
        } else{
            show_404(); 
        } 
        
            
    }
    
    public function BusUsuarioUser()    
    {   
        if($this->input->is_ajax_request())
        { 
            if($this->session->userdata('usuario')!='' ):
                $user = $this->input->post("user");
                
                $this->load->model('Usuarios_model');
                $cant=$this->Usuarios_model->BusUsuarioUser($user);                              
                if($cant):              
                    
                    $data=array("respuesta"=>"fail","msg"=>"El Usuario: ".$user." Ya se encuentra registrado");                 
                else:                   
                    $data=array("respuesta"=>"ok","msg"=>"");               
                endif;          
                
            else:
                redirect(base_url());   
            endif;  
            echo json_encode($data);
        }else{
            show_404();
        }    
            
    }
    
    public function BusUsuario()   
    {   
        if($this->input->is_ajax_request())
        {        
            if($this->session->userdata('usuario')!='' ):
                $iduser = $this->input->post("iduser");
                $user = $this->input->post("user"); 
                $this->load->model('Usuarios_model');
                $cant=$this->Usuarios_model->BusUsuario($iduser);                        
                $cant2=$this->Usuarios_model->BusUsuarioUser($user);                             
                if($cant): $res_usu=$cant['usuario']; $res_codusu=['codUsuario']; else: $res_codusu='';$res_usu=''; endif;                
                if($cant2):
                    if($user==$res_usu):
                        $data=array("respuesta"=>"ok","msg"=>"");
                    else:
                        if($iduser==$cant2['codUsuario'] ):
                            $data=array("respuesta"=>"ok","msg"=>"");
                        else:
                            $data=array("respuesta"=>"fail","msg"=>"El Usuario: <strong>".$user."</strong> Ya se encuentra registrado");
                            
                        endif;  
                    endif;
                else:
                    $data=array("respuesta"=>"ok","msg"=>"");                   
                endif;
                    
                    
            else:
                redirect(base_url());   
            endif;  
            echo json_encode($data);
        }else{
            show_404();
        }

    }
    
    /*Método para Agregar Usuario*/
    public function GuardarUsuario()   
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                    $this->form_validation->set_rules('dni','DNI','required|trim|htmlspecialchars|min_length[8]|is_natural'); 
                    $this->form_validation->set_rules('nombres','Nombres','required|trim|htmlspecialchars|min_length[3]|max_length[50]|is_words_only');
                    $this->form_validation->set_rules('apellidos','Apellidos','required|trim|htmlspecialchars|min_length[3]|max_length[50]|is_words_only');
                    $this->form_validation->set_rules('direccion','Dirección','trim|htmlspecialchars|min_length[5]|max_length[100]');
                    $this->form_validation->set_rules('mail','E-mail','trim|valid_email');                    
                    $this->form_validation->set_rules('estado','Estado','trim');
                    $this->form_validation->set_rules('fecha','Fecha Nacimiento','trim');
                    $this->form_validation->set_rules('estado','Estado','trim');
                    $this->form_validation->set_rules('telefono','Teléfono','trim');                    
                    $this->form_validation->set_rules('celular','Celular','trim'); 
                    $this->form_validation->set_rules('nivel','Nivel','trim');              
                    $this->form_validation->set_rules('usuario','Usuario','required|trim|htmlspecialchars|min_length[8]|max_length[100]');
                    $this->form_validation->set_rules('clave','Clave 1','required|trim|htmlspecialchars|min_length[8]|max_length[100]');
                    $this->form_validation->set_rules('clave2','Clave 2','required|trim|htmlspecialchars|min_length[8]|max_length[100]');
                
                    if($this->form_validation->run()==FALSE)
                    {
                        $res = array('success' =>0, 'errors' => $this->form_validation->error_array());                     
                    }else{                  
                            $dni = $this->input->post("dni");
                            $nombres =ucfirst($this->input->post("nombres"));
                            $apellidos =ucfirst($this->input->post("apellidos"));
                            $direccion = ucfirst($this->input->post("direccion"));                      
                            $mail = $this->input->post("mail");                            
                            $estado = $this->input->post("estado");
                            $fnac = $this->input->post("fecha");
                            $telefono = $this->input->post("telefono");
                            $celular = $this->input->post("celular");
                            $nivel = $this->input->post("nivel"); 
                            $usuario = $this->input->post("usuario");
                            $clave1 = $this->input->post("clave");
                            $clave2 = $this->input->post("clave2");
                            if(isset($estado)){ 
                                $estado=1; 
                            }else{ 
                                $estado=0; 
                            }
                            if($clave1!=$clave2):
                                $res = array('success' =>0, 'errors' => array("error"=>"Las claves deben ser iguales..!"));  
                            else:
                                $this->load->model('Usuarios_model'); 
                                $data['src2'] = "";
                                if(!empty($_FILES['src2']['name'])) {
                                    $image=$this->_upload_picture('src2');                                    
                                    if(!empty($image['file_name'])){
                                        $data['src2'] = $image['file_name'];
                                        
                                    }
                                }   
                               
                                $veri_usuario=$this->Usuarios_model->GuardarUsuario($dni,$nombres,
                                $apellidos,$direccion,$mail,$estado,$fnac,$estado,$telefono,$celular,$nivel,$usuario,$clave1,$data);
                                        
                                 if($veri_usuario):
                                    $res = array('success' =>'Usuario Registrado', 'errors' => 0);                                      
                     
                                endif;
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
    

    public function ModificaUsuario()  
    {   
        if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                    
                    $this->form_validation->set_rules('iduser','ID Usuario','required|trim|htmlspecialchars|is_natural'); 
                    $this->form_validation->set_rules('dni','DNI','required|trim|htmlspecialchars|min_length[8]|is_natural'); 
                    $this->form_validation->set_rules('nombres','Nombres','required|trim|htmlspecialchars|min_length[3]|max_length[50]|is_words_only');
                    $this->form_validation->set_rules('apellidos','Apellidos','required|trim|htmlspecialchars|min_length[3]|max_length[50]|is_words_only');
                    $this->form_validation->set_rules('direccion','Dirección','trim|htmlspecialchars|min_length[5]|max_length[100]');
                    $this->form_validation->set_rules('mail','E-mail','trim|valid_email');                    
                    $this->form_validation->set_rules('estado','Estado','trim');
                    $this->form_validation->set_rules('fecha','Fecha Nacimiento','trim');
                    $this->form_validation->set_rules('estado','Estado','trim');
                    $this->form_validation->set_rules('telefono','Teléfono','trim');                    
                    $this->form_validation->set_rules('celular','Celular','trim'); 
                    $this->form_validation->set_rules('nivel','Nivel','trim');              
                    $this->form_validation->set_rules('usuario','Usuario','trim|htmlspecialchars|min_length[8]|max_length[100]');
                    $this->form_validation->set_rules('clave','Clave 1','trim|htmlspecialchars|min_length[8]|max_length[100]');
                    $this->form_validation->set_rules('clave2','Clave 2','trim|htmlspecialchars|min_length[8]|max_length[100]');
                    
                    if($this->form_validation->run()==FALSE)
                    {
                        $res = array('success' =>0, 'errors' => $this->form_validation->error_array());  
                        
                    }else{
                            $iduser = $this->input->post("iduser");
                            $dni = $this->input->post("dni");
                            $nombres =ucfirst($this->input->post("nombres"));
                            $apellidos =ucfirst($this->input->post("apellidos"));
                            $direccion = ucfirst($this->input->post("direccion"));                      
                            $mail = $this->input->post("mail");                            
                            $estado = $this->input->post("estado");
                            $fnac = $this->input->post("fecha");
                            $telefono = $this->input->post("telefono");
                            $celular = $this->input->post("celular");
                            $nivel = $this->input->post("nivel"); 
                            $usuario = $this->input->post("usuario");
                            $clave1 = $this->input->post("clave");
                            $clave2 = $this->input->post("clave2");
                            if(isset($estado)){ 
                                $estado=1; 
                            }else{ 
                                $estado=0; 
                            }
                    
                            if($clave1!=$clave2):
                                $res = array('success' =>0, 'errors' => array("error"=>"Las claves deben ser iguales..!"));  
                            else:                           
                                $this->load->model('Usuarios_model');
                                $bus_clave_per=$this->Usuarios_model->BuscarUsuario($iduser);                            
                                
                                if($clave1=='' && $clave2==''):
                                    $password=$bus_clave_per['contrasena'];
                                    $salt=$pass=$bus_clave_per['salt'];                             
                                else:
                                    $salt = substr(md5(rand()), 0, 24);;
                                    $password=hash('sha256', $salt.$clave1);                                
                                endif;
                                $data['src2'] = "";
                                if(!empty($_FILES['src2']['name'])) {
                                    $image=$this->_upload_picture('src2');
                                    if(!empty($image['file_name'])){
                                        $data['src2'] = $image['file_name'];
                                    }
                                }
                                $src = $data['src2'];
                                if($src==''):
                                    $foto=$bus_clave_per['foto'];
                                else:
                                    $foto=$src;
                                    @unlink( $this->upload_path . $bus_clave_per['foto'] );
                                    @unlink( $this->upload_path_thumb . $bus_clave_per['foto'] );
                                endif;  
                                $verifica=$this->Usuarios_model->ModificaUsuario($iduser,$dni,$nombres,
                                $apellidos,$direccion,$mail,$estado,$fnac,$telefono,$celular,$nivel,$usuario,$password,$salt,$foto);
                                            
                                if($verifica):
                                    $res = array('success' =>'Usario Modificado', 'errors' => 0);                                      
                         
                                else:
                                    $res = array('success' =>0, 'errors' => 'Error al modificar personal'); 
                                endif;
                                
                            endif;      
                                
                                     

                    }   
                    
                    echo json_encode($res);     
                

            else: 
                redirect(base_url());
            endif;
        }else{
            show_404();
        }

    }
    
    public function Listar_usuarios($estado=NULL)    
    {   
       if($this->input->is_ajax_request())
        {
            if($this->session->userdata('usuario')!='' ):
                $this->load->model('Usuarios_model');       
                
                $res=$this->Usuarios_model->Listar_usuarios($estado);
                $variable = array();
                $i=0;   
                if($res):
                    foreach($res as $row)
                    {   
                        $variable[$i][]=$row['codUsuario'];
                        $variable[$i][]=$row['nombres'].' '.$row['apellidos'];      
                        $variable[$i][]=$row['dni'];
                        $variable[$i][]=$row['direccion'];
                        $variable[$i][]=$row['telefono'];
                        $variable[$i][]=$row['email'];                                       
                        $variable[$i][]='<a  data-placement="right" title="Modificar Usuario"  data-id-usuario="'.$row['codUsuario'].'" id="modifica_usuario" class="badge badge-info  "><i class="fa fa-edit"></i></a>';
                      
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
        $config['upload_path'] = $this->upload_path;
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
                redimensionar( $data['full_path'], 1024, 768, false);
                redimensionar( $data['full_path'], 76, 76, true, $this->upload_path_thumb );
                return $data;
            }else{
                $error = array('error' => $this->upload->display_errors('', '<br/>'));
                return $error;
            }
        }
    }
    
    

    
}
    


?>