<?php

class  Personas_model extends CI_Model{

	private $contactos = 'personas';

	function __construct()  

	{  

	    parent::__construct();  

	    $this->load->database();  

	    $this->table = 'personas';

	    

	} 

	function contenidosLista(){

		$result=$this->db->get('contenidos');

		$aResult = $this->db->get();

		if(!$aResult->num_rows() == 1)

	    {

	        return false;

	    }

       

        return $aResult->result_array();

	}

	

	function traerPersonas(){

		$aResult = $this->db->get('personas');

		if(!$aResult->num_rows() == 1)

	    {

	        return false;

	    }

       

        return $aResult->result_array();

	}

	

	function traerPersonasPorContenido($id){

		//echo $id;

		$this->db->select('*');

		$this->db->from('personas');

		$this->db->where_in('PersonaId', $id);

		//print_r($this->db->last_query());  

			$aResult = $this->db->get();

		if(!$aResult->num_rows() == 1)

	    {

	        return false;

	    }

       

        return $aResult->result_array();

	}

	

	function traerPersonasPorContenidoTb($id){

		

		if ($id!='') {

			$sql = 'SELECT PersonaId, PersonaNom, PersonaApePat, PersonaApeMat FROM personas WHERE

		PersonaId IN ('.$id.')';

			$query = $this->db->query($sql);

			if (!$query->num_rows() == 1) {

				return false;

					}

			return $query->result();

		}else{

			return false;

			

		}

	}

	

	

	function traerDatosPersona($id){

		$valor ='';

		$this->db->select('*');

		$this->db->from('personas');

		$this->db->where('PersonaId =', $id);

			$aResult = $this->db->get();

		//	print_r($this->db->last_query());   

			if(!$aResult->num_rows() == 1)

		    {

		        return false;

		    }

			$ret = $aResult->row();

			return $ret;

	}

	

	public function traerPersona($id){

		$this->db->select('*');

		$this->db->where('PersonaId',$id);

		$aResult = $this->db->get('personas');

		if (!$aResult->num_rows() == 1) {

			return false;

		}

        //print_r($this->db->last_query());

		return $aResult->result_array(); 

	} 

	

	

	function traerPersonasContenidos($personas){

		if($personas==''){

		  $personas=0;	

		}

		$query = "SELECT * FROM personas WHERE PersonaId IN (".$personas.") ORDER BY PersonaOrden";

        $aResult = $this->db->query($query);



			if(!$aResult->num_rows() == 1)

		    {

		        return false;

		    }

   			//$ret = $aResult->row();

			//return $ret;

			return $aResult->result_array();

	}

	

	function traerTemasPersona($temas,$idioma){

		if($temas==''){

		  $temas=0;	

		}

		

		$query = "SELECT * FROM menu_inferior WHERE MenuUrlFriendly IN (".$temas.") AND MenuLanguaje='".$idioma."'";

        $aResult = $this->db->query($query);

        //print_r($this->db->last_query());

			if(!$aResult->num_rows() == 1)

		    {

		        return false;

		    }

   			//$ret = $aResult->row();

			return $aResult->row();

			//return $aResult->result_array();

	}

	

	

	function leerContenido($id,$idioma){

		$this->db->select('a.*, b.*');

        $this->db->from('contenidos a');

        $this->db->join('contenidos_secciones b', 'a.seccion = b.seccion_id');

        $this->db->where('a.id_txt =', $id);

     /*   $this->db->where('a.idioma =', $idioma);*/

		$aResult = $this->db->get();

		if(!$aResult->num_rows() == 1)

	    {

	        return false;

	    }



        return $aResult->result_array();

	}

	

