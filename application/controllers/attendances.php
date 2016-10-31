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

	public function add()
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



}