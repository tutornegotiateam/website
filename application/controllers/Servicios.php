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
		$this->load->model('Servicios_model', 'contents');
		$this->load->model('Personas_model', 'persons');
		$this->load->model('Noticias_model', 'noticias');
	    $this->load->model('Contenidos_model', 'contents2');
	    $this->load->model('Empresa_model', 'ce');
	}

	public function _remap($method)
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
		$id_seccion=$this->uri->segment(2);
		$id_contenido = $this->uri->segment(3);
		$contenidos_arr=$this->contents->leerContenidosPorSeccionTitular($id_seccion,$id_contenido,$idioma_seleccionado);
	    $secccion = str_replace('-','_',$contenidos_arr);
		//print_r($this->contents->leerContenido('nuestros-valores','1'));
		if ($method==$secccion) {
			$this->contenidos();
		} else {



			//print_r($this->contents->leerContenido('',$idioma_sele));

			$data = array(
			'title' => 'Servicios',
			'arr_idiomas'=>$arr_idiomas,
			'arr_menusup'=>$arr_menuSup,
			'idioma_sele'=>$idioma_sele,
			'ce' =>$this->ce->traer_registro(1)
			);

			$this->load->view('inicio/head2',$data);
			$this->load->view('inicio/body-top',$data);
			$this->load->view('inicio/nav2',$data);

			$this->load->view('layout/404',$data);

			$this->load->view('inicio/foot',$data);
		}
	}

	public function contenidos()
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
		$id_contenido = $this->uri->segment(3);
		$id_contenido2=$this->uri->segment(4);
		if ($id_contenido2!='') {
			
			 $id_contenido=$id_contenido2;
			 $contenidoTxt = $this->contents->leerContenido2($id_contenido,$idioma_sele);
			 $arr_services_rel = $this->contents->traerServiciosRelacionados2($this->uri->segment(3));
			 $seccion_=$this->uri->segment(3);
			 } else { 
			 $id_contenido = $this->uri->segment(3); 
			 $contenidoTxt = $this->contents->leerContenido($id_contenido,$idioma_sele);
			 $arr_services_rel = $this->contents->traerServiciosRelacionados($id_contenido);
			 $seccion_='';
			 //print_r($contenidoTxt);
			 };
		 
	//	$contenidoTxt = $this->contents->leerContenido($id_contenido,$idioma_sele);
		//print_r($contenidoTxt);
		if (empty($contenidoTxt)) {
			$data = array(
			'title' => 'Servicios',
			'arr_idiomas'=>$arr_idiomas,
			'arr_menusup'=>$arr_menuSup,
			'idioma_sele'=>$idioma_sele,
			'ce' =>$this->ce->traer_registro(1)
					);

			$this->load->view('inicio/head2',$data);
			$this->load->view('inicio/body-top',$data);
			$this->load->view('inicio/nav2',$data);

			$this->load->view('layout/404',$data);

			$this->load->view('inicio/foot',$data);
			
		}else{
			
		
		
		//$peoples = ;
		$peoples = substr($contenidoTxt[0]['personas'], 0, -1);
		//echo "HOLA".$peoples;
		$arr_personas = $this->persons->traerPersonasContenidos($peoples);
		$id_servicio = $this->contents->traerIdSeccion($id_contenido);
        $arr_notas_relacionadas = $this->contents->traerNotasRelacionadasAlServicio($id_servicio);
        
		$data = array(
		'title' => 'Servicios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele,
		'arr_personas'=>$arr_personas,
		'services_rel'=>$arr_services_rel,
		'news_resent'=> $this->noticias->traerNotasRecientesServicios(),
		'notas_relacionadas'=>$arr_notas_relacionadas,
		'seccion'=>$seccion_,
		'entradas'=>$contenidoTxt,
		'arr_contents_indutria'=>$this->contents2->traerContenidosIndustria($idioma_seleccionado),
		'arr_services_padre' =>$this->contents->traerServiciosPadre($idioma_seleccionado),
		'ce' =>$this->ce->traer_registro(1)
		);
		$this->load->view('inicio/head2',$data);
		$this->load->view('inicio/body-top',$data);
		$this->load->view('inicio/nav2',$data);
		$this->load->view('contenidos/ver',$data);
		$this->load->view('inicio/foot',$data);
			}
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
		'title' => 'Catalógo de Usuarios',
		'arr_idiomas'=>$arr_idiomas,
		'arr_menusup'=>$arr_menuSup,
		'idioma_sele'=>$idioma_sele,
		'ce' =>$this->ce->traer_registro(1)
		);
		$data['entradas'] = $this->contents->getEntradas();
		$this->load->view('inicio/head2', $data);
		$this->load->view('inicio/body-top', $data);
		$this->load->view('inicio/nav2', $data);
		$this->load->view('inicio/inicio', $data);
		$this->load->view('inicio/body-bottom', $data);
		$this->load->view('inicio/foot', $data);
	}

	
}