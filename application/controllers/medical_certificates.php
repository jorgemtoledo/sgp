<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical_certificates extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('excel');
    }

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}


	public function index()
	{
		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		// $situations = $this->medicalcertificates_model->listSituationsCombo();
		// $situations = $this->medicalcertificates_model->listSituationsCombo();
		// $situations = $this->medicalcertificates_model->listSituationsCombo();

		$dados = array(
						"workers"=>$workers,
						"dayOffs"=>$dayOffs,
						"typeCertificates"=>$typeCertificates,
						"cids"=>$cids,
						"doctors"=>$doctors,
						"healths"=>$healths,
		);



		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('medicalcertificates/index.php', $dados);
		$this->load->view('include/footer');
	}

	public function view()
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['day_offs'] = $this->medicalcertificates_model->listDayOffsCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates($this->uri->segment(3));

		$dados = array("day_offs"=>$this->data['day_offs'],
						"result"=>$this->data['result']
					);



		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('medicalcertificates/medicalcertificateuserview.php', $dados);
		$this->load->view('include/footer');
	}

	// 	public function review()
	// {


	// 	$this->verifcar_sessao();

	// 	$this->load->model("medicalcertificates_model");
	// 	// $companies = $this->employees_model->listCompaniesCombo();
	// 	$this->data['day_offs'] = $this->medicalcertificates_model->listDayOffsCombo();
	// 	$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates($this->uri->segment(3));
	// 	$this->data['result2'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

	// 	$dados = array("day_offs"=>$this->data['day_offs'],
	// 					"result"=>$this->data['result'],
	// 					"result2"=>$this->data['result2'],
	// 				);



	// 	$this->load->view('include/header');
	// 	$this->load->view('include/menu_top');
	// 	$this->load->view('include/menu');
	// 	$this->load->view('medicalcertificates/medicalcertificateuserreview.php', $dados);
	// 	$this->load->view('include/footer');
	// }


	public function listmedicalcertificates($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");

		$busca = $this->medicalcertificates_model->get_medicalcertificates();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/medical_certificates/listmedicalcertificates?busca='.$busca.'&') :
                 base_url('/medical_certificates/listmedicalcertificates?');


		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Funcionario atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==7) {
			$data['msg'] = "Médico ou CRM já cadastrado no sistema!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==8) {
			$data['msg'] = "OK, verificação dos dados junto ao PONTO!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==9) {
			$data['msg'] = "Erro!";
			$this->load->view('include/msg_error',$data);
		}

		/**Paginação*/
                $get_total_results = $this->medicalcertificates_model->get_medicalcertificates($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 100);


                $get_users = $this->medicalcertificates_model->get_medicalcertificates($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('medicalcertificates/listmedicalcertificates',
                         array(
			                     "medicalcertificates"=>$get_users['dados'],
			                     'busca'=>$busca,
			                     "pag"=>$get_paginacao['paginacao'])
                         );

            /*Paginação*/

		$this->load->view('include/footer');
	}


	/*Funcao generica */
	public function paginacao_func($url_pagination, $total_resultados,$resultados_per_pagina=10)
	{
			$config['base_url'] = $url_pagination;

            $config['total_rows'] = $total_resultados;
            $config['per_page'] = $resultados_per_pagina;
            $config['page_query_string'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Primeiro';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['last_link'] = 'Último';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="current"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $qtidade = $config['per_page'];
            $this->pagination->initialize($config);

            $dados['qtidade_re'] = $qtidade;
            $dados['inicio'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') :  '0';
            $dados['paginacao'] = $this->pagination->create_links();
            return $dados;

	}



    public function GetCountryName()
	{
		$this->verifcar_sessao();
		$this->load->model("medicalcertificates_model");
		$keyword=$this->input->post('keyword');
        $data=$this->medicalcertificates_model->GetRowCid($keyword);
        echo json_encode($data);

	}

	public function GetDoctorName()
	{
		$this->verifcar_sessao();
		$this->load->model("medicalcertificates_model");
		$keyword=$this->input->post('keyword');
        $data=$this->medicalcertificates_model->GetRowDoctor($keyword);
        echo json_encode($data);

	}

	public function GetHealthName()
	{
		$this->verifcar_sessao();
		$this->load->model("medicalcertificates_model");
		$keyword=$this->input->post('keyword');
        $data=$this->medicalcertificates_model->GetRowHealth($keyword);
        echo json_encode($data);

	}

	public function saveDayOff()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('dayoffs_model', 'model', TRUE);

			if ($this->model->saveDayOffs($data)) {
						redirect('day_offs/1');
			} else {
						redirect('day_offs/2');
			}
	}


		public function saveCid2()
		{
			$this->verifcar_sessao();

			$data['name'] = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$data['created'] = date('Y-m-d H:i:s');
			$data['modified'] = date('Y-m-d H:i:s');

			$this->load->model('cids_model', 'model', TRUE);
			$res = $this->model->saveCids($data);

			if($res){
	     	 echo json_encode(array('success'=>true));
		    }else{
		      echo json_encode(array('success'=>false));
		    }

		}

		public function savedoctor2()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['crm'] = $this->input->post('crm');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('doctors_model', 'model', TRUE);


		$this->db->where('crm', $data['crm']);
		$num_rows = $this->db->count_all_results('doctors');
		// var_dump($num_rows);
		if($num_rows > 0){
			redirect('doctors/7');
		} else {
			$res = $this->model->savedoctors($data);
			if($res){
	     	 echo json_encode(array('success'=>true));
		    }else{
		      echo json_encode(array('success'=>false));
		    }
		}

	}

		public function saveHealthStation2()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('healthstations_model', 'model', TRUE);
		$res = $this->model->saveHealthStations($data);

			if($res){
	     	 echo json_encode(array('success'=>true));
		    }else{
		      echo json_encode(array('success'=>false));
		    }
	}




		//Pega os cids autocomplete
		public function get_dados(){
	        if ( !isset($_GET['term']) )
	        exit;
	        $term = $_REQUEST['term'];
	        $this->load->model("medicalcertificates_model");
	        $data = array();
	        $rows = $this->medicalcertificates_model->get_cids($term);
	            foreach( $rows as $row )
	            {
	                $data[] = array(
	                    'label' => $row->name,
	                    'id' => $row->id,
	                    'description' => $row->description);
	            }
	        echo json_encode($data);
	        flush();
	    }

	 		//Pega os employees autocomplete
		public function get_dados_emmployees(){
	        if ( !isset($_GET['term']) )
	        exit;
	        $term = $_REQUEST['term'];
	        $this->load->model("medicalcertificates_model");
	        $data = array();
	        $rows = $this->medicalcertificates_model->get_employees($term);
	            foreach( $rows as $row )
	            {
	                $data[] = array(
	                    'label' => $row->name,
	                    'worker_id' => $row->wid,
	                    // 'mcworker_id'=>$row->workersid
	                    'id2' => $row->sumcid,
	                    'idinss' => $row->suminss,
	                    // 'idmaternity' => $row->wid,
	                    'idmaternity' => $row->summaternity,
	                    'id' => $row->countmc);
	            }
	        echo json_encode($data);
	        flush();
	    }

	public function saveMedicalCertificate()
	{
		$this->verifcar_sessao();

		//Convert date delivery_date
		$datadelivery = $this->input->post('delivery_date');
		// $datadelivery = explode('/', $datadelivery);
        // $datadelivery = $datadelivery[2].'-'.$datadelivery[1].'-'.$datadelivery[0];

		//Convert date start_certificate
		$datastart = $this->input->post('start_certificate');
		// $datastart = explode('/', $datastart);
        // $datastart = $datastart[2].'-'.$datastart[1].'-'.$datastart[0];

        //Convert date finish_certificate
		$datafinish = $this->input->post('finish_certificate');
		// $datafinish = explode('/', $datafinish);
        // $datafinish = $datafinish[2].'-'.$datafinish[1].'-'.$datafinish[0];



		$data['worker_id'] = $this->input->post('worker_id');
		$data['delivery_date'] = $datadelivery;
		$data['start_certificate'] = $datastart;
		$data['finish_certificate'] = $datafinish;
		$data['number_day'] = $this->input->post('number_day');
		$data['accredit'] = $this->input->post('accredit');
		$data['inss'] = $this->input->post('inss');
		$data['maternity_leave'] = $this->input->post('maternity_leave');
		// $data['feedback'] = $this->input->post('feedback');
		$data['day_off_id'] = $this->input->post('day_off_id');
		$data['type_certificate_id'] = $this->input->post('type_certificate_id');
		$data['cid_id'] = $this->input->post('cid_id');
		$data['doctor_id'] = $this->input->post('doctor_id');
		$data['health_station_id'] = $this->input->post('health_station_id');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('medicalcertificates_model', 'model', TRUE);

			if ($this->model->saveMedicalCertificates($data)) {
						redirect('medical_certificates/listmedicalcertificates/1');
			} else {
						redirect('medical_certificates/listmedicalcertificates/2');
			}
	}



	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('medical_certificates')) {
						redirect('medical_certificates/listmedicalcertificates/3');
			} else {
						redirect('medical_certificates/listmedicalcertificates/4');
			}
	}

	public function feedback($id=null)
	{
		$this->verifcar_sessao();

		// $this->db->update('medical_certificates', $data);
		// $this->db->set('field', 'field+1');
			// $this->db->where('id', 2);
			// $this->db->update('mytable');

		$this->db->set('feedback', '1');
		$this->db->where('id',$id);
		if ($this->db->update('medical_certificates')) {
						redirect('medical_certificates/listmedicalcertificates/8');
			} else {
						redirect('medical_certificates/listmedicalcertificates/9');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates($this->uri->segment(3));

		// $situations = $this->medicalcertificates_model->listSituationsCombo();
		// $situations = $this->medicalcertificates_model->listSituationsCombo();
		// $situations = $this->medicalcertificates_model->listSituationsCombo();

		$dados = array(
						"workers"=>$workers,
						"dayOffs"=>$dayOffs,
						"typeCertificates"=>$typeCertificates,
						"cids"=>$cids,
						"doctors"=>$doctors,
						"healths"=>$healths,
						"result"=>$this->data['result']
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('medicalcertificates/editmedicalcertificates.php', $dados);
		$this->load->view('include/footer');
	}

	public function review($id=null)
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

		$dados = array(
						"result"=>$this->data['result'],
						"typeCertificates"=>$typeCertificates
					);



		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('medicalcertificates/medicalcertificateuserreview.php', $dados);
		$this->load->view('include/footer');
	}

	public function reviewall($id=null)
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

		$dados = array("result"=>$this->data['result'], "typeCertificates"=>$typeCertificates	);

		$this->load->view('include/headerpopup');
		$this->load->view('medicalcertificates/medicalcertificateuserreviewall.php', $dados);
		$this->load->view('include/footer');
	}

	public function reviewallMonth($month=null,$yearmedicalcertificates=null,$team=null)
	{
		$this->verifcar_sessao();

		$this->load->model("teams_model");

		$this->db->select('
		   mc.id as mcid,
	                mc.user_id as mcuser,
	                mc.worker_id as mcworker,
	                mc.delivery_date as mcdeliverydate,
	                mc.start_certificate as mcstartcertificate,
	                mc.finish_certificate as mcfinishcertificate,
	                mc.day_off_id as mcdayoffid,
	                mc.number_day as mcnumberday,
	                mc.type_certificate_id as mctypecertificate,
	                mc.cid_id as mccid,
	                mc.accredit as mcaccredit,
	                mc.doctor_id as mcdoctor,
	                mc.health_station_id as mchealthstation,
	                mc.description as mcdescription,
	                mc.created as mccreated,
	                mc.modified as mcmodified,

	                tp.id as tpid,
	                tp.name as tpname,

	                d.id as did,
	                d.name as dname,
	                d.crm as dcrm,

	                hs.id as hsid,
	                hs.name as hsname,

	                do.id as doid,
	                do.name as doname,

	                c.id as cid,
	                c.name as cname,
	                c.description as cdescription,

	                w.id as wid,
	                w.team_id as wteam,
	                w.user_id as wuser,
	                w.employee_id as wemployee,
	                w.active as wactive,

	                u.id as uid,
	                u.name as uname,
	                u.level as ulevel,

	                t.id as tid,
	                t.name as tname,

	                e.id as eid,
	                e.name as ename
		');
		// $this->db->where('id',$team);
		$this->db->where('w.team_id',$team);
		$this->db->where($month, 'MONTH(mc.start_certificate)' , FALSE);
		$this->db->where($yearmedicalcertificates, 'YEAR(mc.start_certificate)' , FALSE);
		$this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
	             $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
	             $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
	             $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
	             $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
	             $this->db->join('users as u', 'u.id = mc.user_id','inner');
	             $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
	             $this->db->join('teams as t', 't.id = w.team_id','inner');
	             $this->db->join('employees as e', 'e.id = w.employee_id','inner');
	             $this->db->order_by("e.name", "asc");
		$data['results'] = $this->db->get('medical_certificates as mc')->result();
		$month= $month;
		$yearmedicalcertificates= $yearmedicalcertificates;

		$data['dados'] = array("month"=>$month, 'yearmedicalcertificates'=>$yearmedicalcertificates);

		$this->load->view('include/headerpopup');
		$this->load->view('medicalcertificates/mcurallMonth.php', $data);
		$this->load->view('include/footer');
	}

	public function reviewblood($id=null)
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

		$dados = array(
						"result"=>$this->data['result'],
						"typeCertificates"=>$typeCertificates
					);



		$this->load->view('include/headerpopup');
		$this->load->view('medicalcertificates/medicalcertificateuserreviewblood.php', $dados);
		$this->load->view('include/footer');
	}

	public function reviewinss($id=null)
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

		$dados = array(
						"result"=>$this->data['result'],
						"typeCertificates"=>$typeCertificates
					);



		$this->load->view('include/headerpopup');
		$this->load->view('medicalcertificates/medicalcertificateuserreviewinss.php', $dados);
		$this->load->view('include/footer');
	}

	public function reviewmaternity($id=null)
	{


		$this->verifcar_sessao();

		$this->load->model("medicalcertificates_model");
		$workers = $this->medicalcertificates_model->listWorkersCombo();
		$dayOffs = $this->medicalcertificates_model->listDayOffsCombo();
		$typeCertificates = $this->medicalcertificates_model->listTypeCertificatesCombo();
		$cids = $this->medicalcertificates_model->listTypeCidsCombo();
		$doctors = $this->medicalcertificates_model->listTypeDoctorsCombo();
		$healths = $this->medicalcertificates_model->listTypeHealthCombo();
		$this->data['result'] = $this->medicalcertificates_model->listEditMedicalCertificates2($this->uri->segment(3));

		$dados = array(
						"result"=>$this->data['result'],
						"typeCertificates"=>$typeCertificates
					);



		$this->load->view('include/headerpopup');
		$this->load->view('medicalcertificates/medicalcertificateuserreviewmaternity.php', $dados);
		$this->load->view('include/footer');
	}





	public function saveEditMedicalCertificate()
	{
		$this->verifcar_sessao();

		//Convert date delivery_date
		$datadelivery = $this->input->post('delivery_date');
		$datadelivery = explode('/', $datadelivery);
        $datadelivery = $datadelivery[2].'-'.$datadelivery[1].'-'.$datadelivery[0];

		//Convert date start_certificate
		$datastart = $this->input->post('start_certificate');
		$datastart = explode('/', $datastart);
        $datastart = $datastart[2].'-'.$datastart[1].'-'.$datastart[0];

        //Convert date finish_certificate
		$datafinish = $this->input->post('finish_certificate');
		$datafinish = explode('/', $datafinish);
        $datafinish = $datafinish[2].'-'.$datafinish[1].'-'.$datafinish[0];


        $id = $this->input->post('id');
		// $data['worker_id'] = $this->input->post('worker_id');
		$data['delivery_date'] = $datadelivery;
		$data['start_certificate'] = $datastart;
		$data['finish_certificate'] = $datafinish;
		$data['number_day'] = $this->input->post('number_day');
		$data['accredit'] = $this->input->post('accredit');
		$data['maternity_leave'] = $this->input->post('maternity_leave');
		$data['inss'] = $this->input->post('inss');
		$data['day_off_id'] = $this->input->post('day_off_id');
		$data['type_certificate_id'] = $this->input->post('type_certificate_id');
		$data['cid_id'] = $this->input->post('cid_id');
		$data['doctor_id'] = $this->input->post('doctor_id');
		$data['health_station_id'] = $this->input->post('health_station_id');
		$data['description'] = $this->input->post('description');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('medicalcertificates_model', 'model', TRUE);

			if ($this->model->saveeditMedicalCertificates($data,$id)) {
						redirect('medical_certificates/listmedicalcertificates/1');
			} else {
						redirect('medical_certificates/listmedicalcertificates/2');
			}
	}

	public function view_excel()
	{
	$this->verifcar_sessao();
	$this->load->model("medicalcertificates_model");
	$medicalcertificates = $this->medicalcertificates_model->listMedicalCertificatesExcel();

	$dados = array(
		"medicalcertificates"=>$medicalcertificates
	);

	// echo "<pre>";
	// 	print_r($dados);
	// 	echo "</pre>";
	// 	die();


	$this->load->view('include/headerpopup');
	$this->load->view('medicalcertificates/view_excel',$dados);
	$this->load->view('include/footer');
	}


	public function exp_excel(){

		 $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('lista');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Atestados Contato');
                $this->excel->getActiveSheet()->setCellValue('A3', 'Matricula');
                $this->excel->getActiveSheet()->setCellValue('B3', 'Nome do Funcionario');
                $this->excel->getActiveSheet()->setCellValue('C3', 'Equipe/Setor');
                $this->excel->getActiveSheet()->setCellValue('D3', 'Nr Atestado');
                $this->excel->getActiveSheet()->setCellValue('E3', 'Tipo Atestado');
                $this->excel->getActiveSheet()->setCellValue('F3', 'Data Entrega');
                $this->excel->getActiveSheet()->setCellValue('G3', 'Data Inicio');
                $this->excel->getActiveSheet()->setCellValue('H3', 'Data Fim');
                $this->excel->getActiveSheet()->setCellValue('I3', 'Qtde Dias');
                $this->excel->getActiveSheet()->setCellValue('J3', 'Abona?(1->"Sim"/0->"Não)');
                $this->excel->getActiveSheet()->setCellValue('K3', 'Periodo');
                $this->excel->getActiveSheet()->setCellValue('L3', 'CID');
                $this->excel->getActiveSheet()->setCellValue('M3', 'Descriçao CID');
                $this->excel->getActiveSheet()->setCellValue('N3', 'Observacao');
                $this->excel->getActiveSheet()->setCellValue('O3', 'Medico');
                $this->excel->getActiveSheet()->setCellValue('P3', 'Posto');
                $this->excel->getActiveSheet()->setCellValue('Q3', 'Usuario');
                $this->excel->getActiveSheet()->setCellValue('R3', 'Data Criado');
                $this->excel->getActiveSheet()->setCellValue('S3', 'Data Alterado');

                $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Lista1');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Lista2');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:Q1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#FF0000');

                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('B3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('C3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('D3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('E3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('F3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('G3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('H3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('I3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('J3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('K3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('L3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('M3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('N3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('O3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('P3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('Q3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('R3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('S3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));

                // MySQL-like timestamp '2008-12-31'
				PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );

       for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                // $this->db->select('*');
                // $rs = $this->db->get('workers');

                $this->db->select('e.registration as eregistration,
                e.name as ename,
                t.name as tname,
               	mc.id as mcid,

	        	tp.name as tpname,

	        	mc.delivery_date as mcdelivery_date,
	        	mc.start_certificate as mcstart_certificate,
	        	mc.finish_certificate as mcfinish_certificate,
	        	mc.number_day as mcnumber_day,

	        	mc.accredit as mcaccredit,

	        	do.name as doname,

	        	c.name as cname,
	        	c.description as cdescription,

	        	mc.description as mcdescription,

	        	d.name as dname,

	        	hs.name as hsname,

	        	u.name as uname,

	        	mc.created as mccreated,
	        	mc.modified as mcmodified

	        	');
				$this->db->from('medical_certificates as mc');
				$this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
				 $this->db->join('doctors as d', 'd.id = mc.doctor_id','inner');
				 $this->db->join('health_stations as hs', 'hs.id = mc.health_station_id','inner');
				 $this->db->join('day_offs as do', 'do.id = mc.day_off_id','inner');
				 $this->db->join('cids as c', 'c.id = mc.cid_id','inner');
				 $this->db->join('users as u', 'u.id = mc.user_id','inner');
				 $this->db->join('workers as w', 'w.id = mc.worker_id','inner');
				 $this->db->join('teams as t', 't.id = w.team_id','inner');
				 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
				$rs = $this->db->get();

                $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $filename='Lista.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');

	}


}
