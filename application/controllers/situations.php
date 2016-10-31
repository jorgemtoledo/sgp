<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Situations extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("situations_model");
		$situations = $this->situations_model->listSituations();

		$dados = array("situations"=>$situations);

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
		$this->load->view('situations/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('situations/addsituation.php');
		$this->load->view('include/footer');
	}

	public function savesituation()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('situations_model', 'model', TRUE);

			if ($this->model->savesituations($data)) {
						redirect('situations/1');
			} else {
						redirect('situations/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('situations')) {
						redirect('situations/3');
			} else {
						redirect('situations/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['situations'] = $this->db->get('situations')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('situations/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('situations_model', 'model', TRUE);

			if ($this->model->saveeditsituations($data,$id)) {
						redirect('situations/5');
			} else {
						redirect('situations/6');
			}
	}
}
