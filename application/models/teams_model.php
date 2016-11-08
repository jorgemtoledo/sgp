<?php
	class Teams_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTeams(){

			// $query = $this->db->get('teams');
				// return $query->result();
			$this->db->select(
			 	'T.id as tid,
			 	T.name as tname,
			 	T.operation_id as toperation,
			 	T.active as tactive,
			 	T.created as tcreated,
			 	T.modified as tmodified,
			 	O.id as oid,
			 	O.name as oname');
			 $this->db->from('teams as T');
			 $this->db->join('operations as O', 'O.id = T.operation_id','inner');
			 $this->db->order_by("tid", "ASC");
			 $query = $this->db->get();
			 return $query->result();
		}

		public function saveteams($data){

			return $this->db->insert('teams', $data);

		}

		public function listOperationsCombo(){

			$query = $this->db->get('operations');
				return $query->result();
		}


		public function listEdit($id){

			$this->db->select(
			 	'T.id as tid,
			 	T.name as tname,
			 	T.operation_id as toperation,
			 	T.active as tactive,
			 	T.created as tcreated,
			 	T.modified as tmodified,
			 	O.id as oid,
			 	O.name as oname');
			 $this->db->from('teams as T');
			 $this->db->join('operations as O', 'O.id = T.operation_id','inner');
			  	$this->db->where('T.id',$id);
		        $this->db->limit(1);
		        return $this->db->get()->row();
		}

		public function saveeditteams($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('teams', $data);

		}

	}


