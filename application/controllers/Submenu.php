<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory
        $this->load->library ('session');
        $this->load->model('Login_model');
        $this->load->model('Usuarios_model', 'usuarios');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Submenu_model', 'submenu');
        $this->load->model('Idiomas_model','idiomam');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Load pagination library
        $this->load->library('pagination');
        // Per page limit
        $this->perPage = 20;
    }



    public function index()
    {
        if (!$this->session->userdata('id')) {
            $this->load->view('acceso/head');
            $this->load->view('acceso/login');
            $this->load->view('acceso/foot');
        }else {
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
                $inputLenguage = $this->input->post('searchLanguage');
                $searchKeyword = strip_tags($inputKeywords);
                $searchLanguage= strip_tags($inputLenguage);
                if (!empty($searchKeyword)) {
                    $this->session->set_userdata('searchKeyword',$searchKeyword);
                }else {
                    $this->session->unset_userdata('searchKeyword');
                }
                if (!empty($searchLanguage)) {
                    $this->session->set_userdata('searchLanguage',$searchLanguage);
                }else {
                    $this->session->unset_userdata('searchLanguage');
                }
            }elseif ($this->input->post('submitSearchReset')) {
                $this->session->unset_userdata('searchKeyword');
                $this->session->unset_userdata('searchLanguage');
            }
            $data['searchKeyword'] = $this->session->userdata('searchKeyword');
            $data['searchLanguage'] = $this->session->userdata('searchLanguage');
            // Get rows count
            $conditions['searchKeyword'] = $data['searchKeyword'];
            $conditions['searchLanguage'] = $data['searchLanguage'];
            $conditions['returnType'] = 'count';
            $rowsCount = $this->submenu->traerRegistros($conditions);
            // Pagination config
            $config['base_url'] = base_url().'submenu/index/';
            $config['uri_segment'] = 3;
            $config['total_rows'] = $rowsCount;
            $config['per_page'] = $this->perPage;
            // Initialize pagination library
            $this->pagination->initialize($config);
            // Define offset
            $page   = $this->uri->segment(3);
            $offset = !$page?0:$page;
            // Get rows
            $conditions['returnType'] = '';
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            //$this->load->model('Usuarios_model', 'usuarios');
            // carga de nombre de usuario
            $usuarioId = $this->session->userdata('id');
            $nombre    = $this->usuarios->traerNombreUsuario($usuarioId);
            $data      = array('title' => 'Submenu (Inferior)','nombre_usuario'=> $nombre,'arr_idiomam'   => $this->idiomam->idiomasLista(),'registros'     => $this->submenu->traerRegistros($conditions),'searchKeyword' => $this->session->userdata('searchKeyword'),'searchLanguage'=> $this->session->userdata('searchLanguage'));
            $this->load->view('layout/head', $data);
            $this->load->view('layout/nav', $data);
            $this->load->view('layout/nav-sup', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('layout/foot', $data);
        }
    }



    public function ver($id)
    {
        if (!$this->session->userdata('id')) {
            $this->load->view('acceso/head');
            $this->load->view('acceso/login');
            $this->load->view('acceso/foot');
        }
        $data = array();
        // carga de nombre de usuario
        $usuarioId = $this->session->userdata('id');
        $nombre    = $this->usuarios->traerNombreUsuario($usuarioId);
        // Check whether member id is not empty
        if (!empty($id)) {

            $data = array('title' => 'Ver Usuario','nombre_usuario'=> $nombre,'usuarios_datos'=> $this->usuarios->traerRegistros(array('id' => $id)),'searchKeyword' => $this->session->userdata('searchKeyword'));
            // Load the details page view
            $this->load->view('layout/head', $data);
            $this->load->view('layout/nav', $data);
            $this->load->view('layout/nav-sup', $data);
            $this->load->view('usuarios/view', $data);
            $this->load->view('layout/foot', $data);
        }else {
            redirect('usuarios');
        }
    }

    public function agregar()
    {
        if (!$this->session->userdata('id')) {
            $this->load->view('acceso/head');
            $this->load->view('acceso/login');
            $this->load->view('acceso/foot');
        }
        $data = array();
        $memData = '';
        //SI se envio el formulario
        // $this->input->post('memSubmit');
        if ($this->input->post('MenuTitulo')) {
            // Validar formulario
            $this->form_validation->set_rules('MenuTitulo', 'Titulo', 'required');
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
            
            if($this->input->post('MenuUrl') !=''){
				$urlMenu = $this->input->post('MenuUrl');
			}else{
				$urlMenu = '#';
			}
            if($this->input->post('MenuPosicion')==''){
				$posicion = 1;
			}else{
				$posicion = $this->input->post('MenuPosicion');
			}
            $memData = array(
            'MenuLanguaje'=> $this->input->post('idioma'),
            'MenuUrlFriendly'   => $this->input->post('MenuUrlFriendly'),
            'MenuTitulo'  => $this->input->post('MenuTitulo'),            
            'IdMenuSup'     => $this->input->post('menu_superior'),
            'MenuPadre'     => $this->input->post('padreSubmenu'),
            'MenuTipo'       => $this->input->post('tipoMenu'),
            'MenuCabezera'       => $this->input->post('cabezera'),
            'MenuUrl'       => $urlMenu,
            'MenuActivo'       => $this->input->post('activo'),
            'MenuColumna'       => $this->input->post('columna'),
            'MenuPosicion'       => $posicion,
            );
            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Insertar informacion
                $insert = $this->submenu->insert($memData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'El usuario se agrego correctamente.');
                    redirect('submenu');
                }else {
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }
        $usuarioId = $this->session->userdata('id');
        $nombre    = $this->usuarios->traerNombreUsuario($usuarioId);
        echo $this->uri->segment(3); 
        echo $this->uri->segment(4); 
        echo $this->uri->segment(5); 
        $data['member'] = $memData;
        $data['title'] = 'Agregar Menu';
        $data['nombre_usuario'] = $nombre;
        $data['idiomas_activos'] =$this->idiomam->idiomasListaActivosForms();
        $data['IdiomaDelMenu'] = '1';
        $data['arrlistarPadres'] = $this->submenu->listarPadres(1);
        $data['arrlistarSuperior'] = $this->submenu->listarSuperior(1);
        $data['arr_submenu'] = 
        $data['varId2'] = 0;
        $data['varId'] = 0;
        $data['arrlistarEnlacesDisponibles'] = $this->submenu->listarEnlacesDisponibles(1);
        // Cargar vista
        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('layout/nav-sup', $data);
        $this->load->view('submenu/add-edit', $data);
        $this->load->view('layout/foot', $data);
    }



    public function agregaridioma()
    {

        if (!$this->session->userdata('id')) {

            $this->load->view('acceso/head');

            $this->load->view('acceso/login');

            $this->load->view('acceso/foot');

        }

        $data = array();

        $memData = '';

        //SI se envio el formulario

        // $this->input->post('memSubmit');

        if ($this->input->post('memSubmit')) {

            // Validar formulario



            $this->form_validation->set_rules('MenuSupTitulo-1', 'Titulo', 'required');

            //echo $this->input->post('MenuSupTitulo - 1');

            /*



            $this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');

            $this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');

            $this->form_validation->set_rules('UsuUser', 'Usuario', 'required');

            // $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');

            $this->form_validation->set_rules('UsuPass', 'Password', 'required');

            $this->form_validation->set_rules('UsuActivo', 'Activo', 'required');

            $this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');

            */

            // Preparar información del usuario

            $memData = array('MenuSupLanguaje'=> $this->input->post('MenuSupLanguaje-1'),'MenuSupTitulo'  => $this->input->post('MenuSupTitulo-1'),'MenuSupIdTxt'   => $this->input->post('MenuSupIdTxt-1'),'MenuSupUrl'     => $this->input->post('MenuSupUrl-1'),'MenuStatus'     => $this->input->post('MenuStatus-1'),'MenuTipo'       => $this->input->post('MenuTipo-1')

            );

            $idLenguaje = $this->input->post('MenuSupLanguaje-1');

            $idLink     = $this->input->post('MenuSupIdTxt-1');



            // Validate submitted form data

            if ($this->form_validation->run() == true) {

                // Insertar informacion

                $insert = $this->menu->insert_idioma($memData);

                if ($insert) {

                    $this->session->set_userdata('success_msg', 'La opción de menu se agrego correctamente.');

                    redirect('menu');

                }else {

                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';

                }

            }

        }

        $usuarioId = $this->session->userdata('id');

        $nombre    = $this->usuarios->traerNombreUsuario($usuarioId);

        $data['member'] = $memData;

        $data['title'] = 'Agregar Menu';

        $data['nombre_usuario'] = $nombre;

        $data['idiomas_activos'] = $this->idiomam->idiomasListaActivosForms();

        $data['varId2'] = 0;

        $data['varId'] = 0;

        $data['vId1'] = $this->uri->segment(3);

        $data['vId2'] = $this->uri->segment(4);

        $data['vId3'] = $this->uri->segment(5);

        // Cargar vista

        $this->load->view('layout/head', $data);

        $this->load->view('layout/nav', $data);

        $this->load->view('layout/nav-sup', $data);

        $this->load->view('menu/add-idioma', $data);

        $this->load->view('layout/foot', $data);

    }



    public function editar()
    {
        if (!$this->session->userdata('id')) {
            $this->load->view('acceso/head');
            $this->load->view('acceso/login');
            $this->load->view('acceso/foot');
        }
        $data = array();
        $memData ='';
        
     
         //echo $id = $this->input->post('MenuId');
        $id = $this->uri->segment(3);
        // Get member data
        $memData = $this->menu->traerRegistros(array('id' => $id));
       // $memDatos = $this->menu->traerRegistrosActivos($id2);
      
        if($this->input->post('MenuId')) {
            $listadoIdiomas = $this->menu->idiomasActivos();
            //print_r($listadoIdiomas);
            // Form field validation rules
            $this->form_validation->set_rules('MenuTitulo', 'Titulo', 'required');
            /*          $this->form_validation->set_rules('MenuSupUrl', 'Url', 'required');
            $this->form_validation->set_rules('MenuSupLanguaje', 'Apellido Materno', 'required');
            //  $this->form_validation->set_rules('MenuUbica', 'Posición en el menu', 'required');
            // $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');
            $this->form_validation->set_rules('MenuTipo', 'Tipo de menu', 'required');
            $this->form_validation->set_rules('MenuStatus', 'Estatus', 'required');
            */
            // Preparar información del usuario
            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Update member data
                //     if(!empty($listadoIdiomas)){ foreach($listadoIdiomas as $row){
                //   $idioma1 = $row['IdiomaId'];
                 $id = $this->input->post('MenuId');
                 if($this->input->post('MenuUrl') !=''){
				    $urlMenu = $this->input->post('MenuUrl');
				 }else{
					$urlMenu = '#';
				 }
                $memData = array(
                                'MenuLanguaje'=> $this->input->post('idioma'),
					            'MenuUrlFriendly'   => $this->input->post('MenuUrlFriendly'),
					            'MenuTitulo'  => $this->input->post('MenuTitulo'),            
					            'IdMenuSup'     => $this->input->post('menu_superior'),
					            'MenuPadre'     => $this->input->post('padreSubmenu'),
					            'MenuTipo'       => $this->input->post('tipoMenu'),
					            'MenuCabezera'       => $this->input->post('cabezera'),
					            'MenuUrl'       => $urlMenu,
					            'MenuActivo'       => $this->input->post('activo'),
					            'MenuColumna'       => $this->input->post('columna'),
					            'MenuPosicion'       => $this->input->post('MenuPosicion'),
                                 );
                $update = $this->submenu->update($memData, $id);
                //     }}
                if ($update) {
                    $this->session->set_userdata('success_msg', 'El menu ha sido correctamente actualizado.');
                    redirect('submenu');
                }else {
                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';
                }
            }
        }else{
        	
        	//echo "entro";
			$usuarioId = $this->session->userdata('id');
        $nombre    = $this->usuarios->traerNombreUsuario($usuarioId);
        $this->session->set_userdata('idiomaSeleccionado',1);
        $memData2  = $this->submenu->traerRegistros2($id);
        
       // print_r($memData2);
        $data['member2'] = $memData2;
       // $data['registros'] = $memDatos;
        $data['title'] = 'Actualizar Menu';
        $data['nombre_usuario'] = $nombre;
        $data['idiomas_activos'] = $this->idiomam->idiomasListaActivosForms();
        $data['idiomas_activos_form'] = $this->idiomam->idiomasListaActivosForms();
      //  $data['varId2'] = $id2;
        $data['varId'] = $id;
        $data['arrlistarPadres'] = $this->submenu->listarPadres(1);
        $data['arrlistarSuperior'] = $this->submenu->listarSuperior(1);
       // echo $id."-".$id2;
        $data['IdiomaDelMenu'] = $this->submenu->traerIdiomaRegistro($id);
        $data['arrlistarEnlacesDisponibles'] = $this->submenu->listarEnlacesDisponibles(1);
        //$data['idiomaSeleccionado']
        // Load the edit page view
        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('layout/nav-sup', $data);
        $this->load->view('submenu/add-edit', $data);
        $this->load->view('layout/foot', $data);
		}
        
    }



    public function delete()
    {

        if (!$this->session->userdata('id')) {

            $this->load->view('acceso/head');

            $this->load->view('acceso/login');

            $this->load->view('acceso/foot');

        }

        // Check whether member id is not empty

        $id = $this->uri->segment(3);

        if ($id) {

            // Delete member

            $delete = $this->submenu->delete($id);



            if ($delete) {

                $this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');

            }else {

                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');

            }

        }



        // Redirect to the list page

        redirect('submenu');

    }



    public function cambiar_posicion()
    {

        if (!$this->session->userdata('id')) {

            $this->load->view('acceso/head');

            $this->load->view('acceso/login');

            $this->load->view('acceso/foot');

        }

        // Check whether member id is not empty

        $a = $this->input->post('a');

        $a1= $this->input->post('a1');

        $b = $this->input->post('b');

        $b1= $this->input->post('b1');



        if ($a) {

            // Delete member

            $cambiar = $this->menu->cambiar_posicion($a,$a1,$b,$b1);



            if ($cambiar) {

                $this->session->set_userdata('success_msg', 'EL cambio se realizao correctamente.');

            }else {

                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');

            }

        }



        // Redirect to the list page

        //redirect('menu');

    }



    public function existe_idioma()
    {

        if (!$this->session->userdata('id')) {

            $this->load->view('acceso/head');

            $this->load->view('acceso/login');

            $this->load->view('acceso/foot');

        }

        // Check whether member id is not empty

        $a = $this->input->post('a');

        $b = $this->input->post('b');

        $c = $this->input->post('c');



        if ($a) {

            // Delete member

            $cambiar = $this->menu->menu_existe($a,$b,$c);



            if ($cambiar) {

                $this->session->set_userdata('success_msg', 'EL cambio se realizao correctamente.');

            }else {

                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');

            }

        }



        // Redirect to the list page

        //redirect('menu');

    }







}