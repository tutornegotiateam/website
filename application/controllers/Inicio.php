<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
	   $this->load->model('Noticias_model', 'news');
	   $this->load->model('Banners_model', 'banners');
	   $this->load->model('Servicios_model', 'services');
	   $this->load->model('Contenidos_model', 'contents');
	   $this->load->model('Descubre_model', 'descubres');
	   $this->load->model('Empresa_model', 'ce');
		
	}
	public function index()
	{
		$data = array();
		if($this->session->userdata('lenguaje_website')=='' || $this->session->userdata('lenguaje_website')==null){
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
		//$arr_services_padre = $this->services->traerServiciosPadre($idioma_seleccionado); 
	//	$arr_contents_indutria = $this->contents->traerContenidosIndustria($idioma_seleccionado); 
		$data = array(
			  'title' => '',
			  'arr_idiomas'=>$arr_idiomas,
			  'arr_menusup'=>$arr_menuSup,
			  'idioma_sele'=>$idioma_sele,
			  'cuantasDestacadas'=>$this->news->cuantasDestacadasPortada(),
			  'arr_new'=>$this->news->traerDestacadas(),
			  'arr_perspectivas'=>$this->news->traerPerpectivas(),
			  'arr_2notas'=>$this->news->traerNotasDeA2(),
			  'arr_3notas'=>$this->news->traerNotasDeA1Negro(),
			  'arr_4notas'=>$this->news->traerNotasDeA3(),
			  'arr_destacados'=>$this->news->traerNotasDestacadas($idioma_seleccionado),
			  'arr_banners'=>$this->banners->traerBannersActivos(),
			  'arr_contents_indutria'=>$this->contents->traerContenidosIndustria($idioma_seleccionado),
			  'arr_services_padre' =>$this->services->traerServiciosPadre($idioma_seleccionado),
			  'arr_descubres'=>$this->descubres->traerDescubres($idioma_seleccionado),
			  'ce' =>$this->ce->traer_registro(1)
			  
             );
		$this->load->view('inicio/head2', $data);
		$this->load->view('inicio/body-top', $data);
		$this->load->view('inicio/nav2', $data);
		$this->load->view('inicio/inicio', $data);	
		$this->load->view('inicio/body-bottom', $data);	
		$this->load->view('inicio/foot', $data); 
	}
}
