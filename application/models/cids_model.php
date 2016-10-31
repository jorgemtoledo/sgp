<?php
	class Cids_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listCids(){

			$query = $this->db->get('cids');
				return $query->result();
		}

		public function get_cids($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	        $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";
	        $sql = $this->db->query("SELECT *  FROM  cids WHERE name LIKE '%{$nomebusca}%' {$inicio}");
	        $dados['inicio'] = $inicio;
	        $dados['total'] =$sql->num_rows();
	        $dados['dados'] = $sql->result_array();
	        return $dados;
   		}

		public function saveCids($data){

			return $this->db->insert('cids', $data);

		}

		public function saveGetCids($data){

			return $this->db->insert('cids', $data);

		}

		public function saveeditCids($data,$id){

			$this->db->where('id',$id);
			return $this->db->update('cids', $data);

		}

	}
