<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index() {
		$this->verifcar_sessao();
        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('tasks/index.php');
        $this->load->view('include/footer');
    }

    public function taskteammedcertificates($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("tasks_model");
		$teams = $this->tasks_model->listTeams($this->uri->segment(3));

		$dados = array("teams"=>$teams);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('tasks/taskteammedcertificates.php',$dados);
		$this->load->view('include/footer');
	}

    public function taskmedcertificates($id=null)
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
		$this->load->view('include/menu');
	    $this->load->view('tasks/taskmedcertificates.php',$dados);
	    $this->load->view('include/footer');
    }
    // Medical Certificate by worker
     public function tskmedcertworker($id=null)
    {
		$this->verifcar_sessao();

		$this->load->model("tasks_model");
		$teams = $this->tasks_model->listWorkers($this->uri->segment(3));
		$teamOne = $this->tasks_model->listOneTeams($this->uri->segment(3));
		$listWorker = $this->tasks_model->listTasksWorker($this->uri->segment(3));
		$listTaskEmployee = $this->tasks_model->listTaskEmployee($this->uri->segment(3));

		$dados = array("teams"=>$teams,
						"teamOne"=>$teamOne,
						"listWorker"=>$listWorker,
						"listTaskEmployee"=>$listTaskEmployee
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
	    $this->load->view('tasks/tskmedcertworker.php',$dados);
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
		$this->load->view('tasks/tskmedcertworkerview.php', $dados);
		$this->load->view('include/footer');
	}




}