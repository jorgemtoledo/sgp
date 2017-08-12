<?php
    class Measures_model extends CI_Model{

        public function __construct() {
        parent::__construct();
    }

        // public function listCompanies(){
        //     $query = $this->db->get('companies');
        //         return $query->result();
        // }

        // public function savecompanies($data){
        //     return $this->db->insert('companies', $data);
        // }

        // public function saveeditcompanies($data,$id){
        //     $this->db->where('id',$id);
        //     return $this->db->update('companies', $data);
        // }

        public function listReason(){
            $query = $this->db->get('reason_measures');
                return $query->result();
        }

        public function saveReason($data){
            return $this->db->insert('reason_measures', $data);
        }

        public function saveeditReason($data,$id){

            $this->db->where('id',$id);
            return $this->db->update('reason_measures', $data);

        }


        public function listTypeMeasures(){
            $query = $this->db->get('type_measures');
                return $query->result();
        }

        public function saveTypeMeasure($data){
            return $this->db->insert('type_measures', $data);
        }

        public function saveeditTypeMeasure($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('type_measures', $data);
        }

        public function get_measures($nomebusca=null,$inicio=NULL,$quantidade=NULL){
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
                    dm.id as dmid,
                    dm.user_id as dmuser,
                    dm.worker_id as dmworker,
                    dm.reason_measure_id as dmreasonmeasure,
                    dm.type_measure_id as dmtypemeasue,
                    dm.delivery_date as dmdeliverydate,
                    dm.application_date as dmapplicationdate,
                    dm.occurrence_date as dmoccurrencedate,
                    dm.removal as dmremoval,
                    dm.removal_start as dmremovalstart,
                    dm.removal_finish as dmremovalfinish,
                    dm.return_date as dmreturndate,
                    dm.description as dmdescription,
                    dm.created as dmcreated,
                    dm.modified as dmmodified,
                    rm.id as rmid,
                    rm.name as rmname,
                    tm.id as tmid,
                    tm.name as tmname
                    FROM  employees e
                    INNER JOIN companies c ON c.id = e.company_id
                    INNER JOIN situations s ON s.id = e.situation_id
                    INNER JOIN jobs j ON j.id = e.job_id
                    INNER JOIN users u ON u.id = e.user_id
                    INNER JOIN workers w ON w.employee_id = e.id
                    INNER JOIN disciplinary_measures dm ON dm.worker_id = w.id
                    INNER JOIN reason_measures rm ON rm.id = dm.reason_measure_id
                    INNER JOIN type_measures tm ON tm.id = dm.type_measure_id

                    WHERE e.name LIKE '%{$nomebusca}%' OR tm.name LIKE '%{$nomebusca}%' ORDER BY dm.id DESC, e.name DESC  {$inicio}");

                    $dados['inicio'] = $inicio;
                    $dados['total'] =$sql->num_rows();
                    $dados['dados'] = $sql->result_array();
                    return $dados;
        }

        public function exp_excel(){
            $this->db->select('
                e.registration as eregistration,
                e.name as ename,
                t.name as tname,
                dm.id as dmid,
                dm.application_date as dmapplicationdate,
                dm.occurrence_date as dmoccurrencedate,
                tm.name as tmname,
                rm.name as rmname,
                dm.removal_start as dmremovalstart,
                dm.removal_finish as dmremovalfinish,
                dm.removal as dmremoval,
                dm.return_date as dmreturndate,
                dm.delivery_date as dmdeliverydate,
                dm.description as dmdescription,
                u.name as uname,
                dm.created as dmcreated,
                dm.modified as dmmodified
                ');
                 $this->db->from('disciplinary_measures as dm');
                 $this->db->join('workers as w', 'w.id = dm.worker_id','inner');
                 $this->db->join('users as u', 'u.id = dm.user_id','inner');
                 $this->db->join('teams as t', 't.id = w.team_id','inner');
                 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
                 $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
                 $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');
                 // $this->db->limit(1500);
                 $this->db->order_by("dm.id ", "DESC");
                 $query = $this->db->get();
                 return $query->result();
        }

        public function saveMeasures($data){
            return $this->db->insert('disciplinary_measures', $data);
        }

        public function listEditMeasuressss($id){
                         echo "<pre>";
        print_r($id);
        echo "</pre>";
        die();
            $this->db->select(
                'e.id as eid,
                    e.name as ename,
                    e.company_id as ecompany,
                    e.job_id as ejob,
                    e.situation_id as esituation,
                    e.user_id as euser,
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
                    dm.id as dmid,
                    dm.user_id as dmuser,
                    dm.worker_id as dmworker,
                    dm.reason_measure_id as dmreasonmeasure,
                    dm.type_measure_id as dmtypemeasue,
                    dm.delivery_date as dmdeliverydate,
                    dm.application_date as dmapplicationdate,
                    dm.occurrence_date as dmoccurrencedate,
                    dm.removal as dmremoval,
                    dm.removal_start as dmremovalstart,
                    dm.removal_finish as dmremovalfinish,
                    dm.return_date as dmreturndate,
                    dm.description as dmdescription,
                    dm.created as dmcreated,
                    dm.modified as dmmodified,
                    rm.id as rmid,
                    rm.name as rmname,
                    tm.id as tmid,
                    tm.name as tmname');
             $this->db->from('employees as e');
             $this->db->join('companies as c', 'c.id = e.company_id','inner');
             $this->db->join('situations as s ', 's.id = e.situation_id','inner');
             $this->db->join('jobs as j', 'j.id = j.id = e.job_id','inner');
             $this->db->join('users as u', 'u.id = e.user_id','inner');
             $this->db->join('workers as w', 'w.employee_id = e.id','inner');
             $this->db->join('disciplinary_measures as dm', 'dm.worker_id = w.id','inner');
             $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
             $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');
             $this->db->where('dm.id',$id);
             $this->db->limit(1);
             return $this->db->get()->row();
        }

        public function listEditMeasures($id){
            $this->db->select(
                   'dm.id as dmid,
                    dm.user_id as dmuser,
                    dm.worker_id as dmworker,
                    dm.reason_measure_id as dmreasonmeasure,
                    dm.type_measure_id as dmtypemeasue,
                    dm.delivery_date as dmdeliverydate,
                    dm.application_date as dmapplicationdate,
                    dm.occurrence_date as dmoccurrencedate,
                    dm.removal as dmremoval,
                    dm.removal_start as dmremovalstart,
                    dm.removal_finish as dmremovalfinish,
                    dm.return_date as dmreturndate,
                    dm.description as dmdescription,
                    dm.created as dmcreated,
                    dm.modified as dmmodified,
                    rm.id as rmid,
                    rm.name as rmname,
                    tm.id as tmid,
                    tm.name as tmname,

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
             $this->db->from('disciplinary_measures as dm');
             $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
             $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');
             $this->db->join('workers as w', 'w.id = dm.worker_id','inner');
             $this->db->join('employees as e', 'e.id = w.employee_id','inner');
             $this->db->join('situations as s ', 's.id = e.situation_id','inner');
             $this->db->join('users as u ', 'u.id = dm.user_id','inner');

             $this->db->where('dm.id',$id);
             $this->db->limit(1);
             return $this->db->get()->row();
        }

        public function listEditMeasures2($id){
            $this->db->select(
                   'dm.id as dmid,
                    dm.user_id as dmuser,
                    dm.worker_id as dmworker,
                    dm.reason_measure_id as dmreasonmeasure,
                    dm.type_measure_id as dmtypemeasue,
                    dm.delivery_date as dmdeliverydate,
                    dm.application_date as dmapplicationdate,
                    dm.occurrence_date as dmoccurrencedate,
                    dm.removal as dmremoval,
                    dm.removal_start as dmremovalstart,
                    dm.removal_finish as dmremovalfinish,
                    dm.return_date as dmreturndate,
                    dm.description as dmdescription,
                    dm.created as dmcreated,
                    dm.modified as dmmodified,
                    rm.id as rmid,
                    rm.name as rmname,
                    tm.id as tmid,
                    tm.name as tmname,

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
                    e.user_id as euser



                    ');
             $this->db->from('disciplinary_measures as dm');
             $this->db->join('workers as w', 'w.id = dm.worker_id','inner');
             $this->db->join('employees as e', 'e.id = w.employee_id','inner');
             $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
             $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');
             $this->db->where('w.id',$id);
             $this->db->limit(1);
             return $this->db->get()->row();
        }

        public function saveEditMeasures($data,$id){

        // echo "<pre>";
        // print_r($data);
        // print_r($id);
        // echo "</pre>";
        // die();

            $this->db->where('id',$id);
            return $this->db->update('disciplinary_measures', $data);

        }


        // List measures of worker
        public function listMeasureEmployee($id){

                $this->db->select(
                'dm.id as dmid,
                dm.user_id as dmuser,
                dm.worker_id as dmworker,
                dm.reason_measure_id as dmreasonmeasure,
                dm.type_measure_id as dmtypemeasue,
                dm.delivery_date as dmdeliverydate,
                dm.application_date as dmapplicationdate,
                dm.occurrence_date as dmoccurrencedate,
                dm.removal as dmremoval,
                dm.removal_start as dmremovalstart,
                dm.removal_finish as dmremovalfinish,
                dm.return_date as dmreturndate,
                dm.description as dmdescription,
                dm.created as dmcreated,
                dm.modified as dmmodified,
                rm.id as rmid,
                rm.name as rmname,
                tm.id as tmid,
                tm.name as tmname,

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
             $this->db->from('disciplinary_measures as dm');
             $this->db->join('workers as w', 'w.id = dm.worker_id','inner');
             $this->db->join('employees as e', 'e.id = w.employee_id','inner');
             $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
             $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');
             $this->db->join('users as U', 'U.id = dm.user_id','inner');
             $this->db->join('teams as T', 'T.id = w.team_id','inner');
             $this->db->where('w.id',$id);
             // $this->db->where('mc.worker_id',$id);
             return $this->db->get()->result();

        }



    }