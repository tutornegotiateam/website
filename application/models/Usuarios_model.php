<?php  class Usuarios_model extends CI_Model {  	



function __construct(){  	    

      parent::__construct();  	    

      $this->load->database(); 	    

      $this->table = 'usuarios';	

}

function get_records() {	

//columnas		

$columns = array('usuario_id','user_usu','user_nombre','user_departamento','user_email','user_fecha_creacion','IF(user_activo=1, "<span class=\"badge badge-success\">ACTIVO</span>", "<span class=\"badge badge-danger\">INACTIVO</span>")');	

//columna index		

$indexColumn = 'usuario_id'; 				

//total records		

$sqlCount = 'SELECT COUNT(' . $indexColumn . ') AS row_count FROM ' . $this->contactos .' ';		$totalRecords = $this->db->query($sqlCount)->row()->row_count;				

//pagination		

$limit = '';		

$displayStart = $this->input->get_post('start', true);

$displayLength = $this->input->get_post('length', true);

if(isset($displayStart) && $displayLength != '-1') { 

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

		$order = ' ORDER BY ';        $orderIndex = $arr['order[0][column]'];        $orderDir = $arr['order[0][dir]'];        $bSortable_ = $arr_columns['columns[' . $orderIndex . '][orderable]'];        if ($bSortable_ == 'true') {            $order .= $columns[$orderIndex] . ($orderDir === 'asc' ? ' asc' : ' desc');        }				

		//filter		

		$where = '';        $searchVal = $arr['search[value]'];        if (isset($searchVal) && $searchVal != '') {            $where = " WHERE (";            for ($i = 0; $i < count($columns); $i++) {                $where .= $columns[$i] . " LIKE '%" . $this->db->escape_like_str($searchVal) . "%' OR ";            }            $where = substr_replace($where, "", -3);            $where .= ')';        }				

		//individual column filtering 

		       $searchReg = $arr['search[regex]'];        for ($i = 0; $i < count($columns); $i++) {            $searchable = $arr['columns[' . $i . '][searchable]'];            if (isset($searchable) && $searchable == 'true' && $searchReg != 'false') {                $search_val = $arr['columns[' . $i . '][search][value]'];                if ($where == '') {                    $where = ' WHERE ';                } else {                    $where .= ' AND ';                }                $where .= $columns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";            }        }

		       /*        if($where==''){			$where.=' WHERE PersonaTipo=1';		}else{			$where.=' AND PersonaTipo=1';		} */

		       				//final records

$sql = 'SELECT SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $columns)) . ' FROM ' . $this->contactos . $where . $order . $limit;        

$result = $this->db->query($sql);

//total rows



$sql = "SELECT FOUND_ROWS() AS length_count";        

$totalFilteredRows = $this->db->query($sql)->row()->length_count;

				//display structure

						$echo = $this->input->get_post('draw', true);        $output = array(            "draw" => intval($echo),            "recordsTotal" => $totalRecords,            "recordsFiltered" => $totalFilteredRows,            "data" => array()        );				//put into 'data' array

								foreach ($result->result_array() as $cols) {            $row = array();            foreach ($columns as $col) {                $row[] = $cols[$col];            }			array_push($row, '<button class=\'edit btn btn-success btn-sm\' data-id='.$cols[$indexColumn].'><i class=\'fa fa-pencil\'></i></button>&nbsp;&nbsp;<button class=\'delete btn btn-danger btn-sm\' id='. $cols[$indexColumn] .'><i class=\'fa fa-remove\'></i></button>');            $output['data'][] = $row;        }				return $output;	}	public function traerNombreUsuario($id){		$nombre ='';  		$sql = "SELECT UsuNom , UsuApePat, UsuApeMat FROM usuarios WHERE UsuUser ='".$id."'";	    $query = $this->db->query($sql);	    $row = $query->row();		if (isset($row))		{		        $nombre = $row->UsuNom." ".$row->UsuApePat." ".$row->UsuApeMat;		}	    return $nombre;  	} 				public function traerUltimoAcceso($id){		$nombre ='';  		$sql = "SELECT UsuFchUlt FROM usuarios WHERE UsuUser ='".$id."'";	    $query = $this->db->query($sql);	    $row = $query->row();		if (isset($row))		{		        $UsuFchUlt = $row->UsuFchUlt;		}	    return $UsuFchUlt;  	}	public function traerRegistro($id){						$this->db->select('*');		$this->db->where('UsuId',$id);		$aResult = $this->db->get('usuarios');		if (!$aResult->num_rows() == 1) {			return false;		}        

								//print_r($this->db->last_query());

										return $aResult->result_array(); 	} 	public function traerRegistros($params = array()){        $this->db->select('*');        $this->db->from($this->table);                if(array_key_exists("conditions", $params)){            foreach($params['conditions'] as $key => $val){                $this->db->where($key, $val);            }        }                if(!empty($params['searchKeyword'])){            $search = $params['searchKeyword'];            $likeArr = array('UsuNom' => $search, 'UsuApePat' => $search,'UsuApeMat' => $search, 'UsuUser' => $search);            $this->db->or_like($likeArr);        }                if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){            $result = $this->db->count_all_results();        }else{            if(array_key_exists("id", $params)){                $this->db->where('UsuId', $params['id']);                $query = $this->db->get();                $result = $query->row_array();            }else{                $this->db->order_by('UsuNom', 'asc');                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){                    $this->db->limit($params['limit'],$params['start']);                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){                    $this->db->limit($params['limit']);                }                                $query = $this->db->get();                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;            }        }                // Return fetched data 

										       return $result;	} 		

 /*     

 * Insert members data into the database     

 * @param $data data to be insert based on the passed parameters     */  

   

 public function insert($data = array()) {        if(!empty($data)){                       

  // Insert member data          

  // echo $data;            

   $insert = $this->db->insert($this->table, $data);                       

    // Return the status 

               return $insert?$this->db->insert_id():false;        }       

                return false;    

}        

                

public function insert2($data = array()) {        

if(!empty($data)){ 

// Insert member data 

// echo $data;            

$insert = $this->db->insert('personas', $data); 

// Return the status

            return $insert?$this->db->insert_id():false;

 }       

 return false; 

 }           

  /*     

  * Update member data into the database     

  * @param $data array to be update based on the passed parameters    

   * @param $id num filter data     */    

 public function update($data, $id) {        

   if(!empty($data) && !empty($id)){                    

    // Update member data

    $update = $this->db->update($this->table, $data, array('UsuId' => $id));

    // Return the status 

    return $update?true:false;        

    }        

    return false;    

}        

public function update2($data, $id) {       

 if(!empty($data) && !empty($id)){ 

   // Update member data

     $update = $this->db->update('personas', $data, array('PersonaUsu' => $id));

     // Return the status            

     return $update?true:false;        

     }       

     return false;    }    

     /*    

     * Delete member data from the database     

     * @param num filter data based on the passed parameter     */    

public function delete($id, $user){        

// Delete member data        

$delete = $this->db->delete($this->table, array('UsuId' => $id));        

$delete2 = $this->db->delete('personas', array('PersonaUsu' => $user));        

// Return the status        

return $delete?true:false;  

}        

public function existe_usuario($id){		

$nombre ='';  		

$rowcount = ''; 

$result=''; 		

$sql = "SELECT UsuUser FROM usuarios WHERE UsuUser ='".$id."'";	    

$query = $this->db->query($sql);	    

$rowcount = $query->num_rows();		

if($rowcount>0){		    

   $result= "<span style='color:brown;'><b>".$id."</b> no esta disponible!!!</span>";		   

   }else{		    

   $result= "<span style='color:green;'><b>".$id."</b> esta disponible</span>"; } 

    echo $result;	

}	

	

public function traerNomUsu($id){		

	$nombre ='';  		

	$sql = "SELECT UsuUser FROM usuarios WHERE UsuId ='".$id."'";	    

	$query = $this->db->query($sql);	    

	$row = $query->row();		

	if (isset($row)){		        

	$user = $row->UsuUser;		

	}	    

	return $user;  

}


public function traerUsuarioid($id){		
	$user ='';  
	$sql = "SELECT UsuId FROM usuarios WHERE UsuUser='".$id."'";	    
	$query = $this->db->query($sql);	    
	$row = $query->row();		
	if (isset($row)){		        
	$user = $row->UsuId;		
	}	    
	return $user;  
}



}