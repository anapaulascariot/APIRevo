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

    	$this->db->select('*');
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
}   	


?>

