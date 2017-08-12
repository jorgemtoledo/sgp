<?php
	class Maternities_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

    public function get_maternities($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

	        $sql = $this->db->query(
	        	"SELECT
	        	mc.id as mcid,
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
	        	mc.inss as mcinss,
	        	mc.maternity_leave as mcmaternity_leave,
	        	mc.feedback as mcfeedback,
	        	mc.created as mccreated,
	        	mc.modified as mcmodified,
	        	mc.maternity_leave as mcmaternity,
	        	mc.inss as mcinss,

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
	        	c.description as cdescription,

	        	w.id as wid,
	        	w.team_id as wteam,
	        	w.user_id as wuser,
	        	w.employee_id as wemployee,
	        	w.active as wactive,

	        	u.id as uid,
	        	u.name as uname,
	        	u.level as ulevel,

	        	e.id as eid,
	        	e.registration as eregistration,
	        	e.name as ename

	        	FROM  medical_certificates mc
	        	INNER JOIN type_certificates tp ON tp.id = mc.type_certificate_id
	        	INNER JOIN doctors d ON d.id = mc.doctor_id
	        	INNER JOIN health_stations hs ON hs.id = mc.health_station_id
	        	INNER JOIN day_offs do ON do.id = mc.day_off_id
	        	INNER JOIN cids c ON c.id = mc.cid_id
	        	INNER JOIN users u ON u.id = mc.user_id
	        	INNER JOIN workers w ON w.id = mc.worker_id
	        	INNER JOIN employees e ON e.id = w.employee_id


	        	WHERE mc.maternity_leave = 1 AND e.name LIKE '%{$nomebusca}%' ORDER BY mc.start_certificate DESC, e.name DESC  {$inicio}");
			    $dados['inicio'] = $inicio;
			    $dados['total'] =$sql->num_rows();
			    $dados['dados'] = $sql->result_array();
			    return $dados;


   		}


   		public function listAddFormMaternity($id){

			$this->db->select(
			 	'mc.id as mcid,
	        	mc.user_id as mcuser,
	        	mc.worker_id as mcworker,
	        	mc.delivery_date as mcdeliverydate,
	        	mc.start_certificate as mcstartcertificate,
	        	mc.finish_certificate as mcfinishcertificate,
	        	mc.day_off_id as mcdayoffid,
	        	mc.number_day as mcnumberday,
	        	mc.type_certificate_id as mctypecertificate,
	        	mc.cid_id as mccid,
	        	mc.accredit as mcaccredit,
	        	mc.doctor_id as mcdoctor,
	        	mc.health_station_id as mchealthstation,
	        	mc.description as mcdescription,
	        	mc.inss as mcinss,
	        	mc.maternity_leave as mcmaternity_leave,
	        	mc.created as mccreated,
	        	mc.modified as mcmodified,
	        	mc.maternity_leave as mcmaternity,
	        	mc.inss as mcinss,

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
	        	c.description as cdescription,

	        	w.id as wid,
	        	w.team_id as wteam,
	        	w.user_id as wuser,
	        	w.employee_id as wemployee,
	        	w.active as wactive,

	        	u.id as uid,
	        	u.name as uname,
	        	u.level as ulevel,

	        	e.id as eid,
	        	e.registration as eregistration,
	        	e.name as ename');
			 $this->db->from('medical_certificates as mc');
			 $this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
			 $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
			 $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
			 $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
			 $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
			 $this->db->join('users as u', 'u.id = mc.user_id','inner');
			 $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->where('mc.id',$id);
        	 $this->db->limit(1);
			 return $this->db->get()->row();

		}

		public function saveAddFormMaternity($data){

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

			return $this->db->insert('maternities', $data);

		}


		public function listEditFormMaternity($id){

			$this->db->select(
			 	'mc.id as mcid,
	        	mc.user_id as mcuser,
	        	mc.worker_id as mcworker,
	        	mc.delivery_date as mcdeliverydate,
	        	mc.start_certificate as mcstartcertificate,
	        	mc.finish_certificate as mcfinishcertificate,
	        	mc.day_off_id as mcdayoffid,
	        	mc.number_day as mcnumberday,
	        	mc.type_certificate_id as mctypecertificate,
	        	mc.cid_id as mccid,
	        	mc.accredit as mcaccredit,
	        	mc.doctor_id as mcdoctor,
	        	mc.health_station_id as mchealthstation,
	        	mc.description as mcdescription,
	        	mc.inss as mcinss,
	        	mc.maternity_leave as mcmaternity_leave,
	        	mc.created as mccreated,
	        	mc.modified as mcmodified,
	        	mc.maternity_leave as mcmaternity,
	        	mc.inss as mcinss,

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
	        	c.description as cdescription,

	        	w.id as wid,
	        	w.team_id as wteam,
	        	w.user_id as wuser,
	        	w.employee_id as wemployee,
	        	w.active as wactive,

	        	u.id as uid,
	        	u.name as uname,
	        	u.level as ulevel,

	        	mt.id as mtid,
	        	mt.medical_certificate_id as mtmedicalid,
	        	mt.user_id as mtuser,
	        	mt.description as mtdescription,
	        	mt.finish_maternity as mtfinish,
	        	mt.created as mtcreated,
	        	mt.modified as mtmodified,

	        	e.id as eid,
	        	e.name as ename');
			 $this->db->from('medical_certificates as mc');
			 $this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
			 $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
			 $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
			 $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
			 $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
			 $this->db->join('users as u', 'u.id = mc.user_id','inner');
			 $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->join('maternities as mt', 'mt.medical_certificate_id = mc.id','inner');
			 $this->db->where('mc.id',$id);
        	 $this->db->limit(1);
			 return $this->db->get()->row();

		}

		public function saveEditFormMaternity($data,$id){

		// echo "<pre>";
		// var_dump($id);
		// var_dump($data);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('maternities', $data);

		}






}