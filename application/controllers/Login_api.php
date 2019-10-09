<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelo_api');//lo manda a traer en todos
	}

	public function index()
	{
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$email = $this->input->post('email');
		$contrasena =$this->input->post('contrasena');
		
		$arreglo = array(
			'id_usuario' => $id,
			'nombre' => $nombre,
			'apellido' => $apellido,
			'email' => $email,
			'contrasena' => $contrasena
		);


		$this-> modelo_api->guardarUsuario($arreglo);
	}
}
