<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("teams_model");
		$teams = $this->teams_model->listTeams();

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
		$this->load->view('teams/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();
		$this->load->model("teams_model");
		$operations = $this->teams_model->listOperationsCombo();

		$dados = array("operations"=>$operations );

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('teams/addteam.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveteam()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['operation_id'] = $this->input->post('operation_id');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('teams_model', 'model', TRUE);

			if ($this->model->saveteams($data)) {
						redirect('teams/1');
			} else {
						redirect('teams/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('teams')) {
						redirect('teams/3');
			} else {
						redirect('teams/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("teams_model");

		$operations = $this->teams_model->listOperationsCombo();

		$dados2 = $this->teams_model->listEdit($this->uri->segment(3));

		$dados = array("operations"=>$operations,
						"dados"=>$dados2

			);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('teams/editteam.php',$dados);
		$this->load->view('include/footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['operation_id'] = $this->input->post('operation_id');
		$data['active'] = $this->input->post('active');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data, $id);
		// echo "</pre>";
		// die();

		$this->load->model('teams_model', 'model', TRUE);

			if ($this->model->saveeditteams($data,$id)) {
						redirect('teams/5');
			} else {
						redirect('teams/6');
			}
	}
}
