<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gl_cat_usuarios extends CI_Model{
	# Constructor del modelo
	function construct(){
		parent::__construct();
	}
	# Metodo para crear un nuevo registro en el catalogo de usuarios
	public function alta($data) {
		$data['contrasenia'] = $this->hash_password($data['contrasenia']);
		return $this->db->insert('gl_cat_usuarios', $data);
	}
	# Resolver el Login de un usuario
	public function resolverAcceso($data) {
		$this->db->select('contrasenia');
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $data['cve_usuario']);
		$this->db->where('estatus', 'A');
		$hash = $this->db->get()->row('contrasenia');
		return $this->verify_password_hash($data['contrasenia'], $hash);
	}
	# Funcion para obtener la informacion basica del usuario con su clave
	public function obtenerUsuario($cve_usuario) {
		$this->db->from('gl_cat_usuarios');
		$this->db->where('cve_usuario', $cve_usuario);
		return $this->db->get()->row();
	}
	# Funcion para setear la contraseña del usuario a un hash
	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
	# Funcion para desencriptar una contraseña
	private function verify_password_hash($contrasenia, $hash) {
		return password_verify($contrasenia, $hash);
	}
}