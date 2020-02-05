<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_admin extends CI_Controller
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

			// Get messages from the session
			if ($this->session->userdata('success_msg')) {
				$data['success_msg'] = $this->session->userdata('success_msg');
				$this->session->unset_userdata('success_msg');
			}
			if ($this->session->userdata('error_msg')) {
				$data['error_msg'] = $this->session->userdata('error_msg');
				$this->session->unset_userdata('error_msg');
			}

			// If search request submitted
			if ($this->input->post('submitSearch')) {
				$inputKeywords = $this->input->post('searchKeyword');
				$searchKeyword = strip_tags($inputKeywords);
				if (!empty($searchKeyword)) {
					$this->session->set_userdata('searchKeyword',$searchKeyword);
				} else {
					$this->session->unset_userdata('searchKeyword');
				}
			} elseif ($this->input->post('submitSearchReset')) {
				$this->session->unset_userdata('searchKeyword');
			}
			$data['searchKeyword'] = $this->session->userdata('searchKeyword');

			// Get rows count
			$conditions['searchKeyword'] = $data['searchKeyword'];
			$conditions['returnType']    = 'count';
			$rowsCount = $this->contents->traerRegistros($conditions);
			//print_r($rowsCount);
			// Pagination config
			$config['base_url']    = base_url().'servicios_admin/index/';
			$config['uri_segment'] = 3;
			$config['total_rows']  = $rowsCount;
			$config['per_page']    = $this->perPage;

			// Initialize pagination library
			$this->pagination->initialize($config);

			// Define offset
			$page = $this->uri->segment(3);
			$offset = !$page?0:$page;

			// Get rows
			$conditions['returnType'] = '';
			$conditions['start'] = $offset;
			$conditions['limit'] = $this->perPage;

			//$this->load->model('Usuarios_model', 'usuarios');
			// carga de nombre de usuario
			//session_start();
			$usuarioId = $this->session->userdata('id');
			$_SESSION['key1']=$usuarioId;
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			//$data['arrSeccions']=$this->contents->traerSecciones(1);
			
			//print_r($data['arrSeccions']);
			$data = array(
			'title' => 'Servicios',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			'registros_datos' => $this->contents->traerRegistros($conditions),
			'arrSeccions1' => $this->contents->traerSecciones1(),
			'arrSeccions2' => $this->contents->traerSecciones2(),
			'arrSeccions3' => $this->contents->traerSecciones3(),
			'searchKeyword' => $this->session->userdata('searchKeyword'),
			'arrSeccions' => $this->contents->traerSecciones(1),
			'titulo_agregar'=>$this->uri->segment(5),
			'idioma_agregar'=>$this->uri->segment(6)
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('servicios/index', $data);
			$this->load->view('layout/foot', $data);

		}
	}

	public function view($id)
	{
		if (!$this->session->userdata('id')) {
			$this->load->view('acceso/head');
			$this->load->view('acceso/login');
			$this->load->view('acceso/foot');
		} else {
			$data = array();
			// carga de nombre de usuario
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			// Check whether member id is not empty
			if (!empty($id)) {
				$data = array(
				'title' => 'Ver contenido',
				'nombre_usuario' => $nombre,
				'registros_datos' => $this->contents->traerRegistros(array('id' => $id)),
				'searchKeyword' => $this->session->userdata('searchKeyword')
				);
				// Load the details page view
				$this->load->view('layout/head', $data);
				$this->load->view('layout/nav', $data);
				$this->load->view('layout/nav-sup', $data);
				$this->load->view('contenidos/view', $data);
				$this->load->view('layout/foot', $data);
			} else {
				redirect('contenidos_admin');
			}
		}
	}

	
	public function view_secciones()
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location'); 
			} else {
			$data = array();
			// carga de nombre de usuario
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			// Check whether member id is not empty
		
			$data = array(
			'title' => 'Secciones',
			'nombre_usuario' => $nombre,
			'arrSeccions' => $this->contents->traerSecciones(1)
			);
			// Load the details page view
			$this->load->view('layout/head', $data);
			$this->load->view('servicios/tb_secciones', $data);
			$this->load->view('layout/foot2', $data);
				
			}
	}



	public function agregar()
	{
		if (!$this->session->userdata('id')) {
			$this->load->view('acceso/head');
			$this->load->view('acceso/login');
			$this->load->view('acceso/foot');
		} else {
			$data = array();
			$memData = array();

			//SI se envio el formulario
			//echo $this->input->post('id_txt');
			if ($this->input->post('id_txt')) {
				// Validar formulario
/*
$this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
$this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
$this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
$this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
// $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
$this->form_validation->set_rules('UsuPass', 'Password', 'required');
$this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
$this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
*/
				// Preparar información del usuario

				$memData = array(
				'seccion'   => $this->input->post('seccion'),
				'idioma' => $this->input->post('idioma'),
				'titulo'     => $this->input->post('titulo'),
				'id_txt'=> $this->input->post('id_txt'),
				'subtitulo'    => $this->input->post('subtitulo'),
				'bgcolor'    => $this->input->post('bgcolor'),
				'banner_bg'   => $this->input->post('banner_bg'),
				'contenido'   => $this->input->post('contenido'),
				'f_contacto'   => $this->input->post('f_contacto'),
				'f_cotizacion'   => $this->input->post('f_cotizacion'),
				'f_temas_similares'   => $this->input->post('f_temas_similares'),
				'f_twitter'   => $this->input->post('f_twitter'),
				'f_facebook'   => $this->input->post('f_facebook'),
				'activo'   => $this->input->post('activo'),
				'f_brochure'   => $this->input->post('f_brochure'),
				'personas'   => $this->input->post('personas')
				);

				// Validate submitted form data
				//  if($this->form_validation->run() == true){
				// Insertar informacion
				$insert = $this->contents->insert($memData);

				if ($insert) {
					$this->session->set_userdata('success_msg', 'El contenido se agrego correctamente.');
					redirect('servicios_admin');
				} else {
					$data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
				}
				// }
			}
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data['member'] = $memData;
			$data['title'] = 'Agregar servicio';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			//$data['arrSecciones']=$this->contents->traerSeccionesCategorias(1);
			$data['arrSeccions']=$this->contents->traerSecciones(1);
			// Cargar vista
			//print_r($arrSeccions);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('servicios/add-edit', $data);
			$this->load->view('layout/foot', $data);
		}
	}
	
	public function agregar_categoria()
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location'); 
			} else {
			$data = array();
			$memData = array();
			$memData2 = array();
			//SI se envio el formulario
			//echo $this->input->post('id_txt');
			if ($this->input->post('id_txt')) {
				// Validar formulario
	/*
	$this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
	$this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
	$this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
	$this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
	// $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
	$this->form_validation->set_rules('UsuPass', 'Password', 'required');
	$this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
	$this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
	*/
				// Preparar información del usuario

					$memData = array(
					'seccion'   => '0',
					'idioma' => $this->input->post('idioma'),
					'titulo'     => $this->input->post('titulo'),
					'id_txt'=> $this->input->post('id_txt'),
					'subtitulo'    => $this->input->post('subtitulo'),
					'bgcolor'    => $this->input->post('bgcolor'),
					'banner_bg'   => $this->input->post('banner_bg'),
					'contenido'   => $this->input->post('contenido'),
					'f_contacto'   => $this->input->post('f_contacto'),
					'f_cotizacion'   => $this->input->post('f_cotizacion'),
					'f_temas_similares'   => $this->input->post('f_temas_similares'),
					'f_twitter'   => $this->input->post('f_twitter'),
					'f_facebook'   => $this->input->post('f_facebook'),
					'activo'   => $this->input->post('activo'),
					'f_brochure'   => $this->input->post('f_brochure'),
					'personas'   => $this->input->post('personas')
						);
					
					$memData2 = array(
					'seccion_id'   => $this->input->post('id_txt'),					
					'seccion'     => $this->input->post('titulo'),
					'activo'   => $this->input->post('activo'),
					'idioma' => $this->input->post('idioma')
					);

				// Validate submitted form data
				//  if($this->form_validation->run() == true){
				// Insertar informacion
				$insert = $this->contents->insert_categoria($memData);
				$insert2 = $this->contents->insert_categoria2($memData2);


				if ($insert) {
					$this->session->set_userdata('success_msg', 'El contenido se agrego correctamente.');
					redirect('servicios_admin');
					} else {
					$data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
					}
				// }
				}
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data['member'] = $memData;
			$data['title'] = 'Agregar categoria';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			//$data['arrSecciones']=$this->contents->traerSeccionesCategorias(1);
			$data['arrSeccions']=$this->contents->traerSecciones(1);
			// Cargar vista
			//print_r($arrSeccions);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('servicios/add-edit-categoria', $data);
			$this->load->view('layout/foot', $data);
			}
	}

	public function editar($id)
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location'); 
		} else {
			$data = array();

			// Get member data

			$memData = $this->contents->traerRegistro2($id);
			//  print_r($memData);


			// If update request is submitted
			if ($this->input->post('id_txt')) {
				// Form field validation rules
/*
$this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
$this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
$this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
$this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
// $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
$this->form_validation->set_rules('UsuPass', 'Password', 'required');
$this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
$this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
*/
				// Preparar información del usuario
				$memData = array(

				'seccion'   => $this->input->post('seccion'),
				'idioma' => $this->input->post('idioma'),
				'titulo'     => $this->input->post('titulo'),
				'id_txt'=> $this->input->post('id_txt'),
				'subtitulo'    => $this->input->post('subtitulo'),
				'bgcolor'    => $this->input->post('bgcolor'),
				'banner_bg'   => $this->input->post('banner_bg'),
				'contenido'   => $this->input->post('contenido'),
				'f_contacto'   => $this->input->post('f_contacto'),
				'f_cotizacion'   => $this->input->post('f_cotizacion'),
				'f_temas_similares'   => $this->input->post('f_temas_similares'),
				'f_twitter'   => $this->input->post('f_twitter'),
				'f_facebook'   => $this->input->post('f_facebook'),
				'activo'   => $this->input->post('activo'),
				'f_brochure'   => $this->input->post('f_brochure'),
				'personas'   => $this->input->post('personas')
				);

				// Validate submitted form data
				// if($this->form_validation->run() == true){
				// Update member data
				$update = $this->contents->update($memData, $id);

				if ($update) {
					$this->session->set_userdata('success_msg', 'El servicio ha sido correctamente actualizado.');
					redirect('servicios_admin');
				} else {
					$data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
				}
				//  }
			}
			// $usuarioId = $this->session->userdata('id');
			//$nombre = $this->contents->traerRegistro($usuarioId);
			//$data['member'] = $memData;
			// $data['title'] = 'Actualizar Contenido';
			//$data['usuario_activo']= $this->session->userdata('id');
			//$_SESSION['key1']=$this->session->userdata('id');
			//$data['nombre_usuario'] = $nombre;

			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$personasXcontenido = $this->contents->traerPersonasDelContenido($id);
			$personasXcontenido = trim($personasXcontenido, ',');
			
			if ($personasXcontenido=='') {
				$peoplesx = '';
			}else{
				$peoplesx = $this->persons->traerPersonasPorContenidoTb($personasXcontenido);
				
			}
			$data['member'] = $memData;
			$data['title'] = 'Actualizar servicio';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			$data['arrPersons4'] = $peoplesx;
			$data['arrSeccions']=$this->contents->traerSecciones(1);

			// Load the edit page view
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('servicios/add-edit', $data);
			$this->load->view('layout/foot', $data);
		}
	}

	public function editar2($id)
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location');
			} else {
			$data = array();

			// Get member data

			$memData = $this->contents->traerRegistro3($id);
			 


			// If update request is submitted
			if ($this->input->post('id')) {
				// Form field validation rules
	/*
	$this->form_validation->set_rules('UsuNom', 'Nombre', 'required');
	$this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');
	$this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');
	$this->form_validation->set_rules('UsuUser', 'Usuario', 'required');
	// $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
	$this->form_validation->set_rules('UsuPass', 'Password', 'required');
	$this->form_validation->set_rules('UsuActivo', 'Activo', 'required');
	$this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');
	*/
				// Preparar información del usuario
				$memData = array(

				'seccion'   => $this->input->post('seccion'),
				'seccion_id'=> $this->input->post('seccion_id'),
				'idioma' => $this->input->post('idioma'),
				'activo'   => $this->input->post('activo')
					);

				// Validate submitted form data
				// if($this->form_validation->run() == true){
				// Update member data
				$update = $this->contents->update_categoria($memData, $id);

				if ($update) {
					$this->session->set_userdata('success_msg', 'El servicio ha sido correctamente actualizado.');
					redirect('servicios_admin');
					} else {
					$data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
					}
				//  }
				}
			// $usuarioId = $this->session->userdata('id');
			//$nombre = $this->contents->traerRegistro($usuarioId);
			//$data['member'] = $memData;
			// $data['title'] = 'Actualizar Contenido';
			//$data['usuario_activo']= $this->session->userdata('id');
			//$_SESSION['key1']=$this->session->userdata('id');
			//$data['nombre_usuario'] = $nombre;

			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$personasXcontenido = $this->contents->traerPersonasDelContenido($id);
			$personasXcontenido = trim($personasXcontenido, ',');

			if ($personasXcontenido=='') {
				$peoplesx = '';
				} else {
				$peoplesx = $this->persons->traerPersonasPorContenidoTb($personasXcontenido);

				}
			$data['member'] = $memData;
			$data['title'] = 'Actualizar  categoria de servicio';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			$data['arrPersons4'] = $peoplesx;
			$data['arrSeccions']=$this->contents->traerSecciones(1);

			// Load the edit page view
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('servicios/edit-categoria', $data);
			$this->load->view('layout/foot', $data);
			}
	}



	public function borrar($id)
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location'); 
		} else {
			if ($id) {
				$delete = $this->contents->delete($id);
				if ($delete) {
					$this->session->set_userdata('success_msg', 'El registro se borro correctamente.');
				} else {
					$this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
				}
			}
			// Redirect to the list page
			redirect('servicios_admin');
		}
	}
	
	public function borrar2($id)
	{
		if (!$this->session->userdata('id')) {
			redirect('/tutor/', 'location');
			} else {
			if ($id) {
				$delete = $this->contents->delete2($id);
				if ($delete) {
					$this->session->set_userdata('success_msg', 'El registro se borro correctamente.');
					} else {
					$this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
					}
				}
			// Redirect to the list page
			redirect('servicios_admin');
			}
	}


	public function cambiar_pass()
	{

		$data['username']=htmlspecialchars($_POST['name']);
		$data['password']=htmlspecialchars($_POST['pwd']);
		$res=$this->Login_model->islogin($data);
		if ($res) {
			$this->session->set_userdata('id',$data['username']);
			echo base_url()."tutor/";
		} else {
			echo 0;
		}
	}

	public function check_login()
	{

		$data['username']=htmlspecialchars($_POST['name']);
		$data['password']=htmlspecialchars($_POST['pwd']);
		$res=$this->Login_model->islogin($data);
		if ($res) {
			$this->session->set_userdata('id',$data['username']);
			echo base_url()."tutor/";
		} else {
			echo 0;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url()."tutor/");
	}
}