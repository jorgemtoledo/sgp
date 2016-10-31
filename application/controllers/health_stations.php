<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Health_stations extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("healthstations_model");
		$healthStations = $this->healthstations_model->listHealthStations();

		$dados = array("healthStations"=>$healthStations);

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
		$this->load->view('healthstations/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('healthstations/addhealthstation.php');
		$this->load->view('include/footer');
	}

	public function saveHealthStation()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('healthstations_model', 'model', TRUE);

			if ($this->model->saveHealthStations($data)) {
						redirect('health_stations/1');
			} else {
						redirect('health_stations/2');
			}
	}

	// public function delete($id=null)
	// {
	// 	$this->verifcar_sessao();

	// 	$this->db->where('id',$id);
	// 	if ($this->db->delete('health_stations')) {
	// 					redirect('health_stations/3');
	// 		} else {
	// 					redirect('health_stations/4');
	// 		}
	// }

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['health_stations'] = $this->db->get('health_stations')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('healthstations/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_editHealthStation()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('healthstations_model', 'model', TRUE);

			if ($this->model->saveeditHealthStations($data,$id)) {
						redirect('health_stations/5');
			} else {
						redirect('health_stations/6');
			}
	}
}
