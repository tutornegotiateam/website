<?php
class  Idiomas_model extends CI_Model{
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	    $this->table = 'idiomas';
	} 
	function idiomasLista(){
		$result=$this->db->get('idiomas');
		return$result->result();
	}
	
	function idiomasListaActivos($id){
		$this->db->select('*');
        $this->db->from('idiomas');
        $this->db->where('IdiomaActivo =', '1');
        $this->db->where('IdiomaId !=',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function idiomasListaActivosForms(){
		$this->db->select('*');
        $this->db->from('idiomas');
        $this->db->where('IdiomaActivo =', '1');
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
	
	public function traerRegistros($params = array()){
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
	function update($memData,$id){
		
		if($memData['IdiomaBandera']==''){
			$this->db->set('IdiomaTitulo', $memData['IdiomaTitulo']);
			$this->db->set('IdiomaSigla', $memData['IdiomaSigla']);
			$this->db->set('IdiomaActivo', $memData['IdiomaActivo']);
		}else{
			$this->db->set('IdiomaTitulo', $memData['IdiomaTitulo']);
			$this->db->set('IdiomaSigla', $memData['IdiomaSigla']);
			$this->db->set('IdiomaBandera', $memData['IdiomaBandera']);
			$this->db->set('IdiomaActivo', $memData['IdiomaActivo']);
		}
		
		$this->db->where('IdiomaId', $id);
		$result=$this->db->update('idiomas');
		return $result;	
	}
	function delete($id){
		$IdiomaId=$this->input->get('IdiomaId');
		$this->db->where('IdiomaId', $id);
		$result=$this->db->delete('idiomas');
		return $result;
	}	
}