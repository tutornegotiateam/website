<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller
{

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
	}
	public function index()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);
/*
$data = array(
'title' => 'Servicios',
'arr_idiomas'=>$arr_idiomas,
'idioma_sele'=>$idioma_sele
);
*/
		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);
		$this->load->view('layout/404',$data);

		$this->load->view('inicio/foot');
	}

	public function auditoria_ansurance()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			if ($idc =='ver') {

			}

			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			// $this->load->view('servicios/servicios', $datos);
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}


	public function asesoria_de_negocios()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}


	public function estrategia()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}


	public function factibilidad_de_seleccion_de_sitios()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}

	public function infraestructura_y_proyectos_de_capital()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}

	public function servicios_especializados()
	{
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
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele
		);

		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);

		$this->load->model('Servicios_model', 'services');
		if ($this->uri->segment(4) =='') {
			$idc = 0;
			$idp = $this->uri->segment(3);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idp,$idioma_sele[0]->IdiomaId);
		} else {
			$idp = $this->uri->segment(3);
			$idc = $this->uri->segment(4);
			$arrServiciosCategoria = $this->services->traerCategoriaServicio($idc,$idioma_sele[0]->IdiomaId);
		}

		$datos =array(
		'id'=>$idp,
		'idc'=>$idc,
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'idioma_sele'=>$idioma_sele,
		'arrServiciosCategoria'=>$arrServiciosCategoria
		);
		if (count($arrServiciosCategoria)>0) {
			$this->load->view('servicios/servicios', $datos);
		} else {
			$this->load->view('layout/404',$data);
		}
		$this->load->view('inicio/foot',$data);
	}
/*
public function gestion_de_etica_y_rsc()
{
$this->load->view('inicio/head2');
$this->load->view('inicio/body-top');
$this->load->view('inicio/nav2');
$this->load->view('servicios/gestion_de_etica_y_rsc');
$this->load->view('inicio/foot');
}

public function sustentabilidad()
{
$this->load->view('inicio/head2');
$this->load->view('inicio/body-top');
$this->load->view('inicio/nav2');
$this->load->view('servicios/sustentabilidad');
$this->load->view('inicio/foot');
}

public function gestion_de_riesgos()
{
$this->load->view('inicio/head2');
$this->load->view('inicio/body-top');
$this->load->view('inicio/nav2');
$this->load->view('servicios/gestion_de_riesgos');
$this->load->view('inicio/foot');
}

public function debida_diligencia()
{
$this->load->view('inicio/head2');
$this->load->view('inicio/body-top');
$this->load->view('inicio/nav2');
$this->load->view('servicios/debida_diligencia');
$this->load->view('inicio/foot');
}

public function capacitaciones_y_entrenamiento()
{
$this->load->view('inicio/head2');
$this->load->view('inicio/body-top');
$this->load->view('inicio/nav2');
$this->load->view('servicios/capacitaciones_y_entrenamiento');
$this->load->view('inicio/foot');
}
*/
}
