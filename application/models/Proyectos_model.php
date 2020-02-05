<?php
class Proyectos_model extends CI_Model{
	private $contactos = 'proyectos';
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	    $this->table = 'proyectos';
     } 
     
    public function get_status_proyectos(){
		$this->db->select('*');
		$aResult = $this->db->get('proyectos_status');
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		return $aResult->result_array(); 
	} 
	
	public function get_responsables(){
		$this->db->select('*');
		$aResult = $this->db->get('personas');
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		return $aResult->result_array(); 
	} 

	public function get_participantes_proyecto($participantes){
		$sql = "SELECT* FROM usuarios
		        WHERE UsuId IN ('".$participantes."')";
	    $query = $this->db->query($sql);
	    $rows =$query->result_array();
		if (isset($rows))
		{
		        return $rows; 
		}
	    return false;  
	} 

	public function get_participantes_proyecto2($participantes){
		$this->db->select('*');
		$this->db->where_in('UsuId', $participantes);
		$aResult = $this->db->get('usuarios');
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		print_r($this->db->last_query());
		return $aResult->result_array(); 
	} 
    
    public function get_responsables_proyectos(){
		$this->db->select('*');
		$aResult = $this->db->get('proyectos_status');
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		return $aResult->result_array(); 
	} 

	function get_proyecto($id){
        $sql = "SELECT proyectos.*, proyecto_tipo.tipo_proyecto FROM proyectos 
		        INNER JOIN proyecto_tipo ON proyectos.proyecto_tipo = proyecto_tipo.id WHERE proyectos.id ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        return $row; 
		}
	    return false; 
	}

	function traerNombreUsuario($id){
		$sql = "SELECT * FROM usuarios 
		        WHERE UsuId ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        return $row; 
		}
	    return false; 
	}

	function fechaTexto($fecha){
		date_default_timezone_set('America/Hermosillo');
		$fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
	    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		//return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
		return $numeroDia." de ".$nombreMes." de ".$anio;

	}
	/*
	public function get_proyecto($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$aResult = $this->db->get('proyectos');
		if (!$aResult->num_rows() == 1) {
			return false;
		}
        //print_r($this->db->last_query());
		return $aResult->result_array(); 
	} 
    */

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
		$query = "SELECT * FROM personas WHERE PersonaId IN (".$personas.")";
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

	function insert($data){
		$result=$this->db->insert($this->table,$data);
		return $result;
	}

	function update($data,$id){
		if(!empty($data) && !empty($id)){
            // Update member data
            $update = $this->db->update($this->table, $data, array('id' => $id));            
            return $update?true:false;
        }
        return false;	
	}

	function delete($id){		
		$this->db->where('id', $id);
		$result=$this->db->delete($this->table);
		return $result;
	}	



/*
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
	*/
	
	function get_records() {
        $where='';
        if($this->input->get_post('status')!=0){
        if($where==''){
			$where.=' WHERE status='.$this->input->get_post('status');
		}else{
			$where.=' AND status='.$this->input->get_post('status');
        }
        }
		//columnas
		$columns = array(
			'id',
            'proyecto',
            'proyecto',
            'f_inicio',
            'f_fin',
            'proyecto',
            'IF(status=1, "<span class=\"badge badge-success\">ACTIVO</span>", "<span class=\"badge badge-danger\">INACTIVO</span>")'
            );
		//columna index
		$indexColumn = 'id';
		//total records
		$sqlCount = 'SELECT COUNT(' . $indexColumn . ') AS row_count FROM ' . $this->contactos .' '.$where;
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
        if($this->input->get_post('status')!=0){
			if($where==''){
				$where.=' WHERE status='.$this->input->get_post('status');
			}else{
				$where.=' AND status='.$this->input->get_post('status');
			}
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
			array_push($row, '<button class=\'view btn btn-success btn-sm font-size-10\' data-id='.$cols[$indexColumn].'><i class=\'fa fa-search\'></i></button>&nbsp;&nbsp;<button class=\'edit btn btn-success btn-sm font-size-10\' data-id='.$cols[$indexColumn].'><i class=\'fa fa-pencil\'></i></button>&nbsp;&nbsp;<button class=\'delete btn btn-danger btn-sm font-size-10\' id='. $cols[$indexColumn] .'><i class=\'fa fa-remove\'></i></button>');
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
}