<?php
    class Experiences_model extends CI_Model{

        public function __construct() {
        parent::__construct();
    }

        public function experListOne($listTeams = null){

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
                E.experience1 as eexperience1,
                W.id as wid,
                W.team_id as wteam,
                W.employee_id as wemployee,
                T.id as tid,
                T.name as tname,
                C.name as cname,
                S.name as sname,
                J.id as jid,
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
             $this->db->where('E.experience1', NULL);
             $this->db->where("DATEDIFF(NOW(), E.hire_date ) BETWEEN 1 AND 60");
             $this->db->where_in('T.id', $listTeams);
             $this->db->order_by("ehiredate", 'ASC');
             $query = $this->db->get();
             return $query->result();
        }

        // List experience to finish or edit
        public function listExperiencesOne(){
            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.description_coord1 as edescriptioncoord1,
                E.date_coord1 as edatecoord1,
                E.rh_approved1 as erhapproved1,
                E.description_rh1 as edescriptionrh1,
                E.date_rh1 as edaterh1,
                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.description_coord2 as edescriptioncoord2,
                E.date_coord2 as edatecoord2,
                E.rh_approved2 as erhapproved2,
                E.description_rh2 as edescriptionrh2,
                E.date_rh2 as edaterh2,
                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 0);

             $this->db->order_by("eid", 'ASC');
             $query = $this->db->get();
             return $query->result();
        }


        // List experience to finish or edit RH
        public function listExperiencesOneRH(){
            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.description_coord1 as edescriptioncoord1,
                E.date_coord1 as edatecoord1,
                E.rh_approved1 as erhapproved1,
                E.description_rh1 as edescriptionrh1,
                E.date_rh1 as edaterh1,
                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.description_coord2 as edescriptioncoord2,
                E.date_coord2 as edatecoord2,
                E.rh_approved2 as erhapproved2,
                E.description_rh2 as edescriptionrh2,
                E.date_rh2 as edaterh2,
                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 0);
             $this->db->where_in('E.finish_pediod_coord1', array('1','2'));

             $this->db->order_by("eid", 'ASC');
             $query = $this->db->get();
             return $query->result();
        }

        // List experience to coord or edit
        public function listExperiencesCoordOne($id=null){
            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.description_coord1 as edescriptioncoord1,
                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.description_coord2 as edescriptioncoord2,
                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 0);
             $this->db->where('E.coordinator_id1',$id);

             $this->db->order_by("eid", 'ASC');
             $query = $this->db->get();
             return $query->result();
        }


        // List experience to finish
        public function listFinishOne($listTeams = null){
            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.rh_approved1 as erh_approved1,
                E.description_coord1 as edescriptioncoord1,

                E.date_coord1 as edate_coord1,
                E.finish_pediod_coord1 as efinish_pediod_coord1,
                E.id_rh1 as eid_rh1,
                E.rh_approved1 as erh_approved1,
                E.description_rh1 as edescription_rh1,
                E.reason_experience_rh1 as ereason_experience_rh1,
                E.date_rh1 as edate_rh1,

                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.rh_approved2 as erh_approved2,
                E.description_coord2 as edescriptioncoord2,

                E.date_coord2 as edate_coord2,
                E.finish_pediod_coord2 as efinish_pediod_coord2,
                E.id_rh2 as eid_rh2,
                E.rh_approved2 as erh_approved2,
                E.description_rh2 as edescription_rh2,
                E.reason_experience_rh2 as ereason_experience_rh2,
                E.date_rh2 as edate_rh2,

                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Urh.id as urhid,
                Urh.name as urhname,

                Ucoord.id as ucoordid,
                Ucoord.name as ucoordname,

                Usupv.id as usupvid,
                Usupv.name as usupvname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('users as Ucoord', 'Ucoord.id = E.coordinator_id1','inner');
             $this->db->join('users as Usupv', 'Usupv.id = E.supervisor_id1','inner');
             $this->db->join('users as Urh', 'Urh.id = E.id_rh1','inner');
             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 1);
             $this->db->where_in('T.id', $listTeams);

             $this->db->order_by("eid", 'ASC');
             $query = $this->db->get();
             return $query->result();
        }

        public function listEditExperience($id){
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
                J.id as jid,
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
             $this->db->where('E.id',$id);
             $this->db->limit(1);
             return $this->db->get()->row();
        }

        public function editExperiencesOne($id){
            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.description_coord1 as edescriptioncoord1,
                E.date_coord1 as edatecoord1,
                E.rh_approved1 as erhapproved1,
                E.description_rh1 as edescriptionrh1,
                E.date_rh1 as edaterh1,
                E.reason_experience_rh1 as ereassonrh1,
                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.description_coord2 as edescriptioncoord2,
                E.date_coord2 as edatecoord2,
                E.rh_approved2 as erhapproved2,
                E.description_rh2 as edescriptionrh2,
                E.date_rh2 as edaterh2,
                E.reason_experience_rh2 as ereassonrh2,
                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Usupv.id as usupvid,
                Usupv.name as usupvname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,
                Emp.registration as empregistration,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('users as Usupv', 'Usupv.id = E.supervisor_id1','inner');
             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 0);
             $this->db->where('E.id',$id);
             $this->db->order_by("eid", 'ASC');
             $this->db->limit(1);
             return $this->db->get()->row();
        }

         public function viewExperiencesOne($id){

            $this->db->select(
                'E.id as eid,
                E.user_id as euser,
                E.worker_id as eworker,
                E.hire_date as ehiredate,
                E.final_experience as efinal_eperience,
                E.sales1 as esale1,
                E.sales2 as esale2,
                E.sales3 as esale3,
                E.period1 as eperiod1,
                E.coordinator_id1 as ecoordinatorid1,
                E.supervisor_id1 as esupervisor1,
                E.team_id1 as eteam1,
                E.description_sales1 as edescriptionsales1,
                E.description_behavioral1 as edescriptionbehavioral1,
                E.description_attendance1 as edescriptionattendance1,
                E.description_quality1 as edescriptionquality1,
                E.value_quality1 as evaluequality1,
                E.value_quality2 as evaluequality2,
                E.value_quality3 as evaluequality3,
                E.average_quality1 as eaveragequality1,
                E.description_measure1 as edescriptionmeasure1,
                E.sup_approved1 as esupapproved1,
                E.description_sup1 as edescriptionsup1,
                E.coord_approved1 as ecoordapproved1,
                E.description_coord1 as edescriptioncoord1,
                E.date_coord1 as edatecoord1,
                E.rh_approved1 as erhapproved1,
                E.description_rh1 as edescriptionrh1,
                E.date_rh1 as edaterh1,
                E.reason_experience_rh1 as ereassonrh1,
                E.final_experience1 as efinalexperience1,
                E.finish_pediod1 as efinishperiod1,
                E.accomplished_date1 as eaccomplisheddate1,
                E.period2 as eperiod2,
                E.coordinator_id2 as ecoordinator2,
                E.supervisor_id2 as esupervisor2,
                E.team_id2 as eteam2,
                E.description_sales2 as edescriptionsales2,
                E.description_behavioral2 as edescriptionbehavioral2,
                E.description_attendance2 as edescriptionattendances2,
                E.description_quality2 as edescriptionquality2,
                E.value_quality4 as evaluequality4,
                E.value_quality5 as evaluequality5,
                E.value_quality6 as evaluequality6,
                E.average_quality2 as eaveragequality2,
                E.description_measure2 as edescriptionmeasure2,
                E.sup_approved2 as esupapproved2,
                E.description_sup2 as edescriptionsup2,
                E.coord_approved2 as ecoordapproved2,
                E.description_coord2 as edescriptioncoord2,
                E.date_coord2 as edatecoord2,
                E.rh_approved2 as erhapproved2,
                E.description_rh2 as edescriptionrh2,
                E.date_rh2 as edaterh2,
                E.reason_experience_rh2 as ereassonrh2,
                E.start_experience2 as estartexperience2,
                E.final_experience2 as efinalexperience2,
                E.finish_pediod2 as efinishperiod2,
                E.accomplished_date2 as eaccomplisheddate2,
                W.id as wid,
                W.employee_id as wemployee,

                U.id as uid,
                U.name as uname,

                Usupv.id as usupvid,
                Usupv.name as usupvname,

                Emp.id as empid,
                Emp.name as empname,
                Emp.situation_id as empsituation,
                Emp.registration as empregistration,

                J.id as jid,
                J.name as jname,

                T.id as tid,
                T.name as tname,

                S.id as sid,
                S.name as sname
               ');
             $this->db->from('experiences as E');
             $this->db->join('workers as W', 'W.id = E.worker_id');
             $this->db->join('users as U', 'U.id = E.user_id','inner');
             $this->db->join('users as Usupv', 'Usupv.id = E.user_id','inner');

             $this->db->join('employees as Emp', 'Emp.id = W.employee_id','inner');
             $this->db->join('jobs as J', 'J.id = Emp.job_id','inner');
             $this->db->join('teams as T', 'T.id = W.team_id','inner');
             $this->db->join('situations as S', 'S.id = Emp.situation_id','inner');
             $this->db->where('Emp.situation_id', 1);
             $this->db->where('E.finish_pediod1', 1);
             $this->db->where('E.id',$id);
             $this->db->order_by("E.id", 'ASC');
             $this->db->limit(1);
             return $this->db->get()->row();
        }



        public function listCoordenator(){
            $this->db->select(
                'U.id as uid,
                 U.name as uname,
                 U.email as uemail,
                 U.level as ulevel');
             $this->db->from('users as U');
             $ids = array(1,3);
             $this->db->where_in('U.level',$ids);
             $this->db->order_by("uname", "ASC");
             $query = $this->db->get();
             return $query->result();
        }

        // public function attendances($worker_id){
        //     $this->db->where('worker_id',$worker_id);
        //     return $this->db->get('attendances')->result();
        // }

         public function type_attendances(){
            return $this->db->get('type_attendances')->result();
        }

        public function attendances($worker_id){
            $this->db->select(
                'T.id,
                 SUM(TA.id = 1) AS count1,
                 SUM(TA.id = 2) AS count2,
                 SUM(TA.id = 3)  AS count3,
                 SUM(TA.id = 4)  AS count4,
                 SUM(TA.id = 5)  AS count5,
                 SUM(TA.id = 6)  AS count6,
                 SUM(TA.id = 7)  AS count7,
                 SUM(TA.id = 8) AS count8,
                 SUM(TA.id = 9) AS count9,
                 SUM(TA.id = 10)  AS count10
                 ');
             $this->db->from('attendances as T');
             $this->db->join('type_attendances as TA', 'TA.id = T.type_attendance_id','inner');
             // $ids = array(1,3);
             $this->db->where_in('worker_id',$worker_id);
             $this->db->order_by("id", "ASC");
             $query = $this->db->get();
             return $query->result();
        }

            public function coord_id($coord_id){
                $this->db->select(
                    'U.id as uid,
                     U.name as uname,
                     U.level as ulevel');
                 $this->db->from('users as U');
                 $this->db->where('U.id',$coord_id);
                 $query = $this->db->get();
                 return $query->result();
            }

            public function disciplinary_measures($worker_id){
            $this->db->select(
                'DM.id as dmid,
                 DM.user_id as dmuser,
                 DM.reason_measure_id as dmreason_measure,
                 DM.type_measure_id as dmtypemeasure,
                 DM.delivery_date as dmdelivery_date,
                 DM.application_date as dmapplication_date,
                 DM.occurrence_date as dmoccurrence_date,
                 DM.removal as dmremoval,
                 DM.removal_start as dmremoval_start,
                 DM.removal_finish as dmremoval_finish,
                 DM.return_date as dmreturn_date,
                 DM.description as dmdescription,
                 RM.id as rmid,
                 RM.name as rmname,
                 TM.id as tmid,
                 TM.name as tmname
                ');
             $this->db->from('disciplinary_measures as DM');
             $this->db->join('reason_measures as RM', 'RM.id = DM.reason_measure_id','inner');
             $this->db->join('type_measures as TM', 'TM.id = DM.type_measure_id','inner');
             $this->db->where_in('DM.worker_id',$worker_id);
             $this->db->order_by("DM.id", "ASC");
             $query = $this->db->get();
             return $query->result();
        }

        // List feedbacks of worker
            public function listEditFeedbacks($worker_id){

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
            $this->db->where('w.id',$worker_id);
            $this->db->order_by("f.id", "ASC");
            $query = $this->db->get();
             return $query->result();

        }

        public function listWorker($worker_id){
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
             $this->db->where('W.id',$worker_id);
             $query = $this->db->get();
             return $query->result();
        }

        public function saveeditemployeesExperience($data2,$id){

        // echo "<pre>";
        // var_dump($data);
        // var_dump($id);
        // echo "</pre>";
        // die();

            $this->db->where('id',$id);
            return $this->db->update('employees', $data2);

        }



        public function medical_certificates($worker_id){
            $this->db->select(
                'MC.id as mcid,
                 MC.user_id as mcuser,
                 MC.worker_id as mcworker,
                 MC.delivery_date as mcdelivery,
                 MC.start_certificate as mcstart,
                 MC.finish_certificate as mcfinish,
                 MC.number_day as mcnumber_day,
                 MC.type_certificate_id as mctype_certificate,
                 MC.day_off_id as mcday_off,
                 MC.cid_id as mccid,
                 MC.accredit as mcaccredit,
                 TC.id as tcid,
                 TC.name as tcname
                ');
             $this->db->from('medical_certificates as MC');
             $this->db->join('type_certificates as TC', 'TC.id = MC.type_certificate_id','inner');
             // $this->db->join('type_measures as TM', 'TM.id = DM.type_measure_id','inner');
             $this->db->where_in('MC.worker_id',$worker_id);
             $this->db->order_by("MC.id", "ASC");
             $query = $this->db->get();
             return $query->result();
        }

        public function validate_experiences1($worker_id){
                    $this->db->where('worker_id',$worker_id);
                    return $this->db->get('experiences')->result();
         }

        public function saveexperiences1($data){
            return $this->db->insert('experiences', $data);
        }

        public function updateexperiences1($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('experiences', $data);
        }




    }
