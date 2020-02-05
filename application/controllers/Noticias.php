<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

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
	   $this->load->model('Menu_model', 'menu');
	   $this->load->helper('url');
	   $this->load->library('pagination');
	   $this->load->model('Noticias_model', 'noticias');
	   $this->load->model('Servicios_model', 'services');
	   $this->load->model('Contenidos_model', 'contents');
	   $this->load->model('Empresa_model', 'ce');
		
	}
	public function index()
	{
		
		    $data = array();
			if($this->session->userdata('lenguaje_website')=='' || $this->session->userdata('lenguaje_website')==null)               {
				$idioma_seleccionado =$this->session->set_userdata('lenguaje_website', '1');
			}else{
				$idioma_seleccionado = $this->session->userdata('lenguaje_website');
			}
			if($idioma_seleccionado==''){
				$idioma_seleccionado=1;
			}
		    $this->load->model('Idiomas_model', 'idioma');
			$arr_idiomas = $this->idioma->idiomasListaActivos($idioma_seleccionado);
			$idioma_sele = $this->idioma->idiomasSeleccionado($idioma_seleccionado);
			$arr_menuSup = $this->menu->menuSuperiorLista($idioma_seleccionado);
			
			/*	paginacion	*/
			$config = array();
			$config["base_url"] = base_url() . "noticias";
			$config["total_rows"] = $this->noticias->get_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//$data["links"] = $this->pagination->create_links();

			//$data['news'] = $this->noticias->get_noticias($config["per_page"], $page);
			
			//print_r($data['news']);
			/* fin paginacion */
			
		   $data = array(
			  'title' => 'Sala de prensa',
			  'arr_idiomas'=>$arr_idiomas,
			  'arr_menusup'=>$arr_menuSup,
			  'arr_news' => $this->noticias->get_noticias($config["per_page"], $page),
			  'links' => $this->pagination->create_links(),
			  'idioma_sele'=>$idioma_sele,
			  'arr_contents_indutria'=>$this->contents->traerContenidosIndustria($idioma_seleccionado),
		'arr_services_padre' =>$this->services->traerServiciosPadre($idioma_seleccionado),
		'ce' =>$this->ce->traer_registro(1)
             );
		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);
		$this->load->view('noticias/noticias',$data);	
		$this->load->view('inicio/body-bottom',$data);	
		$this->load->view('inicio/foot',$data);
	}
	
	
	public function news()
	{
		
		$id = $this->uri->segment(4);
		$data = array();
		if ($this->session->userdata('lenguaje_website')=='' || $this->session->userdata('lenguaje_website')==null) {
			$idioma_seleccionado =$this->session->set_userdata('lenguaje_website', '1');
				} else {
			$idioma_seleccionado = $this->session->userdata('lenguaje_website');
				}
		if ($idioma_seleccionado=='') {
			$idioma_seleccionado=1;
				}
		$this->load->model('Idiomas_model', 'idioma');
		$arr_idiomas = $this->idioma->idiomasListaActivos($idioma_seleccionado);
		$idioma_sele = $this->idioma->idiomasSeleccionado($idioma_seleccionado);
		$arr_menuSup = $this->menu->menuSuperiorLista($idioma_seleccionado);
		$data = array(
		'title' => 'Sala de prensa',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'new' => $this->noticias->get_noticias2($id,$idioma_seleccionado),
		'news_resent'=> $this->noticias->traerNotasRecientes($id),
		'idioma_sele'=>$idioma_sele,
		'arr_contents_indutria'=>$this->contents->traerContenidosIndustria($idioma_seleccionado),
		'arr_services_padre' =>$this->services->traerServiciosPadre($idioma_seleccionado),
		'ce' =>$this->ce->traer_registro(1)
				);
		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);
		$this->load->view('noticias/nota',$data);
		$this->load->view('inicio/foot',$data);
	}
	
}
