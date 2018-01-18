<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_Controller extends CI_Controller {
	public $templates, $created_user, $updated_user;
	public function __construct(){
		parent::__construct();
			$this->load->database();
			$this->load->helper(array('url','form'));
			$this->load->library(array('form_validation', 'session', 'encrypt'));
		# Comprobamos que exista una sesion de usuario creada
			#if($this->session->userdata('logueado') == false) redirect(base_url());
	}
}