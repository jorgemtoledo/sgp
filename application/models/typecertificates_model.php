<?php
	class Typecertificates_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTypeCertificates(){

			$query = $this->db->get('type_certificates');
				return $query->result();
		}

		public function saveTypeCertificates($data){

			return $this->db->insert('type_certificates', $data);

		}

		public function saveeditTypeCertificates($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('type_certificates', $data);

		}

	}


