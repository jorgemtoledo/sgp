<?php
	class Tasks_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listTeams($id){

				$this->db->select(
			 	'W.id as wid,
			 	W.team_id as wteam,
			 	W.user_id as wuser,
			 	U.id as uid,
			 	U.name as uname,
			 	T.id as tid,
			 	T.name as tname');
			 $this->db->from('teams_users as W');
			 $this->db->join('users as U', 'U.id = W.user_id','inner');
			 $this->db->join('teams as T', 'T.id = W.team_id','inner');
			 $this->db->where('W.user_id',$id);
			 $this->db->order_by('T.name', 'ASC');
		 	 return $this->db->get()->result();

		}

		// Birthdays
		public function listBirthdays($id){

			$this->db->select(
			 	'TS.id as wid,
			 	TS.team_id as wteam,
			 	TS.user_id as wuser,
			 	U.id as uid,
			 	U.name as uname,
			 	T.id as tid, W.employee_id as we,
			 	E.id as eid, E.name as ename,
			 	(MONTH( CURDATE( ) ) = MONTH( E.birth_date )) AS niver,	(DAY(E.birth_date)) AS dia,
			 	T.name as tname');
			 $this->db->from('teams_users as TS');
			 $this->db->join('users as U', 'U.id = TS.user_id','inner');
			 $this->db->join('teams as T', 'T.id = TS.team_id','inner');
			 $this->db->join('workers as W', 'W.team_id = T.id','inner');
			 $this->db->join('employees as E', 'E.id = W.employee_id','inner');
			 $this->db->where('TS.user_id',$id);
			 $this->db->having('niver', 1);
			 $this->db->order_by('dia', 'ASC');
		 	 return $this->db->get()->result();

		}

		public function listOneTeams($id){

				$this->db->select(
			 	'W.id as wid,
			 	W.team_id as wteam,
			 	W.user_id as wuser,
			 	U.id as uid,
			 	U.name as uname,
			 	T.id as tid,
			 	T.name as tname');
			 $this->db->from('teams_users as W');
			 $this->db->join('users as U', 'U.id = W.user_id','inner');
			 $this->db->join('teams as T', 'T.id = W.team_id','inner');
			 $this->db->where('W.team_id',$id);
			 $this->db->limit(1);
		 	 return $this->db->get()->row();
		 	 // return $this->db->get()->result();

		}


		public function listWorkers($id){

				$this->db->select(
			 	'W.id as wid,
			 	W.team_id as wteam,
			 	W.user_id as wuser,
			 	W.employee_id as wemployee,
			 	W.active as wactive,
			 	W.created as wcreated,
			 	W.modified as wmodified,
			 	U.id as uid,
			 	U.name as uname,
			 	E.id as eid,
			 	E.name as ename,
			 	T.id as tid,
			 	T.name as tname');
			 $this->db->from('workers as W');
			 $this->db->join('users as U', 'U.id = W.user_id','inner');
			 $this->db->join('employees as E', 'E.id = W.employee_id','inner');
			 $this->db->join('teams as T', 'T.id = W.team_id','inner');
			 $this->db->where('W.active',1);
		 	 $this->db->where('T.id',$id);
		 	 $this->db->order_by('E.name', 'ASC');
		 	 return $this->db->get()->result();

		}

		public function listTasksWorker($id){

				$this->db->select(
			 	'W.id as wid,
			 	W.team_id as wteam,
			 	W.user_id as wuser,
			 	W.employee_id as wemployee,
			 	W.active as wactive,
			 	W.created as wcreated,
			 	W.modified as wmodified,
			 	U.id as uid,
			 	U.name as uname,
			 	E.id as eid,
			 	E.name as ename,
			 	T.id as tid,
			 	T.name as tname');
			 $this->db->from('workers as W');
			 $this->db->join('users as U', 'U.id = W.user_id','inner');
			 $this->db->join('employees as E', 'E.id = W.employee_id','inner');
			 $this->db->join('teams as T', 'T.id = W.team_id','inner');
			 $this->db->where('W.active',1);
		 	 $this->db->where('W.id',$id);
		 	 return $this->db->get()->result();

		}
		// List medical certificates of worker
		public function listTaskEmployee($id){

				$this->db->select(
			 	'mc.id as mcid,
	        	mc.user_id as mcuser,
	        	mc.worker_id as mcworker,
	        	mc.delivery_date as mcdeliverydate,
	        	mc.start_certificate as mcstartcertificate,
	        	mc.finish_certificate as mcfinishcertificate,
	        	mc.number_day as mcnumberday,
	        	mc.type_certificate_id as mctypecertificate,
	        	mc.cid_id as mccid,
	        	mc.accredit as mcaccredit,
	        	mc.doctor_id as mcdoctor,
	        	mc.health_station_id as mchealthstation,
	        	mc.description as mcdescription,
	        	mc.created as mccreated,
	        	mc.modified as mcmodified,

			 	w.id as wid,
	        	w.team_id as wteam,
	        	w.user_id as wuser,
	        	w.employee_id as wemployee,
	        	w.active as wactive,

	        	tp.id as tpid,
	        	tp.name as tpname,

	        	d.id as did,
	        	d.name as dname,
	        	d.crm as dcrm,

	        	hs.id as hsid,
	        	hs.name as hsname,

	        	do.id as doid,
	        	do.name as doname,

	        	c.id as cid,
	        	c.name as cname,

			 	U.id as uid,
			 	U.name as uname,

			 	e.id as eid,
	        	e.name as ename,

			 	T.id as tid,
			 	T.name as tname');
			 $this->db->from('medical_certificates as mc');
			 $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
			 $this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
			 $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
			 $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
			 $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
			 $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->join('users as U', 'U.id = mc.user_id','inner');
			 $this->db->join('teams as T', 'T.id = w.team_id','inner');
			 $this->db->where('mc.worker_id',$id);
		 	 return $this->db->get()->result();

		}

		// public function listWorkers($id){

		// 		$this->db->select(
		// 	 	'*');
		// 	 $this->db->from('workers');
		//  	 $this->db->where('team_id',$id);
		//  	 return $this->db->get()->result();

		// }
}