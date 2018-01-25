<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_archivos extends Base_Model{

	# Constructor del modelo
	function construct(){
		parent::__construct();
	}

	# Funcion para obtener los archivos cargados en el sistema
	public function ObtenerArchivos($art, $fra){
		$this->db->select('nombre_archivo, url, descripcion')
						->from('gl_archivos')
						->where('articulo', $art)
						->where('fraccion', $fra)
						->where('estatus', 'A');
		$query = $this->db->get();
		return $query->result();
	}

	# Funcion para obtener los articulos de una fraccion
	public function obtenerData(){
		$this->db->select('id, nombre_archivo, articulo, fraccion, url, descripcion, estatus')
						->from('gl_archivos')
						->where('estatus', 'A');
		$query = $this->db->get();
		return $query->result();
	}

	# Metodo para crear un nuevo registro en los detalles del cliente
	public function cargarArchivo($data) {
		if($data['id'] == '')
			return $this->db->insert('gl_archivos', $data);
		else {
			return $this->db->set('articulo', $data['articulo'])
											->set('fraccion', $data['fraccion'])
											->set('descripcion', $data['descripcion'])
											->set('estatus', $data['estatus'])
											->where('id', $data['id'])
											->limit(1)
											->update('gl_archivos');
		}
	}

}