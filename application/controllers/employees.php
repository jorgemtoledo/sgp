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


		// $employees = $this->employees_model->listEmployees();
		// $dados = array("employees"=>$employees);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Funcionario cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro, DATAS ou CPF!";
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
		}else if ($indice==7) {
			$data['msg'] = "Importação com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao importar.!";
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

	public function view_excel()
	{
	$this->verifcar_sessao();
	$this->load->model("employees_model");
	$employees = $this->employees_model->listEmployees();

	$dados = array(
		"employees"=>$employees
	);
	// echo "<pre>";
	// print_r($dados);
	// echo "</pre>";
	// die();
	$this->load->view('include/headerpopup');
	$this->load->view('employees/view_excel',$dados);
	$this->load->view('include/footer');
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
	} else{
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

	// Import CSV to Mysql //
	public function import()
	{

	$this->load->model("employees_model");
	  if(isset($_POST["import"]))
	    {
	        $filename=$_FILES["file"]["tmp_name"];
	        if($_FILES["file"]["size"] > 0)
	          {
	            $file = fopen($filename, "r");
	             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
	             {
	                    $data = array(
	                        'company_id' => $importdata[0],
	                        'job_id' =>$importdata[1],
	                        'situation_id' =>$importdata[2],
	                        'user_id' =>$importdata[3],
	                        'name' =>$importdata[4],
	                        'registration' =>$importdata[5],
	                        'cpf' =>$importdata[6],
	                        'hire_date' =>$importdata[7],
	                        'workload' =>$importdata[8],
	                        'birth_date' =>$importdata[9],
	                        'phone1' =>$importdata[10],
	                        'phone2' =>$importdata[11],
	                        'phone3' =>$importdata[12],
	                        'description' =>$importdata[13],
	                        'resignation_date' =>date('Y-m-d H:i:s'),
	                        'created' =>date('Y-m-d H:i:s'),
	                        'modified' =>date('Y-m-d H:i:s'),
	                        'created' => date('Y-m-d H:i:s')
	                        );
	             $insert = $this->employees_model->insertCSV($data);
	             }
	            fclose($file);
				$this->session->set_flashdata('message', 'Data are imported successfully..');
					redirect('employees/7');
	          }else{
				$this->session->set_flashdata('message', 'Something went wrong..');
				redirect('employees/8');
			}
	    }
	}
	// Import CSV to Mysql//

	public function saveemployee()
	{
		$this->verifcar_sessao();

		//Convert date hire_date
		$datahire = $this->input->post('hire_date');
		$datahire = explode('/', $datahire);
		if(checkdate($datahire[1],$datahire[0],$datahire[2])){
	                    $datahire = $datahire[2].'-'.$datahire[1].'-'.$datahire[0];
	                } else {
	                    redirect('employees/2');
	                }

		//Convert date birth_date
		$databrith = $this->input->post('birth_date');
		$databrith = explode('/', $databrith);
		if(checkdate($databrith[1],$databrith[0],$databrith[2])){
	                    $databrith = $databrith[2].'-'.$databrith[1].'-'.$databrith[0];
	                } else {
	                    redirect('employees/2');
	                }

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

	// Dismiss
	public function dismiss($id=null)
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
		$this->load->view('employees/dismissemployee.php',$dados);
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

	public function save_dismiss()
	{
		$this->verifcar_sessao();


       		 //Convert date resignation_date
		$dataresignation = $this->input->post('resignation_date');
		$dataresignation = explode('/', $dataresignation);
        		$dataresignation = $dataresignation[2].'-'.$dataresignation[1].'-'.$dataresignation[0];


		$id = $this->input->post('id');
		$data['situation_id'] = $this->input->post('situation_id');
		$data['description'] = $this->input->post('description');
		$data['resignation_date'] = $dataresignation;
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');


		// Disable team
		$data2['active'] = 0;
		$data2['modified'] = date('Y-m-d H:i:s');
		$data2['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($id);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($data2);
		// echo "</pre>";
		// die();

		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->savedismissemployees($data,$id,$data2)) {
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


	public function examinations()
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/examinations.php');
		$this->load->view('include/footer');
	}

	public function examinationlists($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");
		$employees = $this->employees_model->listEmployeesExam();

		$dados = array(
			"employees"=>$employees
		);

		$this->load->model("employees_model");

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Cadastro com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro, 'Data para Agendar'!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('employees/examinationlists.php',$dados);
		$this->load->view('include/footer');
	}

	public function examinationlists_Excel($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");
		$employees = $this->employees_model->listEmployeesExam();

		$dados = array(
			"employees"=>$employees
		);

		$this->load->model("employees_model");

		$this->load->view('include/headerpopup');
		$this->load->view('employees/examinationlists_Excel',$dados);
		$this->load->view('include/footer');
	}

	public function examinationadd($id=null)
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
		$this->load->view('employees/examinationadd.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveexaminations()
	{
		$this->verifcar_sessao();

		//Convert date examination_last
		$examination_last = $this->input->post('examination_last');
		$examination_last = explode('/', $examination_last);
        		$examination_last = $examination_last[2].'-'.$examination_last[1].'-'.$examination_last[0];

		//Convert date examination_next
		$examination_next = $this->input->post('examination_next');
		$examination_next = explode('/', $examination_next);
        		$examination_next = $examination_next[2].'-'.$examination_next[1].'-'.$examination_next[0];

        		//Convert date examination_scheduled
  		$examination_scheduled = $this->input->post('examination_scheduled');
		$examination_scheduled = explode('/', $examination_scheduled);
		if(checkdate($examination_scheduled[1],$examination_scheduled[0],$examination_scheduled[2])){
	                   $examination_scheduled = $examination_scheduled[2].'-'.$examination_scheduled[1].'-'.$examination_scheduled[0];
	                } else {
	                    redirect('employees/examinationlists/2');
	                    // echo "Data errada";
	                    die;
	                }


		$id = $this->input->post('employee_id');
		$data['user_id'] = $this->session->userdata('id');
		$data['employee_id'] = $this->input->post('employee_id');
		$data['examination_type'] = $this->input->post('examination_type');
		// Gravando a data programada (examination_scheduled) em examination_last
		$data['examination_last'] = $examination_last;
		$data['examination_next'] = $examination_next;
		$data['examination_scheduled'] = $examination_scheduled;
		$data['description'] = $this->input->post('description');
		$data['accomplished'] = 0;
		$data['active'] = 1;
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$data2['accomplished'] = 1;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();


		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->saveexaminations($data,$id,$data2)) {
						redirect('employees/examinationlists/1');
			} else {
						redirect('employees/examinationlists/2');
			}
	}

	public function examinationschedule($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");
		$employees = $this->employees_model->examinationschedule();
		$year= date('Y');
		$data = array(
			"year"=>$year,
			"employees"=>$employees
		);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Cadastro com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro, 'Data para Agendar'!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('employees/examinationschedule.php',$data);
		$this->load->view('include/footer');
	}

	public function examinationview($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->viewExam($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/examinationview.php',$dados);
		$this->load->view('include/footer');
	}

	public function examinationviewEnd($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->viewExam($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/examinationviewEnd.php',$dados);
		$this->load->view('include/footer');
	}

	public function examinationedit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		// $companies = $this->employees_model->listCompaniesCombo();
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->viewExam($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/examinationedit.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveEditexamination()
	{
		$this->verifcar_sessao();


        		$id= $this->input->post('id');
        		//Convert date examination_scheduled
		// $examination_scheduled = $this->input->post('examination_scheduled');
		//Convert date examination_scheduled
  		$examination_scheduled = $this->input->post('examination_scheduled');
		$examination_scheduled = explode('/', $examination_scheduled);
		if(checkdate($examination_scheduled[1],$examination_scheduled[0],$examination_scheduled[2])){
	                   $examination_scheduled = $examination_scheduled[2].'-'.$examination_scheduled[1].'-'.$examination_scheduled[0];
	                } else {
	                    redirect('employees/examinationschedule/2');
	                    // echo "Data errada";
	                    die;
	                }

		$data['user_id'] = $this->session->userdata('id');
		$data['examination_scheduled'] = $examination_scheduled;
		$data['description'] = $this->input->post('description');
		$data['accomplished'] = 0;
		$data['active'] = 1;
		$data['modified'] = date('Y-m-d H:i:s');


		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->saveEditexamination($data,$id)) {
						redirect('employees/examinationschedule/1');
			} else {
						redirect('employees/examinationschedule/2');
			}
	}


	public function checked($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("employees_model");
		$this->data['rcompanies'] = $this->employees_model->listCompaniesCombo();
		$this->data['jobs'] = $this->employees_model->listJobsCombo();
		$this->data['situations'] = $this->employees_model->listSituationsCombo();
		$this->data['result'] = $this->employees_model->viewExam($this->uri->segment(3));

		$dados = array("companies"=>$this->data['rcompanies'],
						"jobs"=>$this->data['jobs'],
						"situations"=>$this->data['situations'],
						"result"=>$this->data['result']
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('employees/examinationchecked.php',$dados);
		$this->load->view('include/footer');
	}


	public function checkedView_excel()
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");
		$employees = $this->employees_model->listEmployeesExamExcel();

		$dados = array(
			"employees"=>$employees
		);

		// echo "<pre>";
		// print_r($dados);
		// echo "</pre>";
		// die();
		$this->load->view('include/headerpopup');
		$this->load->view('employees/viewExamination_excel',$dados);
		$this->load->view('include/footer');
	}

	public function saveChecked()
	{
		$this->verifcar_sessao();

		//Convert date examination_last
		$examination_last = $this->input->post('examination_last');
		$examination_last = explode('/', $examination_last);
        		$examination_last = $examination_last[2].'-'.$examination_last[1].'-'.$examination_last[0];

		//Convert date examination_next
		$examination_next = $this->input->post('examination_next');
		$examination_next = explode('/', $examination_next);
        		$examination_next = $examination_next[2].'-'.$examination_next[1].'-'.$examination_next[0];

        		//Convert date examination_scheduled
		$examination_scheduled = $this->input->post('examination_scheduled');
		// $examination_scheduled = explode('/', $examination_scheduled);
  		//$examination_scheduled = $examination_scheduled[2].'-'.$examination_scheduled[1].'-'.$examination_scheduled[0];


		$id = $this->input->post('id');
		$data['user_id'] = $this->session->userdata('id');
		$data['employee_id'] = $this->input->post('employee_id');
		$data['examination_type'] = $this->input->post('examination_type');
		$data['examination_last'] = $examination_last;
		$data['examination_next'] = $examination_next;
		$data['examination_scheduled'] = $examination_scheduled;
		$data['description'] = $this->input->post('description');
		$data['accomplished'] = 1;
		$data['active'] = 1;
		$data['modified'] = date('Y-m-d H:i:s');

		// Next Examination
		$dataNext['user_id'] = $this->session->userdata('id');
		$dataNext['employee_id'] = $this->input->post('employee_id');
		$dataNext['examination_type'] = $this->input->post('examination_type');
		// Gravando a data programada (examination_scheduled) em examination_last
		$dataNext['examination_last'] = $examination_scheduled;
                          $dias = 365;
                          $datenext = date('Y-m-d', strtotime("+{$dias} days",strtotime($dataNext['examination_last'] )));
                         // echo $datenext;

		$dataNext['examination_next'] = $datenext;
		$dataNext['examination_scheduled'] = $datenext;
		// $dataNext['description'] = $this->input->post('description');
		$dataNext['accomplished'] = 0;
		$dataNext['active'] = 1;
		$dataNext['created'] = date('Y-m-d H:i:s');
		$dataNext['modified'] = date('Y-m-d H:i:s');

		$data2['accomplished'] = 1;

		$this->load->model('employees_model', 'model', TRUE);

			if ($this->model->saveexaminationChecked($data,$id,$dataNext)) {
						redirect('employees/examinationschedule');
			} else {
						redirect('employees/examinationschedule');
			}
	}


	public function listExaminations($indice=null)
	{
		$this->verifcar_sessao();
		$this->load->model("employees_model");

		$busca = $this->employees_model->get_examinations();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/employees/listExaminations?busca='.$busca.'&') :
                 	base_url('/employees/listExaminations?');

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
		}else if ($indice==7) {
			$data['msg'] = "Importação com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao importar.!";
			$this->load->view('include/msg_error',$data);
		}


		/**Paginação*/
	                $get_total_results = $this->employees_model->get_examinations($busca);

	                  $total_resultados = $get_total_results['total'];
	                  $get_paginacao = $this->paginacao_func_ex($url_paginacao, $total_resultados, 50);


	                $get_users = $this->employees_model->get_examinations($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);

	                $dados =array(
	                     "employees"=>$get_users['dados'],
	                     'busca'=>$busca,
	                     "pag"=>$get_paginacao['paginacao']
	                );
	                 $this->load->view('employees/listexaminations.php',$dados);
	            /*Paginação*/

			$this->load->view('include/footer');
		}

		/*Funcao generica */
		public function paginacao_func_ex($url_pagination, $total_resultados,$resultados_per_pagina=10)
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








}
