<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada_admin extends CI_Controller {

	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
	     // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');        
        // Load pagination library
        $this->load->library('pagination');        
        // Per page limit
        $this->perPage = 5;
	}  
	
	public function index()
	{
		if (!$this->session->userdata('id')) {			
		    $this->load->view('acceso/head');
		    $this->load->view('acceso/login');	
		    $this->load->view('acceso/foot');
		}else{
			
			$data = array();
        
        // Get messages from the session
	        if($this->session->userdata('success_msg')){
	            $data['success_msg'] = $this->session->userdata('success_msg');
	            $this->session->unset_userdata('success_msg');
	        }
	        if($this->session->userdata('error_msg')){
	            $data['error_msg'] = $this->session->userdata('error_msg');
	            $this->session->unset_userdata('error_msg');
	        }
	        
	        // If search request submitted
	        if($this->input->post('submitSearch')){
	            $inputKeywords = $this->input->post('searchKeyword');
	            $searchKeyword = strip_tags($inputKeywords);
	            if(!empty($searchKeyword)){
	                $this->session->set_userdata('searchKeyword',$searchKeyword);
	            }else{
	                $this->session->unset_userdata('searchKeyword');
	            }
	        }elseif($this->input->post('submitSearchReset')){
	            $this->session->unset_userdata('searchKeyword');
	        }
	        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
	        
	        // Get rows count
	        $conditions['searchKeyword'] = $data['searchKeyword'];
	        $conditions['returnType']    = 'count';
	        $rowsCount = $this->usuarios->traerRegistros($conditions);
			// Pagination config
	        $config['base_url']    = base_url().'members/index/';
	        $config['uri_segment'] = 3;
	        $config['total_rows']  = $rowsCount;
	        $config['per_page']    = $this->perPage;
	        
	        // Initialize pagination library
	        $this->pagination->initialize($config);
	        
	        // Define offset
	        $page = $this->uri->segment(3);
	        $offset = !$page?0:$page;
	        
	        // Get rows
	        $conditions['returnType'] = '';
	        $conditions['start'] = $offset;
	        $conditions['limit'] = $this->perPage;
			
			//$this->load->model('Usuarios_model', 'usuarios');
			// carga de nombre de usuario
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data = array(
			  'title' => 'Portada',
			  'nombre_usuario' => $nombre,
			  'usuarios_datos' => $this->usuarios->traerRegistros($conditions),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('mensajes/index', $data);	
		     $this->load->view('layout/foot', $data);   
			
		}
		
	}
	
	public function ver($id){
        $data = array();
        // carga de nombre de usuario
		$usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        // Check whether member id is not empty
        if(!empty($id)){
            $data = array(
			  'title' => 'Ver Usuario',
			  'nombre_usuario' => $nombre,
			  'usuarios_datos' => $this->usuarios->traerRegistros(array('id' => $id)),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
            // Load the details page view
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('usuarios/view', $data);	
		     $this->load->view('layout/foot', $data);   
        }else{
            redirect('usuarios');
        }
    }
    
    public function agregar(){
        $data = array();
        $memData = array();
        
        //SI se envio el formulario
        echo $this->input->post('memSubmit');
        if($this->input->post('memSubmit')){
            // Validar formulario
            $this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
            $this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
            $this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
            $this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
         // $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
            $this->form_validation->set_rules('UsuPass', 'Password', 'required');
            $this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
            $this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
            
            // Preparar información del usuario
            $memData = array(
                'UsuNom'=> $this->input->post('UsuNom'),
                'UsuApePat' => $this->input->post('UsuApePat'),
                'UsuApeMat'     => $this->input->post('UsuApeMat'),
                'UsuUser'    => $this->input->post('UsuUser'),
                'UsuPass'   => $this->input->post('UsuPass'),
                'UsuActivo'   => $this->input->post('UsuActivo'),
                'UsuPerfil'   => $this->input->post('UsuPerfil')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insertar informacion
                $insert = $this->usuarios->insert($memData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'El usuario se agrego correctamente.');
                    redirect('usuarios');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        $data['member'] = $memData;
        $data['title'] = 'Agregar Usuario';       
        $data['nombre_usuario'] = $nombre;
        // Cargar vista
        $this->load->view('layout/head', $data);
		$this->load->view('layout/nav', $data);
		$this->load->view('layout/nav-sup', $data);
		$this->load->view('usuarios/add-edit', $data);	
		$this->load->view('layout/foot', $data); 
    }
    
    public function editar($id){
        $data = array();
        
        // Get member data
        $memData = $this->usuarios->traerRegistros(array('id' => $id));
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
            $this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
            $this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
            $this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
         // $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
            $this->form_validation->set_rules('UsuPass', 'Password', 'required');
            $this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
            $this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
            
            // Preparar información del usuario
            $memData = array(
                'UsuNom'=> $this->input->post('UsuNom'),
                'UsuApePat' => $this->input->post('UsuApePat'),
                'UsuApeMat'     => $this->input->post('UsuApeMat'),
                'UsuUser'    => $this->input->post('UsuUser'),
                'UsuPass'   => $this->input->post('UsuPass'),
                'UsuActivo'   => $this->input->post('UsuActivo'),
                'UsuPerfil'   => $this->input->post('UsuPerfil')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->usuarios->update($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'El usuario ha sido correctamente actualizado.');
                    redirect('members');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        $data['member'] = $memData;
        $data['title'] = 'Actualizar Usuario';
        $data['nombre_usuario'] = $nombre;
        
        // Load the edit page view
        $this->load->view('layout/head', $data);
		$this->load->view('layout/nav', $data);
		$this->load->view('layout/nav-sup', $data);
		$this->load->view('usuarios/add-edit', $data);	
		$this->load->view('layout/foot', $data); 
    }
    
    public function borrar($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->member->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');
            }else{
                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
            }
        }
        
        // Redirect to the list page
        redirect('members');
    }
    
    public function cambiar_pass(){  
     
    $data['username']=htmlspecialchars($_POST['name']);  
    $data['password']=htmlspecialchars($_POST['pwd']);  
    $res=$this->Login_model->islogin($data);  
	    if($res){     
	        $this->session->set_userdata('id',$data['username']);   
	      echo base_url()."tutor/";  
	    }  
	    else{  
	       echo 0;  
	    }   
	} 
	
	public function check_login(){  
     
    $data['username']=htmlspecialchars($_POST['name']);  
    $data['password']=htmlspecialchars($_POST['pwd']);  
    $res=$this->Login_model->islogin($data);  
	    if($res){     
	        $this->session->set_userdata('id',$data['username']);   
	      echo base_url()."tutor/";  
	    }  
	    else{  
	       echo 0;  
	    }   
	}  
	public function logout(){  
	    $this->session->sess_destroy();  
	    header('location:'.base_url()."tutor/");  
	      
	}  
}