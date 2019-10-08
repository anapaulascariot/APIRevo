<?php  
  
class Login_model extends CI_Model {  
  
    public function log_in_correctly() { 
        $bandera= false;
    	    $this->db->where('nombre', $this->input->post('username'));  

    	    $this->db->where('password', $this->input->post('password'));  
        	$query = $this->db->get('usuario');  
  
        if ($query->num_rows() == 1)  
        {  
            $bandera = true;  
        } else {  
            $bandera = false;  
        }  

        return $bandera;
  
    }  
  
      
}  
?>  