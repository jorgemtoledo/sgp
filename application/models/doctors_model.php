<?php
	class Doctors_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listDoctors(){

			$query = $this->db->get('doctors');
				return $query->result();
		}

		public function get_doctors($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";

	        $sql = $this->db->query(
	        	"SELECT * FROM  doctors
	        	WHERE name LIKE '%{$nomebusca}%' OR crm LIKE '%{$nomebusca}%' {$inicio}");
	        $dados['inicio'] = $inicio;
	        $dados['total'] =$sql->num_rows();
	        $dados['dados'] = $sql->result_array();    
	        return $dados;


   		}

		public function savedoctors($data){

			return $this->db->insert('doctors', $data);

		}

		public function saveeditdoctors($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('doctors', $data);

		}

	}


