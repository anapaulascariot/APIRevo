<?php
class PreguntasModel extends CI_Model{


   public function __construct()
   {
       parent::__construct();
       $this->db = $this->load->database('default', TRUE);
   }


    public function get_preguntas(){

        if(!empty($this->input->get("search"))){

          $this->db->like('pregunta', $this->input->get("search"));

          //$this->db->or_like('nombre_ordenante', $this->input->get("search")); 

        }

        $query = $this->db->get("preguntas");

        return $query->result();

    }


    //Para encontrar las respuestas a cada pregunta
    public function find_respuesta($id)

    	{

    	//$this->db->select('SELECT * from pregunta_respuesta where idpregunta='.$id, FALSE);
    	
        //$query=$this->db->get_where('pregunta_respuesta', array('idpregunta' => $id))->row();

    	$this->db->select('idrespuesta, respuesta');
    	//$this->db->from('pregunta_respuesta');
    	$this->db->where('idpregunta='.$id);	
    	$query= $this->db->get("respuestas");	
        return $query->result();
    	}



       public function find_pregunta($id)

    	{

    	//$this->db->select('SELECT * from pregunta_respuesta where idpregunta='.$id, FALSE);
    	
      return $this->db->get_where('preguntas', array('idpregunta' => $id))->row();
    	}

      public function get_pregunta($id){
        $this->db->select('idpregunta, pregunta');
        //$this->db->from('pregunta_respuesta');
        $this->db->where('idpregunta='.$id);  
        $query= $this->db->get("preguntas"); 
        return $query->result();
      }

      public function update_respuesta()//solo toma el valor post, que es la id de la respuesta y le agrega un +1 al voto

      {

       $datos= $this->input->post('gridRadios');
        
            
            $this->db->set('voto', 'voto+1', FALSE);
            $this->db->where('idrespuesta', $datos);
            return $this->db->update('respuestas'); // //UPDATE respuestas SET respuestas.voto = respuestas.voto + 1 WHERE idrespuesta = 1         
      }

      public function insertar_usuario()
    {
        $datos= array(
        'nombre' =>$this->input->post('email'),
        'password' =>$this->input->post('password')
      );//fin del array

         //$this->db->set($datos)->get_compiled_insert('tablatest1');
        return $this->db->insert('usuario', $datos);
    }
}   	


?>

