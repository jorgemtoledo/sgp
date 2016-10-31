<?php
	class Dayoffs_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listDayOffs(){

			$query = $this->db->get('day_offs');
				return $query->result();
		}

		public function saveDayOffs($data){

			return $this->db->insert('day_offs', $data);

		}

		public function saveeditDayOffs($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('day_offs', $data);

		}

	}


