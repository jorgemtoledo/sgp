<?php
	class Jobs_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listJobs(){

			$query = $this->db->get('jobs');
				return $query->result();
		}

		public function savejobs($data){

			return $this->db->insert('jobs', $data);

		}

		public function saveeditjobs($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('jobs', $data);

		}

	}
