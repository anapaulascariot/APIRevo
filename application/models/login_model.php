<?php  
 
 class Login_model extends CI_model{

public function log_in_correctly($object){
    $this->db->insert('usuario', $object);
    return 0;

}


/*
class Login_model extends CI_Model {  
  
    public function log_in_correctly() { 
        $bandera= false;
        $usuario=$this->input->post('username');//por validar
        $contra=$this->input->post('password');
    	    $this->db->where('nombre',$usuario );  

    	    $this->db->where('password', $contra);  
        	$query = $this->db->get('usuario');  
  
        if ($query->num_rows() == 1)  
        {  
            $bandera = true;  
        } else {  
            $bandera = false;  
        }  

        return $bandera;
  
    }  */
  
      
}  
?>  