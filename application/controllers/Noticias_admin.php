<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory
		$this->load->library ('session');
		$this->load->model('Login_model');
		$this->load->model('Usuarios_model', 'usuarios');
		$this->load->model('Noticias_model', 'contents');
		$this->load->model('Personas_model', 'persons');
		// Load form helper and library
		$this->load->helper('form');
		$this->load->library('form_validation');
		// Load pagination library
		$this->load->helper('url');
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
			$config['base_url']    = base_url().'noticias_admin/index/';
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
			$data = array(
			'title' => 'Articulos, Noticias y Perspectivas',
			'usuario_activo'=>$usuarioId,
			'nombre_usuario' => $nombre,
			'registros_datos' => $this->contents->traerRegistros($conditions),
			'searchKeyword' => $this->session->userdata('searchKeyword')
			);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('noticias/index', $data);
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
				'sintesis'    => $this->input->post('sintesis'),
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
					redirect('noticias_admin');
				} else {
					$data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
				}
				// }
			}
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$data['member'] = $memData;
			$data['title'] = 'Articulos, Noticias y Perspectivas ';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			$data['arrSeccions']=$this->contents->traerSecciones(1);
			$data['arrSeccionesRel']=$this->contents->traerServicios();
			// Cargar vista
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('noticias/add-edit', $data);
			$this->load->view('layout/foot', $data);
		}
	}

	public function editar($id)
	{
		if (!$this->session->userdata('id')) {
			$this->load->view('acceso/head');
			$this->load->view('acceso/login');
			$this->load->view('acceso/foot');
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
				'sintesis'    => $this->input->post('sintesis'),
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
					$this->session->set_userdata('success_msg', 'El contenido ha sido correctamente actualizado.');
					redirect('noticias_admin');
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
			$data['member'] = $memData;
			$data['title'] = 'Articulos, Noticias y Perspectivas';
			$data['nombre_usuario'] = $nombre;
			$data['arrPersons']=$this->persons->traerPersonas();
			$data['arrPersons4'] = $this->persons->traerPersonasPorContenidoTb($personasXcontenido);
			$data['arrSeccions']=$this->contents->traerSecciones(1);
			$data['arrSeccionesRel']=$this->contents->traerServicios();

			// Load the edit page view
			$this->load->view('layout/head', $data);
			$this->load->view('layout/nav', $data);
			$this->load->view('layout/nav-sup', $data);
			$this->load->view('noticias/add-edit', $data);
			$this->load->view('layout/foot', $data);
		}
	}

	public function borrar($id)
	{
		if (!$this->session->userdata('id')) {
			$this->load->view('acceso/head');
			$this->load->view('acceso/login');
			$this->load->view('acceso/foot');
		} else {
			// Check whether member id is not empty
			if ($id) {
				// Delete member
				$delete = $this->contents->delete($id);

				if ($delete) {
					$this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');
				} else {
					$this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');
				}
			}

			// Redirect to the list page
			redirect('noticias_admin');
		}
	}
	
	
	
	public function notas_servicios()
	{
		$data["title"] = 'Sevicios';
		$this->load->view('noticias/datatable_servicios', $data);  
	}
	
	public function datatable()
	{
		   $this->load->model("Noticias_model", 'noticias');  
           $fetch_data = $this->noticias->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->titulo;    
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval(@$_POST["draw"]),  
                "recordsTotal"            =>     $this->noticias->get_all_data(),  
                "recordsFiltered"         =>     $this->noticias->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
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
	
	
	
	public function agregarRelacion()
	{
	     $data = array(
               'idSeccion' => $this->input->post('idSeccion'),
               'idNota' => $this->input->post('idNota')
         );
         if($this->db->insert('seccion_noticias', $data))
		 {
		  echo 'Added successfully.'; 
		 }else{
		  echo 'Error.'; 	
		 }
		
	}
	
	public function eliminarRelacion()
	{
		
         $this->db->where('idSeccion', $this->input->post('idSeccion'));
         $this->db->where('idNota', $this->input->post('idNota'));

         if($this->db->delete('seccion_noticias'))
		 {
		  echo 'Delete successfully.'; 
		 }else{
		  echo 'Error.'; 	
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