<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profiles extends CI_Controller {
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
	   $this->load->model('Contenidos_model', 'contents');
	   $this->load->model('Personas_model', 'persons');
	   $this->load->model('Empresa_model', 'ce');
	}

	/*

	public function _remap($method)

	{

	    $data = array();

	 	if($this->session->userdata('lenguaje_website')=='' || $this->session->userdata('lenguaje_website')==null)        {

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

		$id_seccion=$this->uri->segment(2);

		$id_contenido = $this->uri->segment(3);

	    $contenidos_arr=$this->contents->leerContenidosPorSeccion($id_seccion,$id_contenido,$idioma_seleccionado);

	    $secccion = str_replace('-','_',$contenidos_arr);	   

	    if ($method==$secccion)

	    {

	        $this->contenidos();

	    }

	    else

	    {

	       

	        

			

			//print_r($this->contents->leerContenido('',$idioma_sele));

			

			$data = array(

				  'title' => 'Servicios',

				  'arr_idiomas'=>$arr_idiomas,

				  'arr_menusup'=>$arr_menuSup,

				  'idioma_sele'=>$idioma_sele

	             );

			

			$this->load->view('inicio/head2',$data);

			$this->load->view('inicio/body-top',$data);

			$this->load->view('inicio/nav2',$data);

	        

			$this->load->view('layout/404',$data);

		

		$this->load->view('inicio/foot',$data);

	    }

	}

	*/

	public function ver() {

		

		

		 // print_r($this->contents->leerContenido('nuestros-valores','1'));

	        $data = array();

			if($this->session->userdata('lenguaje_website')=='' || $this->session->userdata('lenguaje_website')==null)        {

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

			$id_contenido = $this->uri->segment(3);

			$id_people = $this->uri->segment(4);

			$arr_peoples = $this->persons->traerDatosPersona($id_people);

			//print_r($arr_peoples);

			$arr_temas_peoples = $this->persons->traerTemasPersona($arr_peoples->PersonaTemas,$idioma_seleccionado);

			$contenidoTxt = $this->contents->leerContenido($id_contenido,$idioma_sele);
			//print_r($contenidoTxt);
		    //$peoples = ;
		    $peoples = substr($contenidoTxt[0]['personas'], 0, -1);
		   // echo "HOLA".$peoples;
			$arr_personas = $this->persons->traerPersonasContenidos($peoples);

              			//print_r($this->persons->traerPersonasDirectivos());

			$data = array(
				'title' => 'Servicios',
				'arr_idiomas'=>$arr_idiomas,
				'arr_menusup'=>$arr_menuSup,
				'idioma_sele'=>$idioma_sele,
				'arr_peoples'=>$arr_peoples,
				'arr_personas'=>$arr_personas,
				'arr_directivos'=>$this->persons->traerPersonasDirectivos(),
				'entradas'=>$contenidoTxt,
				'arr_temas_peoples'=>$arr_temas_peoples,
				'ce' =>$this->ce->traer_registro(1)
			//	  'arr_personas'=>$arr_personas,
			//	  'entradas'=>$contenidoTxt
	            );			
			$this->load->view('inicio/head2',$data);
			$this->load->view('inicio/body-top',$data);
			$this->load->view('inicio/nav2',$data); 
			$this->load->view('profiles/ver',$data);		
		    $this->load->view('inicio/foot',$data);
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

	

	public function nuestros_valores2()

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

		$data = array(

			  'title' => 'Catalógo de Usuarios',

			  'arr_idiomas'=>$arr_idiomas,

			  'arr_menusup'=>$arr_menuSup,

			  'idioma_sele'=>$idioma_sele,
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