<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departamentos extends CI_Controller {
	function __construct()
	{  
	    parent::__construct();  
	    $this->load->helper('url');
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
	     // Cargar Helper y Libreries
        $this->load->helper('form');
        $this->load->library('form_validation');        
        // Cargar modelos     
        $this->load->model('Departamentos_model', 'dm');      
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
			'title' => 'Departamentos',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('departamentos/departamentos', $data);
			$this->load->view('layout/foot', $data);
		}
	}

	function get_registros() {       
		$records = $this->dm->get_records();
		echo json_encode($records);
    }
    
    function add(){
             $data = array(
                'departamento' => $this->input->post('departamento'),
                'descripcion' => $this->input->post('descripcion')
            );
            $res = $this->dm->insert($data); // Calling Insert Model and its function.
            echo $res;
    }

    function edit(){
        $data = array(
           'departamento' => $this->input->post('departamento'),
           'descripcion' => $this->input->post('descripcion')
       );
       $id = $this->input->post('id');
       $res = $this->dm->update($data,$id); // Calling Insert Model and its function.
       echo $res;
    }

    function delete(){
       $id = $this->input->post('id');
       $res = $this->dm->delete($id); // Calling Insert Model and its function.
       echo $res;
    }

    function get_record() {
        $id = $this->input->post('id');
		$record = $this->dm->get_record($id);
		echo $record;
    }
    

}