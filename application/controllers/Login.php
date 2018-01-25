<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation', 'session', 'encrypt'));
		$this->load->model('gl_cat_usuarios');
	}
	# Metodo para retornar la vista del login del sistema
	public function Inicio(){
		$this->load->view('Login/inicio');
	}
	# Metodo para loguear el usuario dentro del sistema
	public function Acceder() {
		if(!$this->input->is_ajax_request()) show_404();
		# Validamos la cambinacion de usuario y contraseña de inicio de sesion
		$this->form_validation->set_rules('cve_usuario', 'Usuario', 'required', array('required'=>'Proporciona usuario de acceso'));
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'required', array('required'=>'Proporciona la contraseña del usuario'));
		if ($this->form_validation->run() == false) {
			exit(json_encode(array('bandera'=>false, 'msj'=>'Las validaciones del formulario no se completaron, atiende:<br>' . validation_errors())));
		} else {
			# Guardamos los parametros de la peticion en variables locales
			$data = array(
				'cve_usuario' => $this->input->post('cve_usuario'),
				'contrasenia' => $this->input->post('contrasenia')
			);
			# En caso de que la combinacion sea correcta
			if ($this->gl_cat_usuarios->resolverAcceso($data)) {
				$usuario = $this->gl_cat_usuarios->obtenerUsuario($this->input->post('cve_usuario'));
				# Seteamos las variables de sesion
				$nickname = explode(' ', $usuario->nombre);
				$nickname = $nickname[0];
				$sesion = array(
					'cve_usuario' => $usuario->cve_usuario,
					'nombre' => $usuario->nombre,
					'logueado' => true
				);
				$this->session->set_userdata($sesion);
				exit(json_encode(array('bandera'=>true, 'msj'=>'Acceso concedido')));
			} else {
				exit(json_encode(array('bandera'=>false, 'msj'=>'Combinación de usuario y contraseña no admitida')));
			}
		}
	}
	# Metodo para dar de alta un nuevo usuario
	public function Alta() {
		# Guardamos los parametros de la peticion en variables locales
		$data = array(
			'cve_usuario' => $this->input->get('cve_usuario'),
			'contrasenia' => $this->input->get('contrasenia'),
			'nombre' => $this->input->get('nombre'),
			'estatus' => 'A'
		);
		$this->gl_cat_usuarios->alta($data) ? exit(json_encode(array('bandera'=>true, 'msj'=>'Registro creado con éxito'))) : exit(json_encode(array('bandera'=>false, 'msj'=>'Se presento un error al crear el registro')));
	}
	# Metodo para destruir los variables de sesion del usuario logueado
	public function Salir() {
		if ($this->session->userdata() && $this->session->userdata('logueado') == true) {
			$sesion = array('logueado' => false);
			$this->session->set_userdata($sesion);
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}
}