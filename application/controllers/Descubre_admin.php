<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descubre_admin extends CI_Controller
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
		$this->load->model('Descubre_model', 'dm');
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
			'title' => 'Descubre',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			/*'registros' => $this->dm->get_registros(),*/
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('descubre/index', $data);
			$this->load->view('layout/foot', $data);

		}
	}

    function get_registros() {
		$records = $this->dm->get_records();
		echo json_encode($records);
	}
	
	function delete_registro() {
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		
		if($this->dm->delete_record($id) === TRUE) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	function update_registro() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$sale_price = $_POST['sale_price'];
		$sale_count = $_POST['sale_count'];
		$sale_date = $_POST['sale_date'];
		
		if($this->dm->update_record($id, $name, $price, $sale_price, $sale_count, $sale_date) === TRUE) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	function add_registro() {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$sale_price = $_POST['sale_price'];
		$sale_count = $_POST['sale_count'];
		$sale_date = $_POST['sale_date'];
		
		if($this->dm->add_record($name, $price, $sale_price, $sale_count, $sale_date) === TRUE) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	

}