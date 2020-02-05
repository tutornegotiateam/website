<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa_Model extends CI_Model {
	
	function update($data,$id){
	
		if(!empty($data) && !empty($id)){
                     // Update member data
            $update = $this->db->update('empresa', $data, array('id' => $id));
            // Return the status
            return $update?true:false;
        }
        return false;	
	}
	
	
	
	//consultas
	function ver_registro($id){
        $sql = "SELECT * FROM empresa WHERE id ='1'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        return json_encode($row); 
		}
	    return false; 
	}
	
	function traer_registro($id){
        $sql = "SELECT * FROM empresa WHERE id ='1'";
	    $query = $this->db->query($sql);
	    $row = $query->row();
		if (isset($row))
		{
		        return $row; 
		}
	    return false; 
	}
	
	
}