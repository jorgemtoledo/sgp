<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendances extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();


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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/index.php');
		$this->load->view('include/footer');
	}

	public function typeAttendances($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("attendances_model");
		$subtitles = $this->attendances_model->listTypeAttendances();

		$dados = array("subtitles"=>$subtitles);


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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/typeAttendances.php',$dados);
		$this->load->view('include/footer');
	}


	public function saveTypeAttendances()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['sgl'] = $this->input->post('sgl');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('attendances_model', 'model', TRUE);

			if ($this->model->savetypeattendances($data)) {
						redirect('attendances/typeAttendances/1');
			} else {
						redirect('attendances/typeAttendances/2');
			}
	}

	public function deleteTypeAttendances($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('type_attendances')) {
						redirect('attendances/typeAttendances/3');
			} else {
						redirect('attendances/typeAttendances/4');
			}
	}

	public function listPeriod($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("attendances_model");
		$teams = $this->attendances_model->teamsAll();

		$dados = array("teams"=>$teams);


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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/listPeriod.php',$dados);
		$this->load->view('include/footer');
	}


	public function listPeriodPlanning($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("attendances_model");
		$teams = $this->attendances_model->teamsAll();

		$dados = array("teams"=>$teams);


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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/listPeriodPlanning.php',$dados);
		$this->load->view('include/footer');
	}


	public function listAttendances($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$team_id= $this->input->post('team_id');
		$month = $this->input->post('month');
		$year = $this->input->post('year');

		$dados = array(
						"team_id"=>$team_id,
						"month"=>$month,
						"year"=>$year
					);

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/listAttendances.php',$dados);
		$this->load->view('include/footer');
	}

	public function listAttendancesExcel($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$month = $this->input->post('month');
		$year = $this->input->post('year');

		$dados = array(
			"month"=>$month,
			"year"=>$year
		);

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/listAttendancesExcel.php',$dados);
		$this->load->view('include/footer');
	}

	public function listAttendancesExcelDisable($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$month = $this->input->post('month');
		$year = $this->input->post('year');

		$dados = array(
			"month"=>$month,
			"year"=>$year
		);

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/listAttendancesExcelDisable.php',$dados);
		$this->load->view('include/footer');
	}

	public function listAttendancePlanning($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$day= $this->input->post('day');
		$month = $this->input->post('month');
		$year = $this->input->post('year');

		$dados = array(
						"day"=>$day,
						"month"=>$month,
						"year"=>$year
					);

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/listAttendancePlanning.php',$dados);
		$this->load->view('include/footer');
	}





	public function addAll()
	{
		$this->verifcar_sessao();
		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendances();

		$dados = array(
						"users"=>$users,
						"workers"=>$workers,
						"typeAttendances"=>$typeAttendances
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('attendances/addAll.php',$dados);
		$this->load->view('include/footer');
	}

	public function add2()
	{
		$this->verifcar_sessao();
		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendances();

		$dados = array(
						"users"=>$users,
						"workers"=>$workers,
						"typeAttendances"=>$typeAttendances
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('attendances/add.php',$dados);
		$this->load->view('include/footer');
	}

	public function add($indice=null, $day=null, $month=null, $worker_id=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();
		//$worker_id = $this->input->post('worker_id');
		$idwork = "10";
		$data['worker_id'] = $worker_id;
		$data['day'] = $day;
		$data['month'] = $month;
		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendances();

		$dados = array(
						"users"=>$users,
						"workers"=>$workers,
						"typeAttendances"=>$typeAttendances,
						"worker_id"=>$worker_id,
						"day"=>$day,
						"month"=>$month
					);

		// echo "<pre>";
		// var_dump($worker_id);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($day);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($month);
		// echo "</pre>";
		// die();

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/add.php',$dados);
		$this->load->view('include/footer');
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('attendances')) {
					redirect('attendances/close');
			} else {
					redirect('attendances/close');
			}
	}

	public function edit($indice=null, $day=null, $month=null, $worker_id=null,$idattendances=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();
		//$worker_id = $this->input->post('worker_id');
		//$idwork = "10";
		$data['worker_id'] = $worker_id;
		$data['idattendances'] = $idattendances;
		$data['day'] = $day;
		$data['month'] = $month;
		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendances();

		$dados = array(
						"users"=>$users,
						"workers"=>$workers,
						"typeAttendances"=>$typeAttendances,
						"worker_id"=>$worker_id,
						"day"=>$day,
						"month"=>$month,
						"idattendances"=>$idattendances
					);

		// echo "<pre>";
		// var_dump($worker_id);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($day);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($month);
		// echo "</pre>";
		// echo "<pre>";
		// var_dump($idattendances);
		// echo "</pre>";
		// die();

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/edit.php',$dados);
		$this->load->view('include/footer');
	}

	public function viewAttendance($indice=null, $day=null, $month=null, $worker_id=null,$idattendances=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();
		//$worker_id = $this->input->post('worker_id');
		//$idwork = "10";
		$data['worker_id'] = $worker_id;
		$data['idattendances'] = $idattendances;
		$data['day'] = $day;
		$data['month'] = $month;
		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendances();

		$dados = array(
		"users"=>$users,
		"workers"=>$workers,
		"typeAttendances"=>$typeAttendances,
		"worker_id"=>$worker_id,
		"day"=>$day,
		"month"=>$month,
		"idattendances"=>$idattendances
		);


		$this->load->view('include/headerpopup');
		$this->load->view('attendances/viewAttendance.php',$dados);
		$this->load->view('include/footer');
	}


	public function close()
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->view('include/headerpopup');
		$this->load->view('attendances/close.php');
		$this->load->view('include/footer');
	}

	public function addSubtitle()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('attendances/addSubtitle.php');
		$this->load->view('include/footer');
	}

	public function editTypeAttendances($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['type_attendances'] = $this->db->get('type_attendances')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('attendances/editSubtitle.php',$data);
		$this->load->view('include/footer');
	}

	public function saveEditTypeAttendances()
	{
		$this->verifcar_sessao();
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['sgl'] = $this->input->post('sgl');
		$data['description'] = $this->input->post('description');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('attendances_model', 'model', TRUE);

			if ($this->model->saveedittypeattendances($data,$id)) {
						redirect('attendances/typeAttendances/5');
			} else {
						redirect('attendances/typeAttendances/6');
			}
	}


	public function saveattendances()
	{
		$this->verifcar_sessao();

		$data['worker_id'] = $this->input->post('worker_id');
		$data['type_attendance_id'] = $this->input->post('type_attendance_id');
		$data['day'] = $this->input->post('day');
		$data['month'] = $this->input->post('month');
		$data['year'] = $this->input->post('year');
		$data['alert'] = $this->input->post('alert');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('attendances_model', 'model', TRUE);

		$this->db->where('worker_id',$data['worker_id']);
		$this->db->where('day',$data['day']);
		$this->db->where('month',$data['month']);
		$this->db->where('year',$data['year']);
		$num_rows = $this->db->count_all_results('attendances');
		 // var_dump($num_rows);
		 // die();
		 if($num_rows > 0){
		 	echo "Ja tem cadastro no sistema nesse periodo, referente a esse funcionario.";
		 	die();
		 } else {
		 	if ($this->model->saveattendances($data)) {
						redirect('attendances/close');
			} else {
						redirect('attendances/close');
			}
		 }

	}

	public function saveeditattendances()
	{
		$this->verifcar_sessao();

		$data['worker_id'] = $this->input->post('worker_id');
		$idattendances = $this->input->post('idattendances');
		$data['type_attendance_id'] = $this->input->post('type_attendance_id');
		$data['day'] = $this->input->post('day');
		$data['month'] = $this->input->post('month');
		$data['year'] = $this->input->post('year');
		$data['alert'] = $this->input->post('alert');
		$data['description'] = $this->input->post('description');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($idattendances);
		// echo "</pre>";
		// die();

		$this->load->model('attendances_model', 'model', TRUE);

		 	if ($this->model->saveeditattendances($data,$idattendances)) {
						redirect('attendances/close');
			} else {
						redirect('attendances/close');
			}


	}

	public function saveattendancesall()
	{
		$this->verifcar_sessao();

		$data['worker_id'] = $this->input->post('worker_id');
		$data['type_attendance_id'] = $this->input->post('type_attendance_id');
		// $data['day'] = $this->input->post('day');
		// $data['month'] = $this->input->post('month');
		// $data['year'] = $this->input->post('year');
		// $data['alert'] = $this->input->post('alert');
		// $data['description'] = $this->input->post('description');
		// $data['created'] = date('Y-m-d H:i:s');
		// $data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');


		$data = array();
		foreach($this->input->post("worker_id") as $team_id){
			$data[] = array('type_attendance_id' => $team_id2, 'user_id'=>$user_id);
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('attendances_model', 'model', TRUE);

			if ($this->model->saveattendances($data)) {
						redirect('attendances/1');
			} else {
						redirect('attendances/2');
			}
	}

	public function attendancesteam($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("tasks_model");
		$teams = $this->tasks_model->listTeams($this->uri->segment(3));

		$dados = array("teams"=>$teams);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('attendances/attendancesteam.php',$dados);
		$this->load->view('include/footer');
	}

	public function checkteam($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("tasks_model");
		$teams = $this->tasks_model->listWorkers($this->uri->segment(3));
		$teamOne = $this->tasks_model->listOneTeams($this->uri->segment(3));

		$dados = array("teams"=>$teams,
						"teamOne"=>$teamOne,
			);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		// $this->load->view('include/menu');
	    $this->load->view('attendances/checkteam.php',$dados);
	    $this->load->view('include/footer');
    }


    public function listholiday($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendancesLimit();
		$listAbsences = $this->attendances_model->listAbsences();
		$dados = array(
			"users" => $users,
			"workers" => $workers,
			"typeAttendances" => $typeAttendances,
			"listAbsences" => $listAbsences
		);

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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/listholiday.php',$dados);
		$this->load->view('include/footer');
	}


	public function holiday($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("workers_model");
		$this->load->model("attendances_model");
		$workers = $this->workers_model->listWorkersAdd();
		$users = $this->workers_model->listUser();
		$typeAttendances = $this->attendances_model->listTypeAttendancesLimit();
		$dados = array(
			"users"=>$users,
			"workers"=>$workers,
			"typeAttendances"=>$typeAttendances
		);

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
			$data['msg'] = "Erro ao deletar!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('attendances/holiday.php',$dados);
		$this->load->view('include/footer');
	}



	public function saveHoliday()
	{
		$this->verifcar_sessao();
		$data['dateStart'] = $this->input->post('dateStart');
		$data['dateFinish'] = $this->input->post('dateFinish');

		    //Star date
		    $dateStart      =  $data['dateStart'];
		    $dateStart      = implode('-', array_reverse(explode('/', substr($dateStart, 0, 10)))).substr($dateStart, 10);
		    $dateStart      = new DateTime($dateStart);

		    //End date
		    $dateFinish        = $data['dateFinish'] ;
		    $dateFinish        = implode('-', array_reverse(explode('/', substr($dateFinish, 0, 10)))).substr($dateFinish, 10);
		    $dateFinish        = new DateTime($dateFinish);

		    //Prints days according to the interval
		    $dateRange = array();
		    while($dateStart <= $dateFinish){
		        $dateRange[] = $dateStart->format('Y-m-d');
		        $dateStart = $dateStart->modify('+1day');
		    }

		$data['worker_id'] = $this->input->post('worker_id');
		$data['type_attendance_id'] = $this->input->post('type_attendance_id');
		$data['alert'] = $this->input->post('alert');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		 $dataList = array();
		 foreach ($dateRange as $valueDate) {
		            // $data = $value;
		            $partes = explode("-", $valueDate);
		            $year = $partes[0];
		            $month = $partes[1];
		            $day = $partes[2];
		            // echo $dia;
		            $dataList[] = array(
		            	'worker_id' => $data['worker_id'],
		            	'type_attendance_id' => $data['type_attendance_id'],
		            	'alert' => $data['alert'],
		            	'description' => $data['description'],
		            	'created' => $data['created'],
		            	'modified' => $data['modified'],
		            	'user_id' => $data['user_id'],
		            	'day' => intval($day),
		            	'month' => intval($month),
		            	'year' => $year
		           );
		        }

		// register db absences
		$data2['worker_id'] = $this->input->post('worker_id');
		$data2['dateStart'] = $this->input->post('dateStart');
		$data2['dateFinish'] = $this->input->post('dateFinish');
		$data2['type_attendance_id'] = $this->input->post('type_attendance_id');
		$data2['description'] = $this->input->post('description');
		$data2['status'] = 1;
		$data2['user_id'] = $this->session->userdata('id');
		$data2['created'] = date('Y-m-d H:i:s');
		$data2['modified'] = date('Y-m-d H:i:s');

		$this->load->model('attendances_model', 'model', TRUE);

		if (!$this->model->saveattendanceList($data2,$dataList)) {
			$this->load->model("attendances_model");
			$id = $this->input->post('worker_id');
			$workers = $this->attendances_model->listAbsencesEdit($id);

			$name = $workers->ename;
			$team = $workers->tname;
			$type = $workers->typename;
			$timestampStart = strtotime($workers->abstart);
			$start = date('d/m/y', $timestampStart);
			$timestampFinish = strtotime($workers->abfinish);
			$finish = date('d/m/y', $timestampFinish);
			$this->load->library("email");
		            $config['protocol'] = 'smtp';
		            $config['smtp_host'] = 'mail.guiacontato.com.br';
		            $config['smtp_port'] = 587;
		            $config['smtp_user'] = 'contato@guiacontato.com.br'; // email id
		            $config['smtp_pass'] = 'contato10'; // email password
		            $config['mailtype'] = 'html';
		            $config['wordwrap'] = TRUE;
		            $config['charset'] = 'utf-8';
		            $config['newline'] = "\r\n"; //use double quotes here
		            $this->email->initialize($config);


		            $this->email->from("d.cruz@contatogestao.com", "SGP -  {$type} - {$name} ");
		            $this->email->to(array("d.cruz@contatogestao.com", "nicollas@contatogestao.com", "silvia@contatogestao.com", "andrea@guiacontato.com.br"));
		            $this->email->subject(" SGP -  {$type} - {$name} ");
		            $this->email->message(
		                "<strong>Mensagem enviada pelo sistema SGP!</strong><br>
		                <strong>Funcionario:</strong>{$name}  <br>
		                <strong>Equipe/Setor:</strong>{$team}  <br>
		                <strong>Tipo afastamento: </strong>{$type} <br>
		                <strong>Inicio: </strong>{$start}<br>
		                <strong>Fim:</strong>{$finish} <br>
		                "
		            );
		            $this->email->send();
			redirect('attendances/listholiday/1');
		} else {
			redirect('attendances/listholiday/2');
		}
	}




}