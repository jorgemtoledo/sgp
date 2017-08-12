<?php
	class Certificates_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		// public function listCertificates(){

		// 	date_default_timezone_set('America/Campo_Grande');
  //           // $date = date('Y-m-d H:i');
  //           $datefirst = date('d-m-Y');
  //           echo $datefirst . "<br />";

  //           $datefinish = date('d-m-Y');
  //           echo $datefinish . "<br />";

		// 	$this->db->where('order_date >=', $first_date);
		// 	$this->db->where('order_date <=', $second_date);

		// 	$query = $this->db->get('type_attendances');

		// 	start_certificate

		// 	finish_certificate

		// 	return $this->db->get('orders');

		// 	$query = $this->db->get('type_attendances');
		// 		return $query->result();
		// }


		public function listDaysCertificates(){

			$data_atual = date('d/m/Y');
			$matricula = date ("y-m-d");
			$date_now = date('Y-m-d');

			$date_teste = '2016-05-20 00:00:00';

			$date_teste2 = '2016-07-20 00:00:00';

			// Calcula a data daqui 60 dias
			$timestamp = strtotime($matricula . "-60 days");
			$date_old = date('Y-m-d', $timestamp);
			$convert_date_old = date('d/m/Y', $timestamp);


			$this->db->select_sum('MC.number_day');
   	   		$this->db->select('
   	   			MC.id as MCID,
   	   			MC.user_id as MCUSER,
   	   			MC.worker_id as MCWORKER,
   	   			MC.delivery_date as MCDELIVERY,
   	   			MC.start_certificate as MCSTART,
   	   			MC.finish_certificate as MCFINISH,
   	   			MC.number_day as MCNUMBERDAY,
   	   			MC.type_certificate_id as MCTYPE,
   	   			MC.day_off_id as MCDAYOFF,
   	   			MC.cid_id as MCCID,
   	   			MC.accredit as MCAC,
   	   			MC.doctor_id as MCDOCT,
   	   			MC.health_station_id as MCHS,
   	   			MC.description as MCDESC,
   	   			MC.created as MCCREAT,
   	   			MC.modified as MCMOD,
   	   			MC.inss as MCINSS,
   	   			MC.maternity_leave as MCML,
   	   			MC.feedback as MCFEED,

   	   			W.id as WID,
   	   			W.employee_id as WE,
   	   			W.team_id as WTE,
   	   			W.user_id as WUSER,
   	   			W.active as WACTIVE,

   	   			E.id as EID,
   	   			E.name as ENAME,

                        T.id as TID,
                        T.name as TNAME,
                        T.operation_id as TOPERATION,

                        O.id as OID,
                        O.name as ONAME,

                        C.id as CID,
                        C.name as CNAME
 	   			');

   	   		$this->db->from('medical_certificates as MC');
   	   		$this->db->join('workers as W','W.id= MC.worker_id','inner');
                  $this->db->join('teams as T','T.id= W.team_id','inner');
                  $this->db->join('operations as O','O.id= T.operation_id','inner');
   	   		$this->db->join('employees as E','E.id= W.employee_id','inner');
                  $this->db->join('companies as C', 'C.id = E.company_id', 'inner');
   	   		$this->db->where('MC.start_certificate >=', $date_old);
			$this->db->where('MC.start_certificate <=', $date_now);
   	   		$this->db->group_by('MCWORKER');
   	   		$this->db->order_by	('number_day','DESC');
   	   		$this->db->limit(100);
			$query = $this->db->get();
				return $query->result();
		}

	}
