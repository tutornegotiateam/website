<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners_admin extends CI_Controller {

	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	    $this->load->model('Usuarios_model', 'usuarios');
	    $this->load->model('Banners_model', 'banners');
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
			
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data = array(
			  'title' => 'Banners',
			  'nombre_usuario' => $nombre,
			  'arr_banners' => $this->banners->traerBanners()
             );
             $this->load->view('layout/head', $data);
			 $this->load->view('layout/nav', $data);
			 $this->load->view('layout/nav-sup', $data);
			 $this->load->view('banners/index', $data);	
		     $this->load->view('layout/foot', $data);   
			
		}
		
	}
    
    public function agregar()
	{
	    
	     
	     $data = array(
               'titulo' => $this->input->post('titulo'),
               'archivo' => $this->input->post('banner_bg'),
               'texto1' => $this->input->post('texto1'),
               'texto2' => $this->input->post('texto2'),
               'texto3' => $this->input->post('texto3'),
               'tipo' => $this->input->post('tipo'),
               'status' => $this->input->post('status'),
         );
         if($this->db->insert('banners', $data))
		 {
		  echo  $this->db->insert_id();  
		 }else{
		  echo 'Error.'; 	
		 }		
	}
	
	public function guardar()
	{
	    
	     if($this->input->post('id')==''){
			 $data = array(
	               'titulo' => $this->input->post('titulo'),
	               'archivo' => $this->input->post('banner_bg'),
	               'texto1' => $this->input->post('texto1'),
	               'texto2' => $this->input->post('texto2'),
	               'texto3' => $this->input->post('texto3'),
	               'texto4' => $this->input->post('texto4'),
	               'tipo' => $this->input->post('tipo'),
	               'status' => $this->input->post('status')
	         );
	         if($this->db->insert('banners', $data))
			 {
			  echo  $this->db->insert_id();  
			 }else{
			  echo 'Error.'; 	
			 }
		 }else{
		 	$data = array(
               'titulo' => $this->input->post('titulo'),
               'archivo' => $this->input->post('banner_bg'),
               'texto1' => $this->input->post('texto1'),
               'texto2' => $this->input->post('texto2'),
               'texto3' => $this->input->post('texto3'),
               'texto4' => $this->input->post('texto4'),
               'tipo' => $this->input->post('tipo'),
               'status' => $this->input->post('status')
            );
         $id = $this->input->post('id');
         if( $this->banners->updateBanners($data, $id))
		 {
		  echo "Ok";
		 }else{
		  echo 'Error.'; 	
		 }
		 }
	     		
	}
	
	
	public function borrar()
	{
	     $this->db->where('id', $this->input->post('id'));
         if($this->db->delete('banners'))
		 {
		  echo 'Delete successfully.'; 
		 }else{
		  echo 'Error.'; 	
		 }
	}
}