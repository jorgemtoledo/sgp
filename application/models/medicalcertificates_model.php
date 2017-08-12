<?php
	class Medicalcertificates_model extends CI_Model{

public function __construct() {
        parent::__construct();
    }

		public function listMedicalCertificates(){

			$query = $this->db->get('medical_certificates');
				return $query->result();
		}

                            public function listMedicalCertificatesExcel(){
                                 $this->db->select('e.registration as eregistration,
                                    e.name as ename,
                                    t.name as tname,
                                    mc.id as mcid,

                                    tp.name as tpname,

                                    mc.delivery_date as mcdelivery_date,
                                    mc.start_certificate as mcstart_certificate,
                                    mc.finish_certificate as mcfinish_certificate,
                                    mc.number_day as mcnumber_day,

                                    mc.accredit as mcaccredit,

                                    do.name as doname,

                                    c.name as cname,
                                    c.description as cdescription,

                                    mc.description as mcdescription,

                                    d.name as dname,
                                    d.crm as dcrm,

                                    hs.name as hsname,

                                    u.name as uname,

                                    mc.created as mccreated,
                                    mc.modified as mcmodified

                                    ');
                                    $this->db->from('medical_certificates as mc');
                                    $this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
                                     $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
                                     $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
                                     $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
                                     $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
                                     $this->db->join('users as u', 'u.id = mc.user_id','inner');
                                     $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
                                     $this->db->join('teams as t', 't.id = w.team_id','inner');
                                     $this->db->join('employees as e', 'e.id = w.employee_id','inner');


                                 $query = $this->db->get();
                                 return $query->result();



                            }

		public function listWorkersCombo(){

			// $query = $this->db->get('workers');
			// 	return $query->result();
                        $this->db->select(
	           'w.id as wid,
	        	w.team_id as wteam,
	        	w.user_id as wuser,
	        	w.employee_id as wemployee,
	        	w.active as wactive,
	        	w.created as wcreated,
	        	w.modified as wmodified,
	        	e.id as eid,
	        	e.name as ename');
			 $this->db->from('workers as w');
			 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
			 $this->db->order_by("ename", "asc");

			 $query = $this->db->get();
			 return $query->result();

		}

		public function listDayOffsCombo(){

			$query = $this->db->get('day_offs');
				return $query->result();
		}

		public function listTypeCertificatesCombo(){

			$this->db->order_by('name', 'ASC');
                                  $query = $this->db->get('type_certificates');
				return $query->result();
		}

		public function listTypeCidsCombo(){
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('cids');
				return $query->result();
		}

		public function listTypeDoctorsCombo(){
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('doctors');
				return $query->result();
		}

		public function listTypeHealthCombo(){
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('health_stations');
				return $query->result();
		}

		//Pega cids para autocomplete
		public function get_cids($term){
        $sql = $this->db->query('select * from cids where name like "'.
            mysql_real_escape_string($term) .'%" order by name asc limit 0,10');
            return $sql ->result();
   	   }

   	   //Pega employees para autocomplete
		public function get_employeesfsfsfsfs($term){
        $sql = $this->db->query('select * from employees where name like "'.
            mysql_real_escape_string($term) .'%" order by name asc limit 0,10');
            return $sql ->result();
   	   }

  //  	   SELECT mc.id AS mcid, count( mc.id ) AS countcm, mc.worker_id AS mcw, w.id AS wid,
		// w.employee_id AS we, e.id AS eid, e.name AS ename
		// FROM medical_certificates mc
		// INNER JOIN workers w ON w.id = mc.worker_id
		// INNER JOIN employees e ON e.id = w.employee_id
		// WHERE e.name LIKE '%Ant%'

   	   // Falta Validar - Inicio
   	   //Pega employees para autocomplete
		// public function get_employees($term){
  //       $sql = $this->db->query(
  //       	'select employees.id, employees.name, workers.id as wid, workers.employee_id, medical_certificates.id,
  //       	count(medical_certificates.id) as countmc, medical_certificates.worker_id, medical_certificates.start_certificate
  //       	from employees
  //       	INNER JOIN workers ON workers.employee_id = employees.id
  //       	INNER JOIN medical_certificates ON medical_certificates.worker_id = workers.id
  //       	where name like "'.
  //           mysql_real_escape_string($term) .'%"
  //           UNION DISTINCT
		// 	SELECT employees.id, employees.name, workers.id as wid , NULL , NULL , NULL , NULL, NULL from employees
		// 	INNER JOIN workers ON workers.employee_id = employees.id
		// 	where name like "'.
  //           mysql_real_escape_string($term) .'%"
  //           order by name asc limit 0,4'
  //       );
  //           return $sql ->result();
  //  	   }
   	   // Fim

   	   public function get_employees($term){
        $sql = $this->db->query(
        	'select employees.id, employees.name, workers.id as wid, workers.employee_id, medical_certificates.id,
        	count(medical_certificates.id) as countmc, SUM(medical_certificates.cid_id = 13855) as sumcid,
        	SUM(medical_certificates.inss = 1) as suminss, SUM(medical_certificates.maternity_leave = 1) as summaternity,
        	medical_certificates.worker_id, medical_certificates.start_certificate
        	from employees
        	INNER JOIN workers ON workers.employee_id = employees.id
        	LEFT JOIN medical_certificates ON medical_certificates.worker_id = workers.id
        	where active = 1 AND name like "'.
            mysql_real_escape_string($term) .'%"
            GROUP BY employees.name
            order by name asc limit 0,4'
        );
            return $sql ->result();
   	   }


   	   public function get_employees2($term){
        $sql = $this->db->query(
        	'select employees.id, employees.name, workers.id as workersid, workers.employee_id, medical_certificates.id,
        	count(medical_certificates.id) as countmc, medical_certificates.worker_id as mcworker_id, medical_certificates.start_certificate
        	from employees
        	INNER JOIN workers ON workers.employee_id = employees.id
        	LEFT JOIN medical_certificates ON medical_certificates.worker_id = workers.id
        	where medical_certificates.cid_id = 13855 AND name like "'.
            mysql_real_escape_string($term) .'%"
            GROUP BY employees.name
            order by name asc limit 0,4'
        );
            return $sql ->result();
   	   }

		public function GetRowCid($keyword) {
        $this->db->order_by('id', 'DESC');
        $this->db->like("name", $keyword);
        return $this->db->get('cids')->result_array();
    }

     	public function GetRowDoctor($keyword) {
        $this->db->order_by('id', 'DESC');
        $this->db->like("name", $keyword);
        return $this->db->get('doctors')->result_array();
    }

     	public function GetRowHealth($keyword) {
        $this->db->order_by('id', 'DESC');
        $this->db->like("name", $keyword);
        return $this->db->get('health_stations')->result_array();
    }


		public function saveMedicalCertificates($data){

			return $this->db->insert('medical_certificates', $data);

		}

		public function saveeditMedicalCertificates($data,$id){

		// echo "<pre>";
		// print_r($data);
		// print_r($id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('medical_certificates', $data);

		}

		public function get_medicalcertificates($nomebusca=null,$inicio=NULL,$quantidade=NULL){
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


	        	WHERE e.name LIKE '%{$nomebusca}%' OR tp.name LIKE '%{$nomebusca}%' ORDER BY mc.id DESC, e.name DESC  {$inicio}");
			    $dados['inicio'] = $inicio;
			    $dados['total'] =$sql->num_rows();
			    $dados['dados'] = $sql->result_array();
			    return $dados;
   		}

   		public function listEditMedicalCertificates($id){

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

		public function listEditMedicalCertificates2($id){

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
	        	mc.created as mccreated,
	        	mc.modified as mcmodified,

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
			 $this->db->where('w.id',$id);
        	 $this->db->limit(1);
			 return $this->db->get()->row();



		}

		// public function listTypeCertificatesCombo(){

		// 	$this->db->select('*');
		// 	 $this->db->from('type_certificates');
  //       	 $this->db->limit(1);
		// 	 return $this->db->get()->row();

		// }

	}


