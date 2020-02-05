<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()  
	{ 
	   parent::__construct();  
	   $this->load->model('Idiomas_model', 'idioma');
		
	}
	public function index()
	{
		$idioma_seleccionado = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : '1';
		$arr_idiomas = $this->idioma->idiomasListaActivos($idioma_seleccionado);
		$idioma_sele = $this->idioma->idiomasSeleccionado($idioma_seleccionado);
		$data = array(
			  'title' => 'Nosotros',
			  'arr_idiomas'=>$arr_idiomas,
			  'idioma_sele'=>$idioma_sele
             );
		$this->load->view('inicio/head',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav',$data);
		$this->load->view('nosotros/nosotros',$data);	
		//$this->load->view('inicio/body-bottom');	
		$this->load->view('inicio/foot',$data);
	}
	
	
}
