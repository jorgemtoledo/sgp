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
			 $this->db->order_by("eid", "desc");

			 $query = $this->db->get();
			 return $query->result();



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
	        	WHERE e.name LIKE '%{$nomebusca}%' {$inicio}");
        $dados['inicio'] = $inicio;
        $dados['total'] =$sql->num_rows();
        $dados['dados'] = $sql->result_array();    
        return $dados;


   		}

		public function saveemployees($data){

			return $this->db->insert('employees', $data);

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

		// //Cadastro em Massa
		// public function saveUsuarios($inser_user){
		// 	return $this->db->insert('employees', $inser_user);

		// }

		public function saveeditemployees($data,$id){

		// echo "<pre>";
		// var_dump($data);
		// var_dump($id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('employees', $data);

		}

	}
