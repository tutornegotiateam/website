<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {

	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
	    $this->load->library ('session');  
	    $this->load->model('Login_model');
	}  
	
	public function index()
	{
		if (!$this->session->userdata('id')) {			
		    $this->load->view('acceso/head');
		    $this->load->view('acceso/login');	
		    $this->load->view('acceso/foot');
		}else{
			$this->load->model('Usuarios_model', 'usuarios');
			// carga de nombre de usuario
			$usuarioId = $this->session->userdata('id');
			$nombre = $this->usuarios->traerNombreUsuario($usuarioId);
			$ultimo_acceso = $this->usuarios->traerUltimoAcceso($usuarioId);
			$datos = array(
			  'nombre_usuario' => $nombre,
			  'ultimo_acceso' => $ultimo_acceso
            /*'title' => 'Inicio',
            'navegation1' => null,
            'navegation2' => null,
            'username' => $username,
            'area' => $area,
            'cantidades' => $_cantidadesArchivo,
            'cantidadesTP' => $_cantidadesTP,
            'cantidadesTS' => $_cantidadesTS,
            'cantidadesH' => $_cantidadesPorArea,
            'expedientesReservados' => $expedientesReservados,
            'indiceReservados' => $indiceReserva,
            'solicitudes' => $solicitudes*/
             );
             $this->load->view('layout/head', $datos);
			 $this->load->view('layout/nav', $datos);
			 $this->load->view('layout/nav-sup', $datos);
			 $this->load->view('layout/body', $datos);	
		     $this->load->view('layout/foot', $datos);   
			
		}
		
	}
	
	public function check_login(){  
     
    $data['username']=htmlspecialchars($_POST['name']);  
    $usuario = htmlspecialchars($_POST['name']); 
    $data['password']=htmlspecialchars($_POST['pwd']);  
    $res=$this->Login_model->islogin($data);  
	    if($res){ 
	        $id =htmlspecialchars($_POST['name']);
	        $data2['UsuFchUlt'] =date('Y-m-d H:i:s');
	        $this->Login_model->registrar_acceso($data2,$id);    
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