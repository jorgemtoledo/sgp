<?php
// Mudou o nome operacoes para deparatamentos
	class Operations_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listOperations(){

			$query = $this->db->get('operations');
				return $query->result();
		}

		public function saveoperations($data){

			return $this->db->insert('operations', $data);

		}

		public function saveeditoperations($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('operations', $data);

		}

	}


