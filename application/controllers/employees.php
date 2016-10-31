<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("employees_model");

		$busca = $this->employees_model->get_employees();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/employees?busca='.$busca.'&') :
                 base_url('/employees?');

		// for($i=7;$i<200;$i++){
	 //                $inser_user = array(

	 //                    "name"=>"Pedrinho-{$i}",
		// 	             "cpf"=>"99999999999",
		// 			    "company_id"=>"1",
		// 				"cpf"=>"99999999999{$i}",
		// 				"job_id"=>"1",
		// 				"situation_id"=>"1",
		// 				"registration"=>"2323232{$i}",
		// 				"hire_date"=>"2016-02-01",
		// 				"workload"=>"2",
		// 				"birth_date"=>"1999-22-22",
		// 				"phone1"=>"96014181",
		// 				"phone2"=>"6796014181",
		// 				"phone3"=>"6796014181",
		// 				"description"=>"Teste - {$i}",
		// 				"resignation_date"=>"2016-03-11 15:05:48",
		// 				"created"=>"2016-03-11 15:05:48",
		// 				"modified"=>"2016-03-11 15:05:48",
		// 				"user_id" => "5"

	 //                );
	 //                 $this->db->insert('employees', $inser_user);
	 //            }
	 //            if($inser_user){
	 //                echo 'blz';
	 //            }


		// $employees = $this->employees_model->listEmployees();
		// $dados = array("employees"=>$employees);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Funcionario cadastrado com sucesso!";
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
		}

		// $this->load->view('employees/index.php',$dados);


		/**Paginação*/
                $get_total_results = $this->employees_model->get_employees($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 15);


                $get_users = $this->employees_model->get_employees($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('employees/index.php',
                         array(
			                     "employees"=>$get_users['dados'],
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



	public function add()
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");
		$employees = $this->employees_model->listEmployees();
		$companies = $this->employees_model->listCompaniesCombo();
		$jobs = $this->employees_model->listJobsCombo();
		$situations = $this->employees_model->listSituationsCombo();

		$dados = array(
						"employees"=>$employees,
						"companies"=>$companies,
						"jobs"=>$jobs,
						"situations"=>$situations
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/addemployee.php',$dados);
		$this->load->view('include/footer');
	}

		public function upload()
	{
		$this->verifcar_sessao();


		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/upload.php', array('error' => ' ' ));
		$this->load->view('include/footer');
	}

	// public function do_upload()
	// {
	// 		$config['upload_path'] = './uploads/';
	// 		$config['allowed_types'] = 'gif|jpg|png';
	// 		$config['max_size'] = '100';
	// 		$config['max_width'] = '1024';
	// 		$config['max_height'] = '768';

	// 		$this->load->library('upload', $config);

	// 		if ( ! $this->upload->do_upload())
	// 		{
	// 		$error = array('error' => $this->upload->display_errors());

	// 		 	$this->load->view('include/header');
	// 			$this->load->view('include/menu_top');
	// 			$this->load->view('include/menu');
	// 			$this->load->view('employees/upload', $error);
	// 			$this->load->view('include/footer');

	// 		}
	// 		else
	// 		{
	// 		$data = array('upload_data' => $this->upload->data());

	// 		$this->load->view('include/header');
	// 		$this->load->view('include/menu_top');
	// 		$this->load->view('include/menu');
	// 		$this->load->view('employees/upload_success.php', $data);
	// 		$this->load->view('include/footer');
	// 		}
	// 	}

		public function do_upload()
		{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
		$error = array('error' => $this->upload->display_errors());

		// $this->load->view('upload_form', $error);
		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/upload', $error);
		$this->load->view('include/footer');
		}
		else
				{
					$this->load->helper('file');
					$this->load->database();

					$dados = $this->upload->data();

					$arquivo = fopen($dados['full_path'], "r");

					$linha = 1;

					while (($data = fgetcsv($arquivo, 1000, ",")) !== FALSE) {

						if ($linha++ == 1)
							continue;

					    // $sql = "INSERT INTO TABELA(NOME, EMAIL) VALUES('". $data[0] ."', '". $data[1] ."')";

						$dados = array(
							"company_id" => $data[0],
							"job_id" => $data[1],
							"situation_id" => $data[2],
							"user_id" => $data[3],
							"name" => $data[4],
							"registration" => $data[5],
							"cpf" => $data[6],
							"hire_date" => $data[7],
							"workload" => $data[8],
							"birth_date" => $data[9],
							"phone1" => $data[10],
							"phone2" => $data[11],
							"phone3" => $data[12],
							"description" => $data[13],
							"resignation_date" => $data[14],
							"created" => $data[15],
							"modified" => $data[16]
						);

						$this->db->insert("employees", $dados);
					}

					fclose ($arquivo);

					$variaveis['status'] = "Importação concluída com sucesso.";

					$variaveis['upload_data'] = $this->upload->data();

					// $this->load->view('upload_success', $variaveis);
					$this->load->view('include/header');
					$this->load->view('include/menu_top');
					$this->load->view('include/menu');
					$this->load->view('employees/upload_success.php', $variaveis);
					$this->load->view('include/footer');
				}
			}

	public function saveemployee()
	{
		$this->verifcar_sessao();

		//Convert date hire_date
		$datahire = $this->input->post('hire_date');
		$datahire = explode('/', $datahire);
        $datahire = $datahire[2].'-'.$datahire[1].'-'.$datahire[0];

		//Convert date birth_date
		$databrith = $this->input->post('birth_date');
		$databrith = explode('/', $databrith);
        $databrith = $databrith[2].'-'.$databrith[1].'-'.$databrith[0];

        //Convert date phone1
		$dataphone1 = $this->input->post('phone1');
		$dataphone1 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone1);

		//Convert date phone2
		$dataphone2 = $this->input->post('phone2');
		$dataphone2 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone2);

		//Convert date phone3
		$dataphone3 = $this->input->post('phone3');
		$dataphone3 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone3);



		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['company_id'] = $this->input->post('company_id');
		$data['job_id'] = $this->input->post('job_id');
		$data['situation_id'] = $this->input->post('situation_id');
		$data['registration'] = $this->input->post('registration');
		$data['hire_date'] = $datahire;
		$data['workload'] = $this->input->post('workload');
		$data['birth_date'] = $databrith;
		$data['phone1'] = $dataphone1;
		$data['phone2'] = $dataphone2;
		$data['phone3'] = $dataphone3;
		$data['description'] = $this->input->post('description');
		$data['resignation_date'] = date('Y-m-d H:i:s');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->saveemployees($data)) {
						redirect('employees/1');
			} else {
						redirect('employees/2');
			}
	}

		public function delete($id=null)
		{
			$this->verifcar_sessao();

			$this->db->where('id',$id);
			if ($this->db->delete('employees')) {
							redirect('employees/3');
				} else {
							redirect('employees/4');
				}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->listEditEmployees($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/editemployee.php',$dados);
		$this->load->view('include/footer');
	}

	public function view($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->listEditEmployees($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/viewemployee.php',$dados);
		$this->load->view('include/footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();

		//Convert date hire_date
		$datahire = $this->input->post('hire_date');
		$datahire = explode('/', $datahire);
        $datahire = $datahire[2].'-'.$datahire[1].'-'.$datahire[0];

		//Convert date birth_date
		$databrith = $this->input->post('birth_date');
		$databrith = explode('/', $databrith);
        $databrith = $databrith[2].'-'.$databrith[1].'-'.$databrith[0];

        //Convert date resignation_date
		$dataresignation = $this->input->post('resignation_date');
		$dataresignation = explode('/', $dataresignation);
        $dataresignation = $dataresignation[2].'-'.$dataresignation[1].'-'.$dataresignation[0];

        //Convert date phone1
		$dataphone1 = $this->input->post('phone1');
		$dataphone1 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone1);

		//Convert date phone2
		$dataphone2 = $this->input->post('phone2');
		$dataphone2 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone2);

		//Convert date phone3
		$dataphone3 = $this->input->post('phone3');
		$dataphone3 = str_replace(array( '(', ')', ' ', '-' ), '', $dataphone3);



		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['cpf'] = $this->input->post('cpf');
		$data['company_id'] = $this->input->post('company_id');
		$data['job_id'] = $this->input->post('job_id');
		$data['situation_id'] = $this->input->post('situation_id');
		$data['registration'] = $this->input->post('registration');
		$data['hire_date'] = $datahire;
		$data['workload'] = $this->input->post('workload');
		$data['birth_date'] = $databrith;
		$data['phone1'] = $dataphone1;
		$data['phone2'] = $dataphone2;
		$data['phone3'] = $dataphone3;
		$data['description'] = $this->input->post('description');
		$data['resignation_date'] = $dataresignation;
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->saveeditemployees($data,$id)) {
						redirect('employees/5');
			} else {
						redirect('employees/6');
			}
	}

	// public function permission($user_id=null)
	// {
	// 	$this->verifcar_sessao();

	// 	$this->load->model("users_model");
	// 	$this->db->where('id',$user_id);
	// 	$data['users'] = $this->db->get('users')->result();
	// 	$users = $data['users'];

	// 	$this->db->where('user_id',$user_id);
	// 	$teams_users['teams_users'] = $this->db->get('teams_users')->result();
	// 	$teams_users = $teams_users['teams_users'];



	// 	$teams = $this->users_model->listTeams();

	// 	$dados = array("users"=>$users,"teams"=>$teams, "teams_users"=>$teams_users);

	// 	$this->load->view('include/header');
	// 	$this->load->view('include/menu_top');
	// 	$this->load->view('include/menu');
	// 	$this->load->view('users/permission.php',$dados);
	// 	$this->load->view('include/footer');
	// }


	// public function savepermission(){
	// 	$user_id = $this->input->post("id");
	// 	$this->db->where('user_id',$user_id);
	// 	$this->db->delete('teams_users');

	// 	$data = array();
	// 	foreach($this->input->post("team_id") as $team_id){
	// 		$data[] = array('team_id' => $team_id, 'user_id'=>$user_id);
	// 	}

	// 	$this->load->model('users_model', 'model', TRUE);
	// 	if($this->model->savePermission($data)){

	// 		redirect('users');
	// 		} else {
	// 		redirect('users');
	// 		}
	// }



}
