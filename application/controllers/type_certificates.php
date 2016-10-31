<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_certificates extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("typecertificates_model");
		$typeCertificates = $this->typecertificates_model->listTypeCertificates();

		$dados = array("typeCertificates"=>$typeCertificates);

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
		$this->load->view('typecertificates/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('typecertificates/addtypecertificate.php');
		$this->load->view('include/footer');
	}

	public function saveTypeCertificate()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('typecertificates_model', 'model', TRUE);

			if ($this->model->saveTypeCertificates($data)) {
						redirect('type_certificates/1');
			} else {
						redirect('type_certificates/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		// Erro delete foreign key
		if ($this->db->_error_number() == 1451);
		if ($this->db->delete('type_certificates')) {
						redirect('type_certificates/3');
			} else {
						redirect('type_certificates/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['type_certificates'] = $this->db->get('type_certificates')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('typecertificates/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_editTypeCertificate()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('typecertificates_model', 'model', TRUE);

			if ($this->model->saveeditTypeCertificates($data,$id)) {
						redirect('type_certificates/5');
			} else {
						redirect('type_certificates/6');
			}
	}
}
