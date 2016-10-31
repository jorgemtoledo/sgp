<?php
	class Companies_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listCompanies(){

			$query = $this->db->get('companies');
				return $query->result();
		}

		public function savecompanies($data){

			return $this->db->insert('companies', $data);

		}

		public function saveeditcompanies($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('companies', $data);

		}

	}
