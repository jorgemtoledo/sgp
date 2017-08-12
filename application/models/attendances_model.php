<?php
	class Attendances_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTypeAttendances(){

			$this->db->order_by("name", "ASC");
			$query = $this->db->get('type_attendances');
				return $query->result();
		}

		public function listTypeAttendancesLimit(){
			$id = array(4,5,11);
			$this->db->where_in('id', $id);
			$query = $this->db->get('type_attendances');
				return $query->result();
		}

		public function listAbsencesfsfs(){
			$this->db->order_by("id", "ASC");
			$query = $this->db->get('absences');
			return $query->result();
		}

		public function listAbsences(){

			$this->db->select(
		 	'ab.id as abid,
		 	ab.user_id as abuser,
		 	ab.worker_id as abworker,
		 	ab.type_attendance_id as abtype,
		 	ab.dateStart as abstart,
		 	ab.dateFinish as abfinish,
		 	ab.status as abstatus,
		 	ab.description as abdescription,
		 	ab.created as abcreated,
		 	ab.modified as abmodified,
		 	u.id as uid,
		 	u.name as uname,
		 	w.id as wid,
		 	w.employee_id as wemployee,
		 	w.team_id as wteam,
		 	e.id as eid,
		 	e.name as ename,
		 	t.id as tid,
		 	t.name as tname,
		 	type.id as typeid,
		 	type.name as typename
		 	');
			 $this->db->from('absences as ab');
			 $this->db->join('users as u', 'u.id = ab.user_id','inner');
			 $this->db->join('workers as w', 'w.id = ab.worker_id','inner');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->join('teams as t', 't.id = w.team_id','inner');
			 $this->db->join('type_attendances as type', 'type.id = ab.type_attendance_id','inner');
			 $this->db->order_by("abid", "DESC");

			 $query = $this->db->get();
			 return $query->result();
		}

		public function listAbsencesEdit($id){

			$this->db->select(
		 	'ab.id as abid,
		 	ab.user_id as abuser,
		 	ab.worker_id as abworker,
		 	ab.type_attendance_id as abtype,
		 	ab.dateStart as abstart,
		 	ab.dateFinish as abfinish,
		 	ab.status as abstatus,
		 	ab.description as abdescription,
		 	ab.created as abcreated,
		 	ab.modified as abmodified,
		 	u.id as uid,
		 	u.name as uname,
		 	w.id as wid,
		 	w.employee_id as wemployee,
		 	w.team_id as wteam,
		 	e.id as eid,
		 	e.name as ename,
		 	t.id as tid,
		 	t.name as tname,
		 	type.id as typeid,
		 	type.name as typename
		 	');
			 $this->db->from('absences as ab');
			 $this->db->join('users as u', 'u.id = ab.user_id','inner');
			 $this->db->join('workers as w', 'w.id = ab.worker_id','inner');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->join('teams as t', 't.id = w.team_id','inner');
			 $this->db->join('type_attendances as type', 'type.id = ab.type_attendance_id','inner');
			 $this->db->where('w.id',$id);
			 $this->db->limit(1);
			 return $this->db->get()->row();
		}

		public function saveattendances($data){
			return $this->db->insert('attendances', $data);
		}

		public function saveeditattendances($data,$idattendances){
			$this->db->where('id',$idattendances);
			return $this->db->update('attendances', $data);
		}

		public function listAttendances($idattendances){
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

		public function savetypeattendances($data){
			return $this->db->insert('type_attendances', $data);
		}

		public function saveedittypeattendances($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('type_attendances', $data);

		}

		public function listTeam($team_id){
			$this->db->where('team_id',$team_id);
			$query = $this->db->get('workers');
				return $query->result();

		}



		// Teams
		public function teamsAll(){
			$query = $this->db->get('teams');
				return $query->result();
		}

		public function saveattendanceList($data2,$dataList){
			$this->db->insert('absences', $data2);
			foreach($dataList as $dados){
				 $this->db->insert('attendances', $dados);
			}
			return;
		}

	}
