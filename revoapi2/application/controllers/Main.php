<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Main extends CI_Controller {  

   public $preguntas;


    public function __construct() {

      parent::__construct(); 


      //$this->load->library('form_validation');

      $this->load->library('session');

      $this->load->model('PreguntasModel');


      $this->preguntas = new PreguntasModel;

   }
  
    public function index()  
    {  
        $this->login();  
    }  
  
    public function login()  
    {  
        $this->load->view('login_view');  
    }  
  
    public function signin()  
    {  
        $this->load->view('signin');  
    }  
  
    public function data()  
    {  
        if ($this->session->userdata('currently_logged_in'))   
        {
            $data['data'] = $this->preguntas->get_preguntas();  
            $this->load->view('data', $data);  
        } else {  
            redirect('Main/invalid');  
        }  
    }  
  
    public function invalid()  
    {  
        $this->load->view('invalid');  
    }  
  
    public function login_action()  
    {  
        $this->load->helper('security');  
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  

        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
  
        if ($this->form_validation->run())   
        {  
            $data = array(  
                'username' => $this->input->post('username'),  
                'currently_logged_in' => 1  
                );    
                    $this->session->set_userdata($data);  
                redirect('Main/data');  
        }   
        else {  
            $this->load->view('login_view');  
        }  
    }  
  
    public function signin_validation()  
    {  
        $this->load->library('form_validation');  
  
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[usuario.nombre]');  
  
        $this->form_validation->set_rules('password', 'Password', 'required|trim');  
  
        $this->form_validation->set_rules('cpassword', 'Confirme su Password', 'required|trim|matches[password]');  
  
        $this->form_validation->set_message('is_unique', 'El usuario ya existe');  
  
    if ($this->form_validation->run())  
        {  
            echo "Bienvenido. Ha ingresado con éxito";  
         }   
            else {  
              
            $this->load->view('signin');  
        }  
    }  
  
    public function validation()  
    {  
        $this->load->model('login_model');  
  
        if ($this->login_model->log_in_correctly())  
        {  
  
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Usuario o contraseña incorrectos');  

             return false;  
        }  
    }  
  
    public function logout()  
    {  
        $this->session->sess_destroy();  
        redirect('Main/login');  
    }  

     public function formulario()  
    {  
         $this->load->view('formulario');  
    }  


    //las preguntas
     public function show($id)

   {

      $item = $this->preguntas->find_item($id);

      //para generar la vista de forma dinámica
      //$campos= $this->campos();

    //  $this->load->view('theme/header');

      $this->load->view('pregunta', $item);

    //  $this->load->view('theme/footer');

   }

       public function pregunta($id)

   {

     //$pregunta =$this->preguntas->find_pregunta($id);   
     $datos = $this->preguntas->find_respuesta($id);
     $preguntas = $this->preguntas->find_pregunta($id);
      //para generar la vista de forma dinámica
      //$campos= $this->campos();

    //  $this->load->view('theme/header');

      $this->load->view('pregunta', array ('datos'=>$datos, 'preguntas'=>$preguntas));

    //  $this->load->view('theme/footer');

   }

    public function charts1()  
    {  
        $this->load->view('charts1');  
    }
  
  
}  
?>  
