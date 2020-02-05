<?php  
class Login_model extends CI_Model {  
function __construct()  
{  
    parent::__construct();  
    $this->load->database();  
}  
  
public function islogin($data){  
    $query = $this->db->get_where('usuarios',array('UsuUser'=>$data['username'])); 
    $row = $query->row();
   // print_r($row);
    if (empty($row)) {
        return 0;		
	}else{
		
		// if($row->UsuId>0){
		$pws =sha1($row->UsuSalt.$data['password']);
        // echo $row['UsuSalt'];
        $query=$this->db->get_where('usuarios',array('UsuUser'=>$data['username'],'UsuPass'=>$pws));  
        return $query->num_rows(); 
	} 
}  



public function change_pws($data, $id){  
    
     if(!empty($data) && !empty($id)){
                 // Update member data
         $update = $this->db->update('usuarios', $data, array('UsuUser' => $id));
        
        // Return the status
        if ($this->db->affected_rows() == '1') {
        	echo 1;
	        return 1;
		} else {
			echo 0;
			return 0;		
		}
        
         //return $update?true:false;
     }
     //return false;  
}


public function registrar_acceso($data, $id){  
    
     if(!empty($data) && !empty($id)){
                 // Update member data
         $update = $this->db->update('usuarios', $data, array('UsuUser' => $id));
        
        // Return the status
         return $update?true:false;
     }
     return false;  
} 

}