	public function traerRegistros($params = array()){ // paginador

        $this->db->select('*');

        $this->db->from($this->table);

        

        if(array_key_exists("conditions", $params)){

            foreach($params['conditions'] as $key => $val){

                $this->db->where($key, $val);

            }

        }

        

        if(!empty($params['searchKeyword'])){

            $search = $params['searchKeyword'];

            $likeArr = array('IdiomaTitulo' => $search, 'IdiomaSigla' => $search);

            $likeArr = array('IdiomaTitulo' => $search, 'IdiomaSigla' => $search);

            $this->db->or_like($likeArr);

        }

        

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){

            $result = $this->db->count_all_results();

        }else{

            if(array_key_exists("id", $params)){

                $this->db->where('IdiomaId', $params['id']);

                $query = $this->db->get();

                $result = $query->row_array();

            }else{

                $this->db->order_by('IdiomaTitulo', 'asc');

                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){

                    $this->db->limit($params['limit'],$params['start']);

                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){

                    $this->db->limit($params['limit']);

                }

                

                $query = $this->db->get();

                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

            }

        }        

        // Return fetched data

        return $result;

	} 

		

	function insert($memData){

		$result=$this->db->insert('idiomas',$memData);

		return $result;

	}

	function update($data,$data2,$id,$id2){

	

		if(!empty($data) && !empty($id)){

                     // Update member data

            $update = $this->db->update('personas', $data, array('PersonaId' => $id));

            $update2 = $this->db->update('usuarios', $data2, array('UsuUser' => $id2));

            // Return the status

            return $update?true:false;

        }

        return false;	

	}

	

	function delete($id){

		$IdiomaId=$this->input->get('IdiomaId');

		$this->db->where('IdiomaId', $id);

		$result=$this->db->delete('idiomas');

		return $result;

	}	

	

	function get_records() {		

		//columnas

		$columns = array(

            'PersonaId',

            'PersonaNom',

            'PersonaApePat',

            'PersonaApeMat',

			'PersonaEmail',
			
			'PersonaOrden',

            'IF(PersonaStatus=1, "<span class=\"badge badge-success\">ACTIVO</span>", "<span class=\"badge badge-danger\">INACTIVO</span>")'

            );

		

		//columna index

		$indexColumn = 'PersonaId';

		

		//total records

		$sqlCount = 'SELECT COUNT(' . $indexColumn . ') AS row_count FROM ' . $this->contactos .' WHERE PersonaTipo=1';

		$totalRecords = $this->db->query($sqlCount)->row()->row_count;

		

		//pagination

		$limit = '';

		$displayStart = $this->input->get_post('start', true);

		$displayLength = $this->input->get_post('length', true);

		

		if (isset($displayStart) && $displayLength != '-1') {

            $limit = ' LIMIT ' . intval($displayStart) . ', ' . intval($displayLength);

        }

		

		$uri_string = $_SERVER['QUERY_STRING'];

        $uri_string = preg_replace("/%5B/", '[', $uri_string);

        $uri_string = preg_replace("/%5D/", ']', $uri_string);

        $get_param_array = explode('&', $uri_string);

        $arr = array();

        foreach ($get_param_array as $value) {

            $v = $value;

            $explode = explode('=', $v);

            $arr[$explode[0]] = $explode[1];

        }

		

		$index_of_columns = strpos($uri_string, 'columns', 1);

        $index_of_start = strpos($uri_string, 'start');

        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));

        $columns_array = explode('&', $uri_columns);

        $arr_columns = array();

		

		foreach ($columns_array as $value) {

            $v = $value;

            $explode = explode('=', $v);

            if (count($explode) == 2) {

                $arr_columns[$explode[0]] = $explode[1];

            } else {

                $arr_columns[$explode[0]] = '';

            }

        }

		

		//sort order

		$order = ' ORDER BY ';

        $orderIndex = $arr['order[0][column]'];

        $orderDir = $arr['order[0][dir]'];

        $bSortable_ = $arr_columns['columns[' . $orderIndex . '][orderable]'];

        if ($bSortable_ == 'true') {

            $order .= $columns[$orderIndex] . ($orderDir === 'asc' ? ' asc' : ' desc');

        }

		

		//filter

		$where = '';

        $searchVal = $arr['search[value]'];

        if (isset($searchVal) && $searchVal != '') {

            $where = " WHERE (";

            for ($i = 0; $i < count($columns); $i++) {

                $where .= $columns[$i] . " LIKE '%" . $this->db->escape_like_str($searchVal) . "%' OR ";

            }

            $where = substr_replace($where, "", -3);

            $where .= ')';

        }

		

		//individual column filtering

        $searchReg = $arr['search[regex]'];

        for ($i = 0; $i < count($columns); $i++) {

            $searchable = $arr['columns[' . $i . '][searchable]'];

            if (isset($searchable) && $searchable == 'true' && $searchReg != 'false') {

                $search_val = $arr['columns[' . $i . '][search][value]'];

                if ($where == '') {

                    $where = ' WHERE ';

                } else {

                    $where .= ' AND ';

                }

                $where .= $columns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";

            }

        }

        if($where==''){

			$where.=' WHERE PersonaTipo=1';

		}else{

			$where.=' AND PersonaTipo=1';

		}

		

		//final records

		$sql = 'SELECT SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $columns)) . ' FROM ' . $this->contactos . $where . $order . $limit;

        $result = $this->db->query($sql);

		

		//total rows

		

		$sql = "SELECT FOUND_ROWS() AS length_count";

        $totalFilteredRows = $this->db->query($sql)->row()->length_count;

		

		//display structure

		$echo = $this->input->get_post('draw', true);

        $output = array(

            "draw" => intval($echo),

            "recordsTotal" => $totalRecords,

            "recordsFiltered" => $totalFilteredRows,

            "data" => array()

        );

		

		//put into 'data' array

		foreach ($result->result_array() as $cols) {

            $row = array();

            foreach ($columns as $col) {

                $row[] = $cols[$col];

            }

			array_push($row, '<button class=\'edit btn btn-success btn-sm\' data-id='.$cols[$indexColumn].'><i class=\'fa fa-pencil\'></i></button>&nbsp;&nbsp;<button class=\'delete btn btn-danger btn-sm\' id='. $cols[$indexColumn] .'><i class=\'fa fa-remove\'></i></button>');

            $output['data'][] = $row;

        }

		

		return $output;

	}

	

	function ver_registro($id){

        $sql = "SELECT * FROM personas WHERE PersonaId ='".$id."'";

	    $query = $this->db->query($sql);

	    $row = $query->row();

		if (isset($row))

		{

		        return json_encode($row); 

		}

	    return false; 

	}

	function traerPersonasDirectivos(){
		$sql = "SELECT * FROM personas WHERE PersonaTipo ='1' AND PersonaOrden>0 ORDER BY PersonaOrden";
		$query = $this->db->query($sql);
		$rows =$query->result_array();
	//	print_r($this->db->last_query());

		if (isset($rows))
		{
				return $rows; 
		}
		return false;  
	}

	

	

	

}