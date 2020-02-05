<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Personas_admin extends CI_Controller {



	function __construct()  

	{  

	    parent::__construct();  

	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  

	    $this->load->library ('session');  

	    $this->load->model('Login_model');

	    $this->load->model('Usuarios_model', 'usuarios');

	     // Load form helper and library

        $this->load->helper('form');

        $this->load->library('form_validation');        

        // Load pagination library

        $this->load->library('pagination');  

        $this->load->model('personas_model', 'dm');      

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

			$usuarioId = $this->session->userdata('id');

			$_SESSION['key1']=$usuarioId;

			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);

			$data = array(

			'title' => 'Personal TUTORNEGOTIA',

			'usuario_activo'=>$usuarioId,

			'nombre_usuario' => $nombre,

			/*'registros' => $this->dm->get_registros(),*/

			);

			$this->load->view('layout/head', $data);

			$this->load->view('layout/nav', $data);

			$this->load->view('layout/nav-sup', $data);

			$this->load->view('personas_admin/index', $data);

			$this->load->view('layout/foot', $data);



		}

		

	}

	

	function get_registros() {

		$records = $this->dm->get_records();

		echo json_encode($records);

	}

	

	

	public function ver($id){

        $data = array();

        // carga de nombre de usuario

		$usuarioId = $this->session->userdata('id');

		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);

        // Check whether member id is not empty

        if(!empty($id)){

            $data = array(

			  'title' => 'Ver Usuario',

			  'nombre_usuario' => $nombre,

			  'usuarios_datos' => $this->usuarios->traerRegistros(array('id' => $id)),

			  'searchKeyword' => $this->session->userdata('searchKeyword')

             );

            // Load the details page view

             $this->load->view('layout/head', $data);

			 $this->load->view('layout/nav', $data);

			 $this->load->view('layout/nav-sup', $data);

			 $this->load->view('usuarios/view', $data);	

		     $this->load->view('layout/foot', $data);   

        }else{

            redirect('usuarios');

        }

    }

    

    public function agregar(){

        $data = array();

        $memData = array();

        

        //SI se envio el formulario

        echo $this->input->post('memSubmit');

        if($this->input->post('memSubmit')){

            // Validar formulario

            $this->form_validation->set_rules('UsuNom', 'Nombre', 'required');

            $this->form_validation->set_rules('UsuApePat', 'Apellido Paterno', 'required');

            $this->form_validation->set_rules('UsuApeMat', 'Apellido Materno', 'required');

            $this->form_validation->set_rules('UsuUser', 'Usuario', 'required');

         // $this->form_validation->set_rules('UsuUser', 'Usuario', 'required|valid_email');

            $this->form_validation->set_rules('UsuPass', 'Password', 'required');

            $this->form_validation->set_rules('UsuActivo', 'Activo', 'required');

            $this->form_validation->set_rules('UsuPerfil', 'Perfil de Usuario', 'required');

            

            // Preparar información del usuario

            $memData = array(

                'UsuNom'=> $this->input->post('UsuNom'),

                'UsuApePat' => $this->input->post('UsuApePat'),

                'UsuApeMat'     => $this->input->post('UsuApeMat'),

                'UsuUser'    => $this->input->post('UsuUser'),

                'UsuPass'   => $this->input->post('UsuPass'),

                'UsuActivo'   => $this->input->post('UsuActivo'),

                'UsuPerfil'   => $this->input->post('UsuPerfil')

            );

            

            // Validate submitted form data

            if($this->form_validation->run() == true){

                // Insertar informacion

                $insert = $this->usuarios->insert($memData);



                if($insert){

                    $this->session->set_userdata('success_msg', 'El usuario se agrego correctamente.');

                    redirect('usuarios');

                }else{

                    $data['error_msg'] = 'Ocurrio un problema, por fabor intentelo de nuevo.';

                }

            }

        }

        $usuarioId = $this->session->userdata('id');

		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);

        $data['member'] = $memData;

        $data['title'] = 'Agregar Usuario';       

        $data['nombre_usuario'] = $nombre;

        // Cargar vista

        $this->load->view('layout/head', $data);

		$this->load->view('layout/nav', $data);

		$this->load->view('layout/nav-sup', $data);

		$this->load->view('usuarios/add-edit', $data);	

		$this->load->view('layout/foot', $data); 

    }

    

    public function editar(){
        $id = $this->input->post('id');
        $data = array();
        // Get member data
        $memData = $this->dm->traerPersona($id);
        // If update request is submitted
        if($this->input->post('memSubmit')){      
            // Preparar información del usuario
            $memData = array(
            'PersonaNom'=> $this->input->post('PersonaNom'),
			'PersonaApePat'=> $this->input->post('PersonaApePat'),
			'PersonaApeMat'=> $this->input->post('PersonaApeMat'),
			'PersonaSexo'=> $this->input->post('PersonaSexo'),
			'PersonaTelCel'=> $this->input->post('PersonaTelCel'),
			'PersonaTelCasa'=> $this->input->post('PersonaTelCasa'),
			'PersonaTelOfi'=> $this->input->post('PersonaTelOfi'),
			'PersonaParticipaEmpresa'=> $this->input->post('PersonaParticipaEmpresa'),
			'PersonaEmail'=> $this->input->post('PersonaEmail'),
			'PersonaLinkedin'=> $this->input->post('PersonaLinkedin'),
			'PersonaTwitter'=> $this->input->post('PersonaTwitter'),
			'PersonaFoto'=> $this->input->post('PersonaFoto'),
			'PersonaDirOfi'=> $this->input->post('PersonaDirOfi'),
			'PersonaPaisOfi'=> $this->input->post('PersonaPaisOfi'),
			'PersonaEstadoOfi'=> $this->input->post('PersonaEstadoOfi'),
			'PersonaCiudadOfi'=> $this->input->post('PersonaCiudadOfi'),
			'PersonaCpOfi'=> $this->input->post('PersonaCpOfi'),
			'PersonaResumen'=> $this->input->post('texto'),
			'PersonaFchCrea'=> $this->input->post('PersonaFchCrea'),
			'PersonaFchAlta'=> $this->input->post('PersonaFchAlta'),
            'PersonaStatus'=> $this->input->post('PersonaStatus'),
            'PersonaOrden'=> $this->input->post('PersonaOrden')
            );

            $memData2 = array(

            'UsuNom'=> $this->input->post('PersonaNom'),

			'UsuApePat'=> $this->input->post('PersonaApePat'),

			'UsuApeMat'=> $this->input->post('PersonaApeMat'),

			'UsuActivo'=> $this->input->post('PersonaStatus')

            );

            echo $id= $this->input->post('PersonaId');

            echo $id2= $this->input->post('PersonaUsu');

                // Update member data

               $update = $this->dm->update($memData,$memData2, $id,$id2);

               // echo $update;

                if($update){

                    $this->session->set_userdata('success_msg', 'El registro ha sido correctamente actualizado.');

                    redirect('personas_admin');

                }else{

                    $data['error_msg'] = 'Ocurrio un problema, por favor intentelo de nuevo.';

                }

           

        }

        $usuarioId = $this->session->userdata('id');

		$nombre = $this->usuarios->traerNombreUsuario($usuarioId);

        /*

        $data['member'] = $memData;

        $data['title'] = 'Actualizar Usuario';

        $data['nombre_usuario'] = $nombre;

        

        // Load the edit page view

        

        $this->load->view('layout/head', $data);

		$this->load->view('layout/nav', $data);

		$this->load->view('layout/nav-sup', $data);

		$this->load->view('personas_admin/index', $data);	

		$this->load->view('layout/foot', $data); */

    }

    

    public function borrar($id){

        // Check whether member id is not empty

        if($id){

            // Delete member

            $delete = $this->member->delete($id);

            

            if($delete){

                $this->session->set_userdata('success_msg', 'El Usuario se borro correctamente.');

            }else{

                $this->session->set_userdata('error_msg', 'Ocurrio un problema, por fabor intentelo de nuevo.');

            }

        }

        

        // Redirect to the list page

        redirect('members');

    }

    

    function ver_registro() {	

	    $id = $this->input->post('id');	

		$records = $this->dm->ver_registro($id);

		

		echo $records;

	}

	

    public function cambiar_pass(){  

     

    $data['username']=htmlspecialchars($_POST['name']);  

    $data['password']=htmlspecialchars($_POST['pwd']);  

    $res=$this->Login_model->islogin($data);  

	    if($res){     

	        $this->session->set_userdata('id',$data['username']);   

	      echo base_url()."tutor/";  

	    }  

	    else{  

	       echo 0;  

	    }   

	} 

	

	public function check_login(){  

     

    $data['username']=htmlspecialchars($_POST['name']);  

    $data['password']=htmlspecialchars($_POST['pwd']);  

    $res=$this->Login_model->islogin($data);  

	    if($res){     

	        $this->session->set_userdata('id',$data['username']);   

	      echo base_url()."tutor/";  

	    }  

	    else{  

	       echo 0;  

	    }   

	}  

	public function logout(){  

	    $this->session->sess_destroy();  

	    header('location:'.base_url()."tutor/");  

	      

	}  

}