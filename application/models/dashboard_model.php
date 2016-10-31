<?php
	class Dashboard_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function est_employees(){
		$consulta = "SELECT count(*) as quantos FROM employees";
		$contagem = $this->db->query($consulta)->result();
		$dados['employees'] = $contagem[0]->quantos;
		return $dados;
	}

	public function est_companies(){
		$consulta = "SELECT count(*) as quantos FROM companies";
		$contagem = $this->db->query($consulta)->result();
		$dados['companies'] = $contagem[0]->quantos;
		return $dados;
	}


	public function est_operations(){
		$consulta = "SELECT count(*) as quantos FROM operations";
		$contagem = $this->db->query($consulta)->result();
		$dados['operations'] = $contagem[0]->quantos;
		return $dados;
	}


	public function est_teams(){
		$consulta = "SELECT count(*) as quantos FROM teams";
		$contagem = $this->db->query($consulta)->result();
		$dados['teams'] = $contagem[0]->quantos;
		return $dados;
	}


	public function level_user($id){
		$this->db->where('id',$id);
		return $this->db->get('users')->result();
	}


	}
