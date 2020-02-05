<?php

class  Submenu_model extends CI_Model{

	function __construct()  

	{  
	    parent::__construct(); 
	    $this->load->database(); 
	    $this->table = 'menu';
	    $this->table2 = 'menu_superior';
	    $this->table3 = 'menu_inferior';
	} 

	

	function traerMenuSuperior($id,$idioma){

		$this->db->select('*');

        $this->db->from('menu_superior');

        $this->db->where('MenuUbica', $id);

        $this->db->where('MenuSupLanguaje',$idioma);

		$query = $this->db->get();

		return $query->row();		

	}

	
	function traerIdiomaRegistro($id){
		$this->db->select('*');
        $this->db->from('menu_inferior');
        $this->db->where('MenuId', $id);
		return $this->db->get()->row()->MenuLanguaje;	
		
	}
	
	function listarPadres($id){
		$this->db->select('*');
        $this->db->where('MenuCabezera', '1');
        $this->db->where('MenuLanguaje', $id);
		$aResult = $this->db->get('menu_inferior');
	  // print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
				}
		return $aResult->result_array(); 
	}
	
	function listarSuperior($id){
		$this->db->select('*');
     /*   $this->db->where('MenuCabezera', '1');*/
        $this->db->where('MenuSupLanguaje', $id);
		$aResult = $this->db->get('menu_superior');
 	   // print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
				}
		return $aResult->result_array(); 
	}
	
	function listarEnlacesDisponibles($id){
		$sql = 'SELECT *, "contenido" as tipoenlace FROM contenidos WHERE idioma="'.$id.'" AND activo="1" UNION SELECT *, "servicios" as tipoenlace FROM servicios WHERE idioma="'.$id.'" AND activo="1"';
 	    $aResult = $this->db->query($sql);
		if (!$aResult->num_rows() == 1) {
			return false;
				}
		return $aResult->result_array(); 
	}

	function traerMenuCategoriaServicio($id,$idioma){
		$this->db->select('*');
        $this->db->from('servicios');
        $this->db->where('ServicioTituloId', $id);
        $this->db->where('ServicioIdioma',$idioma);
		$query = $this->db->get();
		return $query->row();		
	}

	

	function menuSuperiorLista($idioma){
		$this->db->select('*');
		$this->db->from('menu_superior');
		$this->db->where('MenuSupLanguaje',$idioma);
		$this->db->order_by("MenuUbica", "asc");
		$result=$this->db->get();
		return$result->result();
	}

	
	function menuInferiorLista($superior, $idioma, $tipo){
		if($tipo ==1){
			$this->db->select('*');
			$this->db->from('menu_inferior');
			$this->db->where('IdMenuSup',$superior);
			$this->db->where('MenuLanguaje',$idioma);
			$this->db->order_by("MenuPosicion", "asc");	
			$result=$this->db->get();
			return $result->result();
		}elseif($tipo ==2){
			$this->db->select('*');
		    $this->db->from('menu_inferior');
		    $this->db->where('IdMenuSup',$superior);
		    $this->db->where('MenuLanguaje',$idioma);
		    $this->db->order_by("MenuPosicion", "asc");
		    $result=$this->db->get();
		    return $result->result();
		}else{
     		return null;
		}
	}

	

	function menuInferiorListaColumna($superior, $idioma, $tipo,$columna, $padre){

		

		if($tipo ==1){

			$this->db->select('*');

			$this->db->from('menu_inferior');

			$this->db->where('IdMenuSup',$superior);

			$this->db->where('MenuLanguaje',$idioma);

			$this->db->where('MenuColumna',$columna);

			$this->db->where('MenuPadre',$padre);

			$this->db->where('MenuUrlFriendly !=',$padre);

			$this->db->order_by("MenuPosicion", "asc");	

			$result=$this->db->get();

			$a=$result->result();

			//print_r($this->db->last_query()); 

			return $a;

		}elseif($tipo ==2){

			$this->db->select('*');

		    $this->db->from('menu_inferior');

		    $this->db->where('IdMenuSup',$superior);

		    $this->db->where('MenuLanguaje',$idioma);

		    $this->db->where('MenuColumna',$columna);

		    $this->db->where('MenuPadre',$padre);

		    $this->db->where('MenuUrlFriendly !=',$padre);

		    $this->db->order_by("MenuPosicion", "asc");

		    $result=$this->db->get();

		    $a=$result->result();

			//print_r($this->db->last_query()); 

			return $a;

		}else{

			return null;

		}

		

		

		

	}

	

	function menuInferiorListaColumnaPadre($superior, $idioma, $tipo,$columna){

		    $this->db->select('*');

		    $this->db->from('menu_inferior');

		    $this->db->where('IdMenuSup',$superior);

		    $this->db->where('MenuLanguaje',$idioma);

		    $this->db->where('MenuColumna',$columna);

		    $this->db->where('MenuCabezera','1');

		    $this->db->order_by("MenuPosicion", "asc");

		    $result=$this->db->get();

		    //print_r($this->db->last_query()); 

		return $result->result();

	}

	

	function idiomasLista(){

		$result=$this->db->get('idiomas');

		return $result->result();

	}

	

	function idiomasListaActivos($id){

		$this->db->select('*');

        $this->db->from('idiomas');

        $this->db->where('IdiomaActivo =', '1');

        $this->db->where('IdiomaId !=',$id);

		$query = $this->db->get();

		return $query->result();

	}

	

	function idiomasSeleccionado($id){

		$this->db->select('*');

        $this->db->from('idiomas');

        $this->db->where('IdiomaActivo =', '1');

        $this->db->where('IdiomaId =', $id);

		$query = $this->db->get();

		return $query->result();

	}

	

	function traerRegistrosActivos($id2){

		$this->db->select('*');

        $this->db->from('menu_inferior');

        $this->db->where('MenuSupIdTxt =', $id2);

		$query = $this->db->get();

		//$result = ($query->num_rows() > 0)?$query->result_array():FALSE;

		return $query->result();

	}
	
	function leerRegistro($id2){

		$this->db->select('*');
        $this->db->from('menu_inferior');
        $this->db->where('MenuId =', $id2);
		$query = $this->db->get();
		//$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		return $query->result();

	}

	function traerRegistros2($id2){

		$this->db->select('*');
        $this->db->from('menu_inferior');
        $this->db->where('MenuId =', $id2);
		$query = $this->db->get();
		//$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		return $query->result();

	}

	public function traerRegistros($params = array()){

        $this->db->select('*');

        $this->db->from('menu_inferior');

        

        if(array_key_exists("conditions", $params)){

            foreach($params['conditions'] as $key => $val){

                $this->db->where($key, $val);

            }

        }

        

        if(!empty($params['searchKeyword'])){

            $search = $params['searchKeyword'];

            $likeArr = array('MenuTitulo' => $search, 'IdMenuSup' => $search);

            $this->db->or_like($likeArr);

        }

        

        if(!empty($params['searchLanguage'])){

            $search = $params['searchLanguage'];

      

            $this->db->where('MenuLanguaje', $search);

        }

        

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){

            $result = $this->db->count_all_results();

        }else{

            if(array_key_exists("id", $params)){

                $this->db->where('MenuSupId', $params['id']);

                $query = $this->db->get();

                $result = $query->row_array();

            }else{

            	$this->db->order_by('MenuLanguaje', 'asc');

                $this->db->order_by('MenuPosicion', 'asc');

                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){

                    $this->db->limit($params['limit'],$params['start']);

                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){

                    $this->db->limit($params['limit']);

                }

                

                $query = $this->db->get();
//print_r($this->db->last_query()); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

            }

        }        

        // Return fetched data

        return $result;

	} 

		

	function insert($memData){

		$result=$this->db->insert('menu_inferior',$memData);

		return $result;

	}

	

	function insert_idioma($memData){

		$result=$this->db->insert('menu_superior',$memData);

		return $result;

	}

		

	function update($memData,$id){			

	//	$this->db->set('MenuSupIdTxt', $memData['MenuSupIdTxt']);
/*		$this->db->set('MenuTitulo', $memData['MenuTitulo']);
		$this->db->where('MenuId', $id);
		$result=$this->db->update('menu_inferior');
		return $result;	*/
		if(!empty($memData) && !empty($id)){
            // Add modified date if not included
            
            // Update member data
            $update = $this->db->update($this->table3, $memData, array('MenuId' => $id));
          //  print_r($this->db->last_query());
            // Return the status
            return $update?true:false;
        }
        return false;

	}

	function delete($id){

		$IdiomaId=$this->input->get('id');

		$this->db->where('MenuId', $id);

		$result=$this->db->delete('menu_inferior');

		return $result;

	}	

	

	

	function cambiar_posicion($a,$a1,$b,$b1){

		$this->db->set('MenuUbica', $a1);

		$this->db->where('MenuSupId', $a);

		$this->db->update('menu_superior');

		

		$this->db->set('MenuUbica', $b1);

		$this->db->where('MenuSupId', $b);

		$result=$this->db->update('menu_superior');

		return $result;

	}	

	

	function menu_existe($a,$b,$c){

		$result = 0;

		$this->db->select('MenuSupTitulo');

        $this->db->from('menu_superior');

        $this->db->where('MenuSupLanguaje =', $a);

        $this->db->where('MenuSupIdTxt =',$c);

		$query = $this->db->get();

		echo $query->num_rows();

		//print_r($this->db->last_query());

		//$result = ($query->num_rows() > 0)?$query->row():FALSE;

      //  $ret = $query->row();

        return $result;



	}

	

	function idiomasActivos(){

		$result = 0;

		$this->db->select('IdiomaId');

        $this->db->from('idiomas');

        $this->db->where('IdiomaActivo = 1');

		$query = $this->db->get();

        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        return $result;

	}	

}