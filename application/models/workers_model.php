<?php
	class Workers_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listWorkers(){

		}

		public function listWorkersAdd(){

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
			 $this->db->order_by("wid", "desc");
			 $query = $this->db->get();
			 return $query->result();

		}

		public function listEmployee(){

			$this->db->order_by("name", "ASC");
			$query = $this->db->get('employees');
				return $query->result();
		}

		public function listUser(){

			$query = $this->db->get('users');
				return $query->result();
		}

		public function listTeam(){

			$this->db->order_by("name", "ASC");
			$query = $this->db->get('teams');
				return $query->result();
		}

		public function listTeamsWorkers(){

			// $user_id = $this->session->userdata('id');


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
			 $this->db->order_by("tid", "desc");
			 $query = $this->db->get();
			 return $query->result();
		}

		public function saveworkers($data,$employee){

			$this->db->where('employee_id',$employee);
			$query = $this->db->get('workers', $data);
			$rowcount = $query->num_rows();

			// echo "<pre>";
			// // var_dump($data);
			// var_dump($rowcount);
			// echo "</pre>";
			// die();

			if ($rowcount > 0)
			{
			   redirect('workers/listworkers/2');
			} else {
				//redirect('workers/listworkers/1');
				return $this->db->insert('workers', $data);
			}

		}

		public function listWorkersEdit($id){

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
			 $this->db->where('W.id',$id);
         	 $this->db->limit(1);
		 	 return $this->db->get()->row();

		}


		public function get_workers($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

	        $sql = $this->db->query(
	        	"SELECT
	        	w.id as wid,
			 	w.team_id as wteam,
			 	w.user_id as wuser,
			 	w.employee_id as wemployee,
			 	w.active as wactive,
			 	w.created as wcreated,
			 	w.modified as wmodified,
			 	u.id as uid,
			 	u.name as uname,
			 	e.id as eid,
			 	e.name as ename,
			 	t.id as tid,
			 	t.name as tname
	        	FROM  workers w
	        	INNER JOIN users u ON u.id = w.user_id
	        	INNER JOIN employees e ON e.id = w.employee_id
	        	INNER JOIN teams t ON t.id = w.team_id
	        	WHERE e.name LIKE '%{$nomebusca}%' OR t.name LIKE '%{$nomebusca}%' ORDER BY e.name ASC {$inicio}");
		        $dados['inicio'] = $inicio;
		        $dados['total'] =$sql->num_rows();
		        $dados['dados'] = $sql->result_array();
		        return $dados;
   		}




		public function saveeditworkers($data,$id){

		// echo "<pre>";
		// print_r($data);
		// print_r($id);
		// echo "</pre>";
		// die();

			$this->db->where('id',$id);
			return $this->db->update('workers', $data);

		}

	}
