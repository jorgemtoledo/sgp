<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Day_offs extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("dayoffs_model");
		$dayoffs = $this->dayoffs_model->listDayOffs();

		$dados = array("dayoffs"=>$dayoffs);

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
		$this->load->view('dayoffs/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('dayoffs/adddayoff.php');
		$this->load->view('include/footer');
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

	// public function delete($id=null)
	// {
	// 	$this->verifcar_sessao();

	// 	$this->db->where('id',$id);
	// 	if ($this->db->delete('day_offs')) {
	// 					redirect('day_offs/3');
	// 		} else {
	// 					redirect('day_offs/4');
	// 		}
	// }

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['day_offs'] = $this->db->get('day_offs')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('dayoffs/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_editDayOff()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('dayoffs_model', 'model', TRUE);

			if ($this->model->saveeditDayOffs($data,$id)) {
						redirect('day_offs/5');
			} else {
						redirect('day_offs/6');
			}
	}
}
