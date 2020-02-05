<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma_admin extends CI_Controller {

	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
	    $this->load->model('Idiomas_model', 'idiomas');
	     // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');        
        // Load pagination library
        $this->load->library('pagination');        
        // Per page limit
        $this->perPage = 10;
        if (!$this->session->userdata('id')) {			
		      redirect('tutor');
		}
	}  
	
	public function index()
	{
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
	        $rowsCount = $this->idiomas->traerRegistros($conditions);
			// Pagination config
	        $config['base_url']    = base_url().'idioma_admin/index/';
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
			
			//$this->load->model('Idiomas_model', 'idiomas');
			// carga de nombre de usuario
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data = array(
			  'title' => 'Catalógo de idiomas',
			  'nombre_usuario' => $nombre,
			  'idiomas_datos' => $this->idiomas->traerRegistros($conditions),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('idiomas/index', $data);	
		     $this->load->view('layout/foot', $data);   		
	}
	
	public function ver($id){
        $data = array();
 		// carga de nombre de usuario
		$usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        // Check whether member id is not empty
        if(!empty($id)){
            $data = array(
			  'title' => 'Ver Idioma',
			  'nombre_usuario' => $nombre,
			  'idiomas_datos' => $this->idiomas->traerRegistros(array('id' => $id)),
			  'searchKeyword' => $this->session->userdata('searchKeyword')
             );
            // Load the details page view
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('idiomas/view', $data);	
		     $this->load->view('layout/foot', $data);   
        }else{
            redirect('idiomas');
        }
    }
    
    public function agregar(){
    	
        $data = array();
        $memData = array();
        if($this->input->post('memSubmit')){
        	
            // Validar formulario

            $this->form_validation->set_rules('IdiomaTitulo', 'IdiomaTitulo', 'required',array('required' => 'El Idioma es requerido'));
            $this->form_validation->set_rules('IdiomaSigla', 'IdiomaSigla','required',array('required' => 'La Sigla del idioma debe ser de 2 caracteres'));
         //   $this->form_validation->set_rules('IdiomaBandera', 'IdiomaBandera', 'required',array('required' => 'La imagen de la Bandera es requerido'));
            $this->form_validation->set_rules('IdiomaActivo', 'IdiomaActivo','required',array('required' => 'Se requiere el status del idioma'));
           // echo base_url()."public/uploads/banderas/";
            $config = array(
				'upload_path' => './public/uploads/banderas/',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "650",
				'max_width' => "650"
				);
	
		/*	$config['upload_path'] = './uploads/';  
			$config['allowed_types'] = 'gif|jpg|png';*/
			$this->load->library('upload', $config);
			$this->upload->initialize($config);     
           if(!$this->upload->do_upload()){
                $error=array('error' => $this->upload->display_errors());
                $img ='';
           }else{
            $datos["img"]=$this->upload->data();
             //print_r($datos["img"]["file_name"]);
                $img ="public/uploads/banderas/".$datos["img"]["file_name"];
            }
            // Preparar información del usuario
            $memData = array(
                'IdiomaTitulo'=> $this->input->post('IdiomaTitulo'),
                'IdiomaSigla' => $this->input->post('IdiomaSigla'),
                'IdiomaBandera'     => $img,
                'IdiomaActivo'    => $this->input->post('IdiomaActivo'),
            );
           
            // Validate submitted form data
            if($this->form_validation->run() == true){
            	 // Insertar informacion              
                $insert = $this->idiomas->insert($memData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'El usuario se agrego correctamente.');
                    redirect('idioma_admin');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }else{     	
				$usuarioId = $this->session->userdata('id');
			    $nombre = $this->usuarios->traerNombreUsuario($usuarioId);
	            $data['member'] = $memData;
	            $data['title'] = 'Agregar Idioma';       
	            $data['nombre_usuario'] = $nombre;
	            // Cargar vista
	            $this->load->view('layout/head', $data);
			    $this->load->view('layout/nav', $data);
			    $this->load->view('layout/nav-sup', $data);
			    $this->load->view('idiomas/add-edit', $data);	
			    $this->load->view('layout/foot', $data);
			}
        }else{
			$usuarioId = $this->session->userdata('id');
		    $nombre = $this->usuarios->traerNombreUsuario($usuarioId);
            $data['member'] = $memData;
            $data['title'] = 'Agregar Idioma';       
            $data['nombre_usuario'] = $nombre;
            // Cargar vista
            $this->load->view('layout/head', $data);
		    $this->load->view('layout/nav', $data);
		    $this->load->view('layout/nav-sup', $data);
		    $this->load->view('idiomas/add-edit', $data);	
		    $this->load->view('layout/foot', $data); 
		}
        
        
    }
    
    public function editar($id){
        $data = array();
        
        // Get member data
        $memData = $this->idiomas->traerRegistros(array('id' => $id));
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('IdiomaTitulo', 'IdiomaTitulo', 'required',array('required' => 'El Idioma es requerido'));
            $this->form_validation->set_rules('IdiomaSigla', 'IdiomaSigla','required',array('required' => 'La Sigla del idioma debe ser de 2 caracteres'));
          //  $this->form_validation->set_rules('IdiomaBandera', 'IdiomaBandera', 'required',array('required' => 'La imagen de la Bandera es requerido'));
            $this->form_validation->set_rules('IdiomaActivo', 'IdiomaActivo','required',array('required' => 'Se requiere el status del idioma'));
             $config = array(
				'upload_path' => './public/uploads/banderas/',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "650",
				'max_width' => "650"
				);
	
		/*	$config['upload_path'] = './uploads/';  
			$config['allowed_types'] = 'gif|jpg|png';*/
			$this->load->library('upload', $config);
			$this->upload->initialize($config);     
           if(!$this->upload->do_upload()){
                $error=array('error' => $this->upload->display_errors());
                $img ='';
           }else{
            $datos["img"]=$this->upload->data();
             //print_r($datos["img"]["file_name"]);
                $img ="public/uploads/banderas/".$datos["img"]["file_name"];
            }
            // Preparar información del usuario
            $memData = array(
                'IdiomaTitulo'=> $this->input->post('IdiomaTitulo'),
                'IdiomaSigla' => $this->input->post('IdiomaSigla'),
                'IdiomaBandera'     => $img,
                'IdiomaActivo'     => $this->input->post('IdiomaActivo'),
                'IdiomaId'    => $this->input->post('IdiomaId'),
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update
                $update = $this->idiomas->update($memData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'El usuario ha sido correctamente actualizado.');
                   redirect('idioma_admin');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por favor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
        $data['member'] = $memData;
        $data['title'] = 'Actualizar Idioma';
        $data['nombre_usuario'] = $nombre;
        
        // Load the edit page view
        $this->load->view('layout/head', $data);
		$this->load->view('layout/nav', $data);
		$this->load->view('layout/nav-sup', $data);
		$this->load->view('idiomas/add-edit', $data);	
		$this->load->view('layout/foot', $data); 
    }
    
    public function borrar($id){
        // Checar que el id no venga vacio
        if($id){
            // Borrar usuarios
            $delete = $this->idiomas->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');
            }else{
                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
            }
        }
        // Redirect to the list page
        redirect('idioma_admin');
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