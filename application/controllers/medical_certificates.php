<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical_certificates extends CI_Controller {

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
		$this->load->view('medicalcertificates/editmedicalcertifficates.php', $dados);
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

}
