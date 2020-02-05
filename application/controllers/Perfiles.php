<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfiles extends CI_Controller {

	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
	    $this->load->model('Perfiles_model', 'perfiles');
	     // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');        
        // Load pagination library
        $this->load->library('pagination');        
        // Per page limit
        $this->perPage = 5;
        if (!$this->session->userdata('id')) {			
		      redirect('tutor');
		}
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
	        $rowsCount = $this->perfiles->traerRegistros($conditions);
			// Pagination config
	        $config['base_url']    = base_url().'perfiles/index/';
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
			  'title' => 'Catalógo de perfiles',
			  'nombre_usuario' => $nombre,
			  'perfiles_datos' => $this->perfiles->traerRegistros($conditions),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('perfiles/index', $data);	
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
			  'title' => 'Ver Perfil',
			  'nombre_usuario' => $nombre,
			  'datos' => $this->perfiles->traerRegistros(array('id' => $id)),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
            // Load the details page view
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('perfiles/view', $data);	
		     $this->load->view('layout/foot', $data);   
        }else{
            redirect('usuarios');
        }
    }
    
    public function agregar(){
        $data = array();
        $memData = array();
        
        //SI se envio el formulario
       
        if($this->input->post('memSubmit')){
            // Validar formulario
            $this->form_validation->set_rules('PerNombre', 'PerNombre', 'required',array('required' => 'El Perfil es requerido'));
            $this->form_validation->set_rules('PerDesc', 'PerDesc', 'required',array('required' => 'la descripción es requerida'));
            $this->form_validation->set_rules('PerActivo', 'PerActivo', 'required',array('required' => 'El Status es requerido'));
           // Preparar información del usuario
            $memData = array(
                'PerNombre'=> $this->input->post('PerNombre'),
                'PerDesc' => $this->input->post('PerDesc'),
                'PerActivo'     => $this->input->post('PerActivo')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insertar informacion
                $insert = $this->perfiles->insert($memData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'El perfil se agrego correctamente.');
                    redirect('perfiles');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        $data['member'] = $memData;
        $data['title'] = 'Agregar Perfil';       
        $data['nombre_usuario'] = $nombre;
        // Cargar vista
        $this->load->view('layout/head', $data);
		$this->load->view('layout/nav', $data);
		$this->load->view('layout/nav-sup', $data);
		$this->load->view('perfiles/add-edit', $data);	
		$this->load->view('layout/foot', $data); 
    }
    
    public function editar($id){
        $data = array();
        
        // Get member data
        $memData = $this->perfiles->traerRegistros(array('id' => $id));
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
             $this->form_validation->set_rules('PerNombre', 'PerNombre', 'required',array('required' => 'El Perfil es requerido'));
            $this->form_validation->set_rules('PerDesc', 'PerDesc', 'required',array('required' => 'la descripción es requerida'));
            $this->form_validation->set_rules('PerActivo', 'PerActivo', 'required',array('required' => 'El Status es requerido'));
           // Preparar información del usuario
            $memData = array(
                'PerNombre'=> $this->input->post('PerNombre'),
                'PerDesc' => $this->input->post('PerDesc'),
                'PerActivo'     => $this->input->post('PerActivo')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update member data
                $update = $this->perfiles->update($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'El perfil ha sido correctamente actualizado.');
                    redirect('perfiles');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        $data['member'] = $memData;
        $data['title'] = 'Actualizar Perfil';
        $data['nombre_usuario'] = $nombre;
        
        // Load the edit page view
        $this->load->view('layout/head', $data);
		$this->load->view('layout/nav', $data);
		$this->load->view('layout/nav-sup', $data);
		$this->load->view('perfiles/add-edit', $data);	
		$this->load->view('layout/foot', $data); 
    }
    
    public function borrar($id){
        // Checar que usuario no este vacio
        if($id){
            // Borrar
            $delete = $this->perfiles->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');
            }else{
                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
            }
        }
        
        // Redirect to the list page
        redirect('perfiles');
    }
     
}