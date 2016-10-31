<?php
	class Users_model extends CI_Model{

	public function __construct() {
        parent::__construct();
    }

    public function listUsers(){

			$query = $this->db->get('users');
				return $query->result();
		}
}