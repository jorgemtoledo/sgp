<?php
	class Attendances_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTypeAttendances(){

			$query = $this->db->get('type_attendances');
				return $query->result();
		}

		public function saveattendances($data){

			return $this->db->insert('attendances', $data);

		}

	}
