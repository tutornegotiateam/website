<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma extends CI_Controller {

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
	public function index()
	{
		/*
		$this->load->view('inicio/head');
		$this->load->view('inicio/body-top');
		$this->load->view('inicio/nav');
		$this->load->view('idioma/idioma');	
		$this->load->view('inicio/body-bottom');	
		$this->load->view('inicio/foot');
		*/ 
	}
	
	public function geo() 
	{
		@session_start();
		$idlanguaje = strtoupper($this->uri->segment(4));
		$this->session->set_userdata('lenguaje_website', $idlanguaje);
		 redirect('/', 'refresh');
		/*
		$this->load->view('inicio/head');
		$this->load->view('inicio/body-top');
		$this->load->view('inicio/nav');
		$this->load->view('idioma/idioma');	
		$this->load->view('inicio/body-bottom');	
		$this->load->view('inicio/foot');
		*/
	}
	
	
}