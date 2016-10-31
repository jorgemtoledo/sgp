<?php
	class Users_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listUsers(){

			$query = $this->db->get('users');
				return $query->result();
		}

		public function listTeamsCheckbox(){

			$query = $this->db->get('teams');
				return $query->result();
		}

		public function listTeams(){

			// $query = $this->db->get('teams');
				// return $query->result();
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

		public function saveuser($data){

			return $this->db->insert('users', $data);

		}

		public function saveedit($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('users', $data);

		}

		public function savePermission($data){
			foreach($data as $dados){
				 $this->db->insert('teams_users', $dados);
			}
			return;
		}

		public function listPermission($user_id){
		$this->db->select('me.usuario,classes_metodos.*');
		$this->db->from('classes_metodos');
		$this->db->join('permissoes', 'permissoes.metodo = classes_metodos.id AND permissoes.usuario = '.$usuario,'LEFT');
		$this->db->order_by('classes_metodos.classe,classes_metodos.metodo');
		return $this->db->get()->result();
		}

		// public function savePermission($user_id,$team_id){
		//   /**Delete user_id */
		//   $this->db->where('users_id',$user_id);
		//   $this->db->delete('teams_users');

		//   /**ADD team_id and user_id */
		//   $dados['users_id'] = $user_id;
		// 	foreach($team_id as $team){
		// 	$dados['teams_id'] = $team;
		// 	return $this->db->insert('teams_users', $dados);
		// 	// return $this->db->insert('teams_users', [$team,$user_id]);
		// 	}
		// }
		

	}


