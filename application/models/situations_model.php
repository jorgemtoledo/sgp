<?php
	class Situations_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listSituations(){

			$query = $this->db->get('situations');
				return $query->result();
		}

		public function savesituations($data){

			return $this->db->insert('situations', $data);

		}

		public function saveeditsituations($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('situations', $data);

		}

	}
