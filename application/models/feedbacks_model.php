<?php
	class Feedbacks_model extends CI_Model{

		public function __construct() {
        		parent::__construct();
    	}

		public function listTypeFeedback(){
			$this->db->order_by("name", "ASC");
			$query = $this->db->get('type_feedbacks');
				return $query->result();
		}

		public function saveTypeFeedback($data){
		 	return $this->db->insert('type_feedbacks', $data);
		 }

		 public function saveEditTypefeed($data,$id){
		            $this->db->where('id',$id);
		            return $this->db->update('type_feedbacks', $data);
		 }

		  public function get_feedbacks($nomebusca=null,$inicio=NULL,$quantidade=NULL){
	                $inicio = $inicio != NULL ? "LIMIT {$inicio},{$quantidade}" : "";
	                $sql = $this->db->query(
	                    "SELECT
	                    e.id as eid,
	                    e.name as ename,
	                    e.company_id as ecompany,
	                    e.job_id as ejob,
	                    e.situation_id as esituation,
	                    e.user_id as euser,
	                    j.name as jname,
	                    c.id as cid,
	                    c.name as cname,
	                    s.id as sid,
	                    s.name as sname,
	                    j.id as jid,
	                    j.name as jname,
	                    u.id as uid,
	                    u.name as uname,
	                    w.id as wid,
	                    w.team_id as wteam,
	                    w.user_id as wuser,
	                    w.employee_id as wemployee,
	                    w.active as wactive,


	                    f.id as fid,
	                    f.manager as fmanager,
	                    f.worker_id as fworker,
	                    f.type_feedback_id as ftypefeedback,
	                    f.strengths as fstrengths,
	                    f.improvements as fimprovements,
	                    f.feed_manager as ffeedmanager,
	                    f.created as fcreated,
	                    f.modified as fmodified,

	                    tp.id as tpid,
		       tp.name as tpname

	                    FROM  employees e
	                    INNER JOIN companies c ON c.id = e.company_id
	                    INNER JOIN situations s ON s.id = e.situation_id
	                    INNER JOIN jobs j ON j.id = e.job_id
	                    INNER JOIN users u ON u.id = e.user_id
	                    INNER JOIN workers w ON w.employee_id = e.id

	                    INNER JOIN feedbacks f ON f.worker_id = w.id
		       INNER JOIN type_feedbacks tp ON tp.id = f.type_feedback_id


	                    WHERE e.name LIKE '%{$nomebusca}%' OR tp.name LIKE '%{$nomebusca}%'  OR f.manager  LIKE '%{$nomebusca}%'  ORDER BY f.id DESC, e.name DESC  {$inicio}");

	                    $dados['inicio'] = $inicio;
	                    $dados['total'] =$sql->num_rows();
	                    $dados['dados'] = $sql->result_array();
	                    return $dados;
	        }

	        public function listTypeFeedbackCombo(){
			$this->db->order_by("name", "ASC");
			$query = $this->db->get('type_feedbacks');
				return $query->result();
	       }

	      public function saveFeedbacks($data){
	            return $this->db->insert('feedbacks', $data);
	      }

	       public function listEditFeedbacks($id){
	            $this->db->select(
	                   'f.id as fid,
	                    f.manager as fmanager,
	                    f.worker_id as fworker,
	                    f.type_feedback_id as ftypefeedback,
	                    f.strengths as fstrengths,
	                    f.improvements as fimprovements,
	                    f.feed_manager as ffeedmanager,
	                    f.user_id as fuser_id,
	                    f.created as fcreated,
	                    f.modified as fmodified,

	                    tp.id as tpid,
	                    tp.name as tpname,


	                    w.id as wid,
	                    w.team_id as wteam,
	                    w.user_id as wuser,
	                    w.employee_id as wemployee,
	                    w.active as wactive,

		       e.id as eid,
	                    e.name as ename,
	                    e.company_id as ecompany,
	                    e.registration as eregistration,
	                    e.job_id as ejob,
	                    e.situation_id as esituation,
	                    e.user_id as euser,

	                    u.id as uid,
	                    u.name as uname,
	                    u.level as ulevel,

	                    s.id as sid,
	                    s.name as sname ');
	             $this->db->from('feedbacks as f');
	             $this->db->join('workers as w', 'w.id = f.worker_id','inner');
	             $this->db->join('type_feedbacks as tp', 'tp.id = f.type_feedback_id','inner');
	             $this->db->join('employees as e', 'e.id = w.employee_id','inner');
	             $this->db->join('situations as s ', 's.id = e.situation_id','inner');
	             $this->db->join('users as u ', 'u.id = f.user_id','inner');

	             $this->db->where('f.id',$id);
	             $this->db->limit(1);
	             return $this->db->get()->row();
        		}


	        // List measures of worker
	        public function listEditFeedbacks2($id){

		$this->db->select(
		'f.id as fid,
		f.manager as fmanager,
		f.worker_id as fworker,
		f.type_feedback_id as ftypefeedback,
		f.strengths as fstrengths,
		f.improvements as fimprovements,
		f.feed_manager as ffeedmanager,
		f.user_id as fuser_id,
		f.created as fcreated,
		f.modified as fmodified,

		tp.id as tpid,
                    	tp.name as tpname,

		w.id as wid,
		w.team_id as wteam,
		w.user_id as wuser,
		w.employee_id as wemployee,
		w.active as wactive,

		e.id as eid,
		e.name as ename,
		e.company_id as ecompany,
		e.registration as eregistration,
		e.job_id as ejob,
		e.situation_id as esituation,
		e.user_id as euser,

		U.id as uid,
		U.name as uname,
		T.id as tid,
		T.name as tname');
		$this->db->from('feedbacks as f');
		$this->db->join('workers as w', 'w.id = f.worker_id','inner');
		$this->db->join('employees as e', 'e.id = w.employee_id','inner');
		$this->db->join('type_feedbacks as tp', 'tp.id = f.type_feedback_id','inner');

		$this->db->join('users as U', 'U.id = f.user_id','inner');
		$this->db->join('teams as T', 'T.id = w.team_id','inner');
		$this->db->where('w.id',$id);
		// $this->db->where('mc.worker_id',$id);
		return $this->db->get()->result();

	        }

	        public function saveEditFeedbacks($data, $id){
	        	$this->db->where('id',$id);
            		return $this->db->update('feedbacks', $data);
	      }





}
