<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("certificates_model");
		$days = $this->certificates_model->listDaysCertificates();

		$dados = array("days"=>$days);
		// echo "<pre>";
		// print_r($dados);
		// echo "</pre>";
		// die();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Usuário cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Usuário deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar o usuário.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Usuário atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar o usuário.!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('certificates/index.php', $dados);
		$this->load->view('include/footer');
	}

	public function typeLicense($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("certificates_model");
		$days = $this->certificates_model->listDaysCertificates();

		$dados = array("days"=>$days);
		// echo "<pre>";
		// print_r($dados);
		// echo "</pre>";
		// die();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Usuário cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Usuário deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar o usuário.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Usuário atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar o usuário.!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('certificates/typeLicense.php', $dados);
		$this->load->view('include/footer');
	}



}