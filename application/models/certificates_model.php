<?php
	class Certificates_model extends CI_Model{

		public function __construct() {
        parent::__construct();
    }

		public function listCertificates(){

			date_default_timezone_set('America/Campo_Grande');
            // $date = date('Y-m-d H:i');
            $datefirst = date('d-m-Y');
            echo $datefirst . "<br />";

            $datefinish = date('d-m-Y');
            echo $datefinish . "<br />";

			$this->db->where('order_date >=', $first_date);
			$this->db->where('order_date <=', $second_date);

			$query = $this->db->get('type_attendances');

			start_certificate

			finish_certificate

			return $this->db->get('orders');

			$query = $this->db->get('type_attendances');
				return $query->result();
		}



	}
