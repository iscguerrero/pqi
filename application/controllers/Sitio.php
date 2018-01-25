
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitio extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	public function Inicio(){
		$data['perfil'] = $this->session->userdata('logueado') == true ? 1 : 0;
		$this->load->view('Sitio/inicio', $data);
	}
	public function Transparencia(){
		$this->load->view('Sitio/transparencia');
	}
	public function Administrador(){
		if($this->session->userdata('logueado') == false)
			redirect(base_url());
		$this->load->view('Sitio/administrador');
	}

	public function ObtenerData() {
		if(!$this->input->is_ajax_request()) show_404();
		$this->load->model('gl_archivos');
		exit(json_encode($this->gl_archivos->obtenerData()));
	}

	public function recibirArchivo() {
		if(!$this->input->is_ajax_request()) show_404();
		$id = $this->input->post('id');
		$articulo = $this->input->post('articulo');
		$fraccion = $this->input->post('fraccion');
		$descripcion = $this->input->post('descripcion');
		$estatus = $this->input->post('estatus');

		if($articulo == '' || $fraccion == '' || $descripcion == '' || $estatus == '') exit(json_encode(array('flag'=>false, 'msj'=>'DEBES INGRESAR LA INFORMACION SOLICITADA')));

		if($id == '') {
			$archivo = $_FILES['archivo']['name'];
			$file = 'uploads/' . date('YmdHis') . $archivo;
			if(!move_uploaded_file($_FILES['archivo']['tmp_name'], $file)) exit(json_encode(array('flag'=>false, 'msj'=>'SE PRESENTO UN ERROR AL CARGAR EL ARCHIVO AL SISTEMA'.$_FILES['archivo']['error'])));
			$data = array(
				'id' => $id,
				'nombre_archivo' => $archivo,
				'articulo' => $articulo,
				'fraccion' => $fraccion,
				'descripcion' => $descripcion,
				'estatus' => $estatus,
				'url' => $file
			);
		} else {
			$data = array(
				'id' => $id,
				'articulo' => $articulo,
				'fraccion' => $fraccion,
				'descripcion' => $descripcion,
				'estatus' => $estatus
			);
		}



		$this->load->model('gl_archivos');
		$this->gl_archivos->cargarArchivo($data) ? exit(json_encode(array('flag'=>true, 'msj'=>'EL ARCHIVO SE CARGO CON EXITO'))) : exit(json_encode(array('flag'=>false, 'msj'=>'SE PRESENTO UN ERROR AL REGISTRAR EL ARCHIVO EN EL SISTEMA')));

	}

	public function ObtenerArchivos() {
		if(!$this->input->is_ajax_request()) show_404();
		$art = $this->input->post('art');
		$fra = $this->input->post('fra');
		$this->load->model('gl_archivos');
		exit(json_encode($this->gl_archivos->ObtenerArchivos($art, $fra)));
	}

}