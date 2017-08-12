<?php
	class Employees_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listEmployees(){

			$this->db->select(
			 	'E.id as eid,
			 	E.company_id as ecompany,
			 	E.job_id as ejob,
			 	E.situation_id as esituation,
			 	E.user_id as euser,
			 	E.name as ename,
			 	E.registration as eregistration,
			 	E.cpf as ecpf,
			 	E.hire_date as ehiredate,
			 	E.workload as eworkload,
			 	E.birth_date as ebirthdate,
			 	E.phone1 as ephone1,
			 	E.phone2 as ephone2,
			 	E.phone3 as ephone3,
			 	E.description as edescription,
			 	E.resignation_date as eresignationdate,
			 	E.created as ecreated,
			 	E.modified as emodified,
			 	C.name as cname,
			 	S.name as sname,
			 	J.name as jname,
			 	U.name as uname');
			 $this->db->from('employees as E');
			 $this->db->join('companies as C', 'C.id = E.company_id','inner');
			 $this->db->join('situations as S', 'S.id = E.situation_id','inner');
			 $this->db->join('jobs as J', 'J.id = E.job_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->order_by("ename", "ASC");

			 $query = $this->db->get();
			 return $query->result();
		}

		 public function insertCSV($data)
	            {
	                $this->db->insert('employees', $data);
	                return TRUE;
	            }

	public function get_employees($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

	        $sql = $this->db->query(
		"SELECT
		e.id as eid,
		e.name as ename,
		e.company_id as ecompany,
		e.job_id as ejob,
		e.situation_id as esituation,
		e.user_id as euser,
		e.registration as eregistration,
		e.cpf as ecpf,
		e.hire_date as ehiredate,
		e.workload as eworkload,
		e.birth_date as ebirthdate,
		e.phone1 as ephone1,
		e.phone2 as ephone2,
		e.phone3 as ephone3,
		e.description as edescription,
		e.resignation_date as eresignationdate,
		e.created as ecreated,
		e.modified as emodified,
		c.name as cname,
		s.name as sname,
		j.name as jname,
		c.id, c.name, s.id, s.name, j.id, j.name, u.id, u.name  FROM  employees e
		INNER JOIN companies c ON c.id = e.company_id
		INNER JOIN situations s ON s.id = e.situation_id
		INNER JOIN jobs j ON j.id = e.job_id
		INNER JOIN users u ON u.id = e.user_id
		WHERE e.name LIKE '%{$nomebusca}%' ORDER BY e.name ASC {$inicio}");
		$dados['inicio'] = $inicio;
		$dados['total'] =$sql->num_rows();
		$dados['dados'] = $sql->result_array();
		return $dados;
   		}

		public function saveemployees($data){

			return $this->db->insert('employees', $data);
			// $this->db->insert("employees",$data);
			// $last_id = $this->db->insert_id();
			// echo "<pre>";
			// print_r($last_id);
			// echo "</pre>";
			// die();
			//     return $last_id;

		}

		public function listCompaniesCombo(){

			$query = $this->db->get('companies');
				return $query->result();
		}

		public function listJobsCombo(){

			$query = $this->db->get('jobs');
				return $query->result();
		}

		public function listSituationsCombo(){

			$query = $this->db->get('situations');
				return $query->result();
		}


		public function listEditEmployees($id){

			$this->db->select(
			 	'E.id as eid,
			 	E.company_id as ecompany,
			 	E.job_id as ejob,
			 	E.situation_id as esituation,
			 	E.user_id as euser,
			 	E.name as ename,
			 	E.registration as eregistration,
			 	E.cpf as ecpf,
			 	E.hire_date as ehiredate,
			 	E.workload as eworkload,
			 	E.birth_date as ebirthdate,
			 	E.phone1 as ephone1,
			 	E.phone2 as ephone2,
			 	E.phone3 as ephone3,
			 	E.description as edescription,
			 	E.resignation_date as eresignationdate,
			 	E.created as ecreated,
			 	E.modified as emodified,
			 	C.id as cid,
			 	C.name as cname,
			 	S.id as sid,
			 	S.name as sname,
			 	J.id as jid,
			 	J.name as jname,
			 	U.id as uid,
			 	U.name as uname');
			 $this->db->from('employees as E');
			 $this->db->join('companies as C', 'C.id = E.company_id','inner');
			 $this->db->join('situations as S', 'S.id = E.situation_id','inner');
			 $this->db->join('jobs as J', 'J.id = E.job_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->where('E.id',$id);
        	 		$this->db->limit(1);
			 return $this->db->get()->row();
		}


		public function saveeditemployees($data,$id){

		// echo "<pre>";
		// var_dump($data);
		// var_dump($id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('employees', $data);

		}

		public function savedismissemployees($data,$id,$data2){

			$this->db->where('id',$id);
			$this->db->update('employees', $data);

			$this->db->where('employee_id',$id);
			return $this->db->update('workers', $data2);

		}

		public function saveexaminations($data,$id,$data2){

			$this->db->insert('examinations', $data);

			$this->db->where('id',$id);
			return $this->db->update('employees', $data2);

		}

		public function saveexaminationChecked($data,$id,$dataNext){
			$this->db->insert('examinations', $dataNext);
			$this->db->where('id',$id);
			return $this->db->update('examinations', $data);
		}


		public function listEmployeesExam(){

			$this->db->select(
			 	'E.id as eid,
			 	E.company_id as ecompany,
			 	E.job_id as ejob,
			 	E.situation_id as esituation,
			 	E.user_id as euser,
			 	E.name as ename,
			 	E.registration as eregistration,
			 	E.accomplished as eaccomplished,
			 	E.cpf as ecpf,
			 	E.hire_date as ehiredate,
			 	E.workload as eworkload,
			 	E.birth_date as ebirthdate,
			 	E.phone1 as ephone1,
			 	E.phone2 as ephone2,
			 	E.phone3 as ephone3,
			 	E.description as edescription,
			 	E.resignation_date as eresignationdate,
			 	E.created as ecreated,
			 	E.modified as emodified,
			 	W.id as wid,
			 	W.team_id as wteam,
			 	W.employee_id as wemployee,
			 	T.id as tid,
			 	T.name as tname,
			 	C.name as cname,
			 	S.name as sname,
			 	J.name as jname,
			 	U.name as uname');
			 $this->db->from('employees as E');
			 $this->db->join('companies as C', 'C.id = E.company_id','inner');
			 $this->db->join('situations as S', 'S.id = E.situation_id','inner');
			 $this->db->join('jobs as J', 'J.id = E.job_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->join('workers as W', 'W.employee_id = E.id');
			 $this->db->join('teams as T', 'T.id = W.team_id');
			 $this->db->where('E.situation_id', 1);
			 $this->db->where('E.accomplished', 0);
			 $this->db->order_by("ehiredate", 'ASC');
			 $query = $this->db->get();
			 return $query->result();
		}

		public function listEmployeesExamExcelss(){

			$this->db->select(
			 	'E.id as eid,
			 	E.company_id as ecompany,
			 	E.job_id as ejob,
			 	E.situation_id as esituation,
			 	E.user_id as euser,
			 	E.name as ename,
			 	E.registration as eregistration,
			 	E.accomplished as eaccomplished,
			 	E.cpf as ecpf,
			 	E.hire_date as ehiredate,
			 	E.workload as eworkload,
			 	E.birth_date as ebirthdate,
			 	E.phone1 as ephone1,
			 	E.phone2 as ephone2,
			 	E.phone3 as ephone3,
			 	E.description as edescription,
			 	E.resignation_date as eresignationdate,
			 	E.created as ecreated,
			 	E.modified as emodified,
			 	C.name as cname,
			 	S.name as sname,
			 	J.name as jname,
			 	U.name as uname');
			 $this->db->from('employees as E');
			 $this->db->join('companies as C', 'C.id = E.company_id','inner');
			 $this->db->join('situations as S', 'S.id = E.situation_id','inner');
			 $this->db->join('jobs as J', 'J.id = E.job_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->where('E.situation_id', 1);
			 $this->db->order_by("ehiredate", 'ASC');
			 $query = $this->db->get();
			 return $query->result();
		}

		public function listEmployeePeriodic(){
			$year= date('Y');

			$this->db->select(
			 	'E.id as eid,
			 	E.user_id as euser,
			 	E.employee_id as eemployee,
			 	E.examination_type as etype,
			 	E.examination_last as elast,
			 	E.examination_next as enext,
			 	E.examination_scheduled as escheduled,
			 	E.accomplished as eaccomplished,
			 	E.active as eactive,
			 	E.description as edescription,
			 	E.created as ecreated,
			 	E.modified as emodified,

			 	Emp.id as empid,
			 	Emp.name as empname,
			 	Emp.job_id as empjob,
			 	Emp.situation_id as empsituation,

			 	J.id as jid,
			 	J.name as jname,

			 	S.id as sid,
			 	S.name as sname,

			 	U.name as uname');

			 $this->db->from('examinations as E');
			 $this->db->join('employees as Emp', 'Emp.id = E.employee_id','inner');
			 $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
			 $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');

			 // Where
			 $this->db->where('E.accomplished', 0);
			 $this->db->where('E.active', 1);
			 $this->db->where('Emp.situation_id', 1);
			 $this->db->where('year(E.examination_scheduled)',$year);

			 $this->db->order_by("enext", 'ASC');
			 $query = $this->db->get();
			 return $query->result();
		}

		public function examinationschedule(){
			$year= date('Y');

			$this->db->select(
			 	'E.id as eid,
			 	E.user_id as euser,
			 	E.employee_id as eemployee,
			 	E.examination_type as etype,
			 	E.examination_last as elast,
			 	E.examination_next as enext,
			 	E.examination_scheduled as escheduled,
			 	E.accomplished as eaccomplished,
			 	E.active as eactive,
			 	E.description as edescription,
			 	E.created as ecreated,
			 	E.modified as emodified,

			 	Emp.id as empid,
			 	Emp.name as empname,
			 	Emp.job_id as empjob,
			 	Emp.situation_id as empsituation,

			 	W.id as wid,
			 	W.employee_id as wemployee,
			 	W.team_id as wteam,

			 	T.id as tid,
			 	T.name as tname,

			 	J.id as jid,
			 	J.name as jname,

			 	S.id as sid,
			 	S.name as sname,

			 	U.name as uname');

			 $this->db->from('examinations as E');
			 $this->db->join('employees as Emp', 'Emp.id = E.employee_id','inner');
			 $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
			 $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->join('workers as W', 'W.employee_id = Emp.id');
			 $this->db->join('teams as T', 'T.id = W.team_id');

			 // Where
			 $this->db->where('E.accomplished', 0);
			 $this->db->where('E.active', 1);
			 $this->db->where('Emp.situation_id', 1);
			 $this->db->where('year(E.examination_scheduled)',$year);

			 $this->db->order_by("escheduled", 'ASC');
			 $query = $this->db->get();
			 return $query->result();
		}


		public function viewExam($id){

			$this->db->select(
			 	'E.id as eid,
			 	E.user_id as euser,
			 	E.employee_id as eemployee,
			 	E.examination_type as etype,
			 	E.examination_last as elast,
			 	E.examination_next as enext,
			 	E.examination_scheduled as escheduled,
			 	E.accomplished as eaccomplished,
			 	E.active as eactive,
			 	E.description as edescription,
			 	E.created as ecreated,
			 	E.modified as emodified,
			 	Emp.id as empid,
			 	Emp.job_id as empjob,
			 	Emp.situation_id as empsituation,
			 	Emp.name as empname,
			 	Emp.registration as empregistration,
			 	Emp.cpf as empcpf,
			 	Emp.hire_date as emphiredate,
			 	S.id as sid,
			 	S.name as sname,
			 	J.id as jid,
			 	J.name as jname,
			 	U.id as uid,
			 	U.name as uname');

			 $this->db->from('examinations as E');
			 $this->db->join('employees as Emp', 'Emp.id = E.employee_id','inner');
			 $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
			 $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');

			 $this->db->where('E.id',$id);
        	 		 $this->db->limit(1);
			 return $this->db->get()->row();
		}

		public function saveEditexamination($data,$id){

		// echo "<pre>";
		// var_dump($data);
		// var_dump($id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('examinations', $data);

		}

		public function listEmployeesExamExcel(){
			$this->db->select(
			 	'E.id as eid,
			 	E.user_id as euser,
			 	E.employee_id as eemployee,
			 	E.examination_type as etype,
			 	E.examination_last as elast,
			 	E.examination_next as enext,
			 	E.examination_scheduled as escheduled,
			 	E.accomplished as eaccomplished,
			 	E.active as eactive,
			 	E.description as edescription,
			 	E.created as ecreated,
			 	E.modified as emodified,

			 	Emp.id as empid,
			 	Emp.name as empname,
			 	Emp.registration as empregistration,
			 	Emp.cpf as empcpf,
			 	Emp.hire_date as emphiredate,
			 	Emp.job_id as empjob,
			 	Emp.situation_id as empsituation,

			 	J.id as jid,
			 	J.name as jname,

			 	W.id as wid,
			 	W.employee_id as wemployee,
			 	W.team_id as wteam,

			 	T.id as tid,
			 	T.name as tname,

			 	S.id as sid,
			 	S.name as sname,

			 	U.name as uname');

			 $this->db->from('examinations as E');
			 $this->db->join('employees as Emp', 'Emp.id = E.employee_id','inner');
			 $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
			 $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
			 $this->db->join('users as U', 'U.id = E.user_id','inner');
			 $this->db->join('workers as W', 'W.employee_id = Emp.id');
			 $this->db->join('teams as T', 'T.id = W.team_id');
			 // Where
			 // $this->db->where('Emp.situation_id', 1);
			 $this->db->order_by("empname", 'ASC');
			 $query = $this->db->get();
			 return $query->result();
		}


		public function get_examinations($nomebusca=null,$inicio=NULL,$quantidade=NULL){
		        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

		        $sql = $this->db->query(
			"SELECT
			E.id as eid,
		 	E.user_id as euser,
		 	E.employee_id as eemployee,
		 	E.examination_type as etype,
		 	E.examination_last as elast,
		 	E.examination_next as enext,
		 	E.examination_scheduled as escheduled,
		 	E.accomplished as eaccomplished,
		 	E.active as eactive,
		 	E.description as edescription,
		 	E.created as ecreated,
		 	E.modified as emodified,

			emp.id as empid,
			emp.name as empname,
			emp.job_id as empjob,
			emp.situation_id as empsituation,
			emp.user_id as empuser,
			emp.registration as empregistration,
			emp.cpf as empcpf,
			emp.hire_date as emphiredate,
			emp.workload as empworkload,
			emp.birth_date as empbirthdate,
			emp.description as empdescription,
			emp.created as empcreated,
			emp.modified as empmodified,

			j.id as jid,
		 	j.name as jname,

		 	w.id as wid,
		 	w.employee_id as wemployee,
		 	w.team_id as wteam,

		 	t.id as tid,
		 	t.name as tname,

		 	s.id as sid,
		 	s.name as sname,

			u.id as uid,
			u.name as uname

			FROM  examinations E
			INNER JOIN employees emp ON emp.id = E.employee_id
			INNER JOIN situations s ON s.id = emp.situation_id
			INNER JOIN jobs j ON j.id = emp.job_id
			INNER JOIN workers w ON w.employee_id = emp.id
			INNER JOIN teams t ON t.id = w.team_id
			INNER JOIN users u ON u.id = E.user_id
			WHERE emp.name LIKE '%{$nomebusca}%' {$inicio}");
			$dados['inicio'] = $inicio;
			$dados['total'] =$sql->num_rows();
			$dados['dados'] = $sql->result_array();
			return $dados;
	   	}

	}
