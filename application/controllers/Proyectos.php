<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyectos extends CI_Controller {
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
        $this->load->helper('form');
        $this->load->library('form_validation');        
        $this->load->model('Proyectos_model', 'dp');      
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
			$idusu = $this->usuarios->traerUsuarioid($usuarioId);
			$data = array(
			'title' => 'PROYECTOS TUTORNEGOTIA',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			'idusu' => $idusu,
            'arr_status_proyectos' =>$this->dp->get_status_proyectos()
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
            $this->load->view('proyectos/proyectos', $data);
            $this->load->view('layout/foot', $data);
            $this->load->view('proyectos/proyectos_js', $data);
		}
	}


	public function view()
    {
		if (!$this->session->userdata('id')) {
			$this->load->view('acceso/head');
			$this->load->view('acceso/login');
			$this->load->view('acceso/foot');
		} else {
			$data = array();
			$idp = $this->uri->segment(3);
			$usuarioId = $this->session->userdata('id');
			$_SESSION['key1']=$usuarioId;
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$idusu = $this->usuarios->traerUsuarioid($usuarioId);
			$row = $this->dp->get_proyecto($idp);
			$row2 = $this->dp->traerNombreUsuario($row->responsable);
			$responsable_nombre = $row2->UsuNom." ".$row2->UsuApePat." ".$row2->UsuApeMat;
			
			$fecha_creacion = $this->dp->fechaTexto($row->f_inicio);
			//$participantes0 = $row->participantes;
			$participantes1 = trim($row->participantes,','); 
			$participantes = explode(',',$participantes1 );
			//echo $participantes = '["'.$participantes.'"]';       
			$participantes_cuantos = count($participantes);
            $participantes1 = str_replace(",","','",$participantes1);
			//print_r($row);
			//echo $row->responsable;
			
			$data = array(
			'title' => 'PROYECTOS TUTORNEGOTIA',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			'idusu' => $idusu,
			'arr_status_proyectos' =>$this->dp->get_status_proyectos(),
			'row'=>$row,
			'responsable_nombre'=>$responsable_nombre,
			'fecha_creacion'=>$fecha_creacion,
			'participantes_cuantos'=>$participantes_cuantos,
			'arr_participantes'=>$this->dp->get_participantes_proyecto($participantes1),
			'responsable_id'=>$row->responsable,
			'participantes'=>$row->participantes
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
            $this->load->view('proyectos/view', $data);
            $this->load->view('layout/foot', $data);
            $this->load->view('proyectos/proyectos_js', $data);
		}
	}

	function get_personas_responsables() {
		$data['arr_responsable_proyecto'] = $this->dp->get_responsables();
		$this->load->view('proyectos/tb_responsable',$data);
	}
	
	function get_personas_participantes() {
		$data['arr_responsable_proyecto'] = $this->dp->get_responsables();
		$this->load->view('proyectos/tb_participantes',$data);
    }

	function get_registros() {
		$records = $this->dp->get_records(); 
		echo json_encode($records);
    }

    function get_tipoProyectos() {
		$records = $this->dp->get_records();
		echo json_encode($records);
    }
   
    function add() {
		$data = array(
			'proyecto' => $this->input->post('proyecto'),
			'descripcion' => $this->input->post('descripcion'),
			'f_inicio' => $this->input->post('f_inicio'),
			'f_fin' => $this->input->post('f_fin'),
			'responsable' => $this->input->post('responsable'),
			'participantes' => $this->input->post('participantes'),
			'proyecto_tipo' => $this->input->post('proyecto_tipo'),
			'status' => $this->input->post('status')
		);
		$res = $this->dp->insert($data); // Calling Insert Model and its function.
		echo $res;
    }

    function edit() {

    }

    function del() {

    }
}