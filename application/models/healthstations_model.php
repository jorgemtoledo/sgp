<?php
	class Healthstations_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listHealthStations(){

			$query = $this->db->get('health_stations');
				return $query->result();
		}

		public function saveHealthStations($data){

			return $this->db->insert('health_stations', $data);

		}

		public function saveeditHealthStations($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('health_stations', $data);

		}

	}


