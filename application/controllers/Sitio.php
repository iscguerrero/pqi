
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitio extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	public function Inicio(){
		$this->load->view('Sitio/inicio');
	}
	public function Transparencia(){
		$this->load->view('Sitio/transparencia');
	}

}