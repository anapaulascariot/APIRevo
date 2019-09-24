<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_model extends CI_Model
{

    /*function login($username, $password)
    {
        return $username == 'pmk' && $password == 'lab';
    }
    */
    function check_database($username, $password) {
     //Field validation succeeded.  Validate against database
     //query the database
     $result = $this->login->login($username, $password);
     if($result) {
         $sess_array = array();
         foreach($result as $row) {
             //create the session
             $sess_array = array('studentid' => $row->studentid);
             //set session with value from database
             $this->session->set_userdata('logged_in', $sess_array);
             }
      return TRUE;
      } else {
          //if form validate false
          $this->form_validation->set_message('check_database', 'Invalid username or password');
          return FALSE;
      }
  	}

}
?>