<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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


        $this->load->model("dashboard_model");
		$count_employees = $this->dashboard_model->est_employees();
		$count_companies = $this->dashboard_model->est_companies();
		$count_operations = $this->dashboard_model->est_operations();
		$count_teams = $this->dashboard_model->est_teams();

		$id = $this->session->userdata('id');
		$level_user = $this->dashboard_model->level_user($id);

		$dados = array(
				"count_employees"=>$count_employees,
				"count_companies"=>$count_companies,
				"count_operations"=>$count_operations,
				"count_teams"=>$count_teams,
				"level_user"=>$level_user
				);

		// $teste = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($level_user);
		// echo "</pre>";
		// die();

        $this->load->view('dashboard',$dados);
        $this->load->view('include/footer');
    }


	public function login()
	{
		$this->load->view('login');
		$this->load->view('include/footer');
	}

	public function logar()
	{
		$email= $this->input->post('email');
		$password= md5($this->input->post('password'));

		$this->db->where('password', $password);
		$this->db->where('email', $email);
		$this->db->where('active', 1);
		$data['user'] = $this->db->get('users')->result();

		// echo "<pre>";
		// print_r($dados);
		// echo "</pre>";
		// die();

		if(count($data['user'])==1){
			$dados['id'] = $data['user'][0]->id;
			$dados['name'] = $data['user'][0]->name;
			// $dados['level'] = $data['user'][0]->level;
			$dados['logado'] = true;

			$this->session->set_userdata($dados);

			redirect('dashboard');
		} else {
			redirect('dashboard/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard');
	}

}