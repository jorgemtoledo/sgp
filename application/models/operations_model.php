<?php
// Mudou o nome operacoes para deparatamentos
	class Operations_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		// public function listOperations(){

		// 	$query = $this->db->get('operations');
		// 		return $query->result();
		// }



		public function listOperations(){

			$this->db->select(
			 	'O.id as oid,
			 	O.company_id as ocompany,
			 	O.name as oname,
			 	O.active as oactive,
			 	O.created as ocreated,
			 	O.modified as omodified,
			 	C.name as cname');
			 $this->db->from('operations as O');
			 $this->db->join('companies as C', 'C.id = O.company_id','inner');
			 $this->db->order_by("oid", "ASC");
			 $query = $this->db->get();
			 return $query->result();
		}

		public function listEditOperations($id){
			$this->db->select(
			 	'O.id as oid,
			 	O.company_id as ocompany,
			 	O.name as oname,
			 	O.active as oactive,
			 	O.created as ocreated,
			 	O.modified as omodified,
			 	C.name as cname');
			 $this->db->from('operations as O');
			 $this->db->join('companies as C', 'C.id = O.company_id','inner');
			 $this->db->where('O.id',$id);
        	 $this->db->limit(1);
			 return $this->db->get()->row();
		}

		public function saveoperations($data){

			return $this->db->insert('operations', $data);

		}

		public function saveeditoperations($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('operations', $data);

		}

		public function listCompaniesCombo(){

			$query = $this->db->get('companies');
				return $query->result();
		}

	}


