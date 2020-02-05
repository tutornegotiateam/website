<?php
class Banners_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	    $this->table = 'usuarios';
	}  
  
	public function traerBanner($id){
		$nombre ='';  
		$sql = "SELECT * FROM banners WHERE id ='".$id."'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        $nombre = $row->UsuNom." ".$row->UsuApePat." ".$row->UsuApeMat;
		}
	    return $nombre; 
	    
	}
	
	public function traerBanners(){   
	    $this->db->select('*');
		$aResult = $this->db->get('banners');
		if (!$aResult->num_rows() == 1) {
			return false;
				}

		return $aResult->result_array(); 
	}  
	
	public function traerBannersActivos(){  
	    $this->db->where('status','1');
	    $this->db->select('*');
		$aResult = $this->db->get('banners');
		if (!$aResult->num_rows() == 1) {
			return false;
				}

		return $aResult->result_array(); 
	} 
	
	
	public function updateBanners($data,$id){  
	   
	  $this->db->where('id', $id);
      $result = $this->db->update('banners', $data); 
     // print_r($this->db->last_query());
      return $result;
      
	} 
}