<?php
class  Contenidos_model extends CI_Model{
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	    $this->table = 'contenidos';
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
	
	
	function traerContenidosIndustria($idioma){
		$this->db->select('*');
		$this->db->from('contenidos');
		$this->db->where('idioma =', $idioma);
		$this->db->where('seccion =', 'industria');
		$aResult = $this->db->get();
		if(!$aResult->num_rows() == 1)
	    {
	        return false;
	    }
       
        return $aResult->result_array();
	}
	
	function traerSecciones($id){
		$this->db->select('*');
		$this->db->from('contenidos_secciones');
		$this->db->where('idioma =', $id);
		$this->db->where('activo =', '1');
		//$result=$this->db->get('contenidos_secciones');
		$aResult = $this->db->get();
		if(!$aResult->num_rows() == 1)
	    {
	        return false;
	    }
       
        return $aResult->result_array();
	}
	
	function leerContenidosPorSeccion($id,$id2,$idioma){
		$valor ='';
		$this->db->select('id_txt');
		$this->db->from('contenidos');
		$this->db->where('seccion =', $id);
		$this->db->where('id_txt =', $id2);
		$this->db->where('idioma =', $idioma);
			$aResult = $this->db->get();
			//print_r($this->db->last_query());   
			if(!$aResult->num_rows() == 1)
		    {
		        return false;
		    }
             foreach ($aResult ->result() as $row)
			{
			    $valor = $row->id_txt;

			} 
			      
	        return $valor;
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
	
	public function traerRegistro($id){
		$sql = "SELECT * FROM contenidos WHERE id ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
	    
		if (isset($row))
		{
		     return $row;
		}else{
			 return false;  
		}
	    
	}
	
	function traerPersonas(){
		$aResult = $this->db->get('personas');
		if(!$aResult->num_rows() == 1)
	    {
	        return false;
	    }
       
        return $aResult->result_array();
	}
	public function traerRegistro2($id){	
		$sql = "SELECT * FROM contenidos WHERE id ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
	    
		if (isset($row))
		{
		     return $row;
		}else{
			 return false;  
		}
	    
	}
	
	public function traerPersonasDelContenido($id){
		$nombre ='';  
		$sql = "SELECT personas FROM contenidos WHERE id ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        $nombre = $row->personas;
		}
	    return $nombre;  
	} 
	
	
	public function traerRegistros($params = array()){ // paginador
        $this->db->select('a.*, b.*');
        $this->db->from('contenidos a');
        $this->db->join('idiomas b', 'a.idioma = b.IdiomaId');
       // print_r($this->db->last_query()); 
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        } 
        
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            
            $search2 = str_replace(' ', '_',$search );
			//$search = str_replace('_', ' ',$search );
            $likeArr = array('titulo' => $search, 'seccion' => $search2, 'IdiomaTitulo'=>$search);
           // $likeArr = array('IdiomaTitulo' => $search, 'IdiomaSigla' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('idioma', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('idioma', 'asc');
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
		$result=$this->db->insert('contenidos',$memData);
		return $result;
	}
	function update($memData,$id){
		
		
			$this->db->set('id_txt', $memData['id_txt']);
			$this->db->set('idioma', $memData['idioma']);
			$this->db->set('titulo', $memData['titulo']);		
			$this->db->set('subtitulo', $memData['subtitulo']);
			$this->db->set('bgcolor', $memData['bgcolor']);
			$this->db->set('banner_bg', $memData['banner_bg']);
			$this->db->set('contenido', $memData['contenido']);
			$this->db->set('seccion', $memData['seccion']);
			$this->db->set('activo', $memData['activo']);
			$this->db->set('f_contacto', $memData['f_contacto']);
			$this->db->set('f_cotizacion', $memData['f_cotizacion']);
			$this->db->set('f_brochure', $memData['f_brochure']);
			$this->db->set('personas', $memData['personas']);
		
		
		$this->db->where('id', $id);
		$result=$this->db->update('contenidos');
		return $result;	
	}
	function delete($id){
		$IdiomaId=$this->input->get('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('contenidos');
		return $result;
	}	
}