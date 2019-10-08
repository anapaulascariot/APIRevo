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
                redirect('Main/formulario');  
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

     
     $respuestas = $this->preguntas->find_respuesta($id);
     $lapregunta = $this->preguntas->get_pregunta($id);

     //Como la query devuelve mucha basura, esto lo que hace es acomodarlo en un solo array que va ser fácil de procesar cuando se mande a la vista
     $preguntayrespuesta=$this->acomoda_pregunta($lapregunta,$respuestas);

    //  $this->load->view('theme/header');
     $datos['preguntayrespuesta']=$preguntayrespuesta;
      $this->load->view('pregunta', $datos);

    //  $this->load->view('theme/footer');

   }

 

    public function charts($id)//la id es de la pregunta, así obtiene todas las respuestas asociadas  
    {  
        $datos=$this->preguntas->get_votos($id); //obtiene los datos de los votos y las preguntas
        $data['datos']=$datos;
        $this->load->view('charts', $data);  
    }

    public function charts1()//la id es de la pregunta, así obtiene todas las respuestas asociadas  
    {  
        //$datos=$this->preguntas->get_votos($id); //obtiene los datos de los votos y las preguntas
        $this->load->view('charts1');  
    }


     public function formulario()  
    {  
      //Generalmente recibiría una id como argumento para mostrar la pregunta
      //como se ha descartado, la id se maneja en una variable interna
        $id=3;
          if ($this->session->userdata('currently_logged_in'))   
        {
            $respuestas = $this->preguntas->find_respuesta($id);
            $lapregunta = $this->preguntas->get_pregunta($id);
            $preguntayrespuesta=$this->acomoda_pregunta($lapregunta,$respuestas);
            $datos['preguntayrespuesta']=$preguntayrespuesta;
            $this->load->view('formulario',$datos);  
        } else {  
            redirect('Main/invalid');  
        }  
        
    } 

    public function acomoda_pregunta($lapregunta, $respuestas){
        $arreglofeo= array();

        //teoricamente solo obtiene la id de la pregunta, 
        //la pregunta y la id del usuario    
        foreach ($lapregunta as $key){
            $arreglofeo[]=$key->idpregunta;
            $arreglofeo[]=$key->pregunta;
        }
        foreach ($respuestas as $key) {
            $arreglofeo[]=$key->idrespuesta;
            $arreglofeo[]=$key->respuesta;
        }
        
        return $arreglofeo;

    }

     public function votar($id)//la id realmente no hace nada aquí excepto para mostrar la gráfica al final

    {

        //$this->form_validation->set_rules('gridRadios', 'required');
        /*
        if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('errors', validation_errors());

            redirect(base_url('index.php/Main/formulario/'.$id));

        }else{ }//Validación, dentro del else se pone la ejecución si pasa la validación
        */
          $this->preguntas->update_respuesta();

          redirect(base_url('index.php/Main/charts/'.$id));

        

   }

   public function alta_usuario()

   {
        /* 
        $this->form_validation->set_rules('email', 'password', 'required');

        
       if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('errors', validation_errors());

            redirect(base_url('itemCRUD/create'));

        }else{}//Aquí va la validación interna
        */

           $this->preguntas->insertar_usuario();

           redirect(base_url('index.php/Main/'));

        

    }

  
  
}  
?>  
