<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory
		$this->load->library ('session');
		$this->load->model('Login_model');
		$this->load->model('Usuarios_model', 'usuarios');
		//$this->load->model('Contenidos_model', 'contents');
		$this->load->model('Servicios_model', 'contents');
		$this->load->model('Personas_model', 'persons');
		$this->load->model('Empresa_model', 'dm');
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
		} else {
			$data = array();
			$usuarioId = $this->session->userdata('id');
			$_SESSION['key1']=$usuarioId;
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data = array(
			'title' => 'Datos de la empresa',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
		/*	'registros' => $this->dm->get_datos()*/
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('empresa/index', $data);
			$this->load->view('layout/foot', $data);

		}
	}

   function ver_registro() {	
	    $id = $this->input->post('id');	
		$records = $this->dm->ver_registro($id);
		
		echo $records;
	}
	
	 public function editar(){
    	 $id = $this->input->post('id');
        $data = array();
        
        // Get member data
      //  $memData = $this->dm->traerPersona($id);
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
        	      
            // Preparar información del usuario
            $memData = array(
            'empresa'=> $this->input->post('empresa'),
			'lema'=> $this->input->post('lema'),
			'direccion'=> $this->input->post('direccion'),
			'pie'=> $this->input->post('pie'),
			'ciudad'=> $this->input->post('ciudad'),
			'estado'=> $this->input->post('estado'),
			'pais'=> $this->input->post('pais'),
			'telefono_ofi1'=> $this->input->post('telefono_ofi1'),
			'telefono_ofi2'=> $this->input->post('telefono_ofi2'),
			'email'=> $this->input->post('email'),
			'facebook'=> $this->input->post('facebook'),
			'twitter'=> $this->input->post('twitter'),
			'youtube'=> $this->input->post('youtube'),
			'linkedin'=> $this->input->post('linkedin'),
			'url'=> $this->input->post('url'),
			/*'logo1'=> $this->input->post('logo1'),
			'logo2'=> $this->input->post('logo2'),*/
			'fecha_mod'=> date('Y-m-d H:i:s'),
            );
            
            $id= $this->input->post('id');

                // Update member data
               $update = $this->dm->update($memData, $id);
               // echo $update;
                if($update){
                    $this->session->set_userdata('success_msg', 'El registro ha sido correctamente actualizado.');
                    redirect('empresa');
                }else{
                    $data['error_msg'] = 'Ocurrio un problema, por favor intentelo de nuevo.';
                }
           
        }
   
    }
	
	

}