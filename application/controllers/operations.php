<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Mudou o nome operacoes para deparatamentos

class Operations extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("operations_model");
		$operations = $this->operations_model->listOperations();

		$dados = array("operations"=>$operations);

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
		$this->load->view('operations/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->model("operations_model");
		$companies = $this->operations_model->listCompaniesCombo();

		$dados = array(
						"companies"=>$companies
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('operations/addoperation.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveoperation()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['company_id'] = $this->input->post('company_id');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('operations_model', 'model', TRUE);

			if ($this->model->saveoperations($data)) {
						redirect('operations/1');
			} else {
						redirect('operations/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('operations')) {
						redirect('operations/3');
			} else {
						redirect('operations/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("operations_model");
		$companies = $this->operations_model->listCompaniesCombo();
		$this->data['result'] = $this->operations_model->listEditOperations($this->uri->segment(3));

		$dados = array("companies"=>$companies,	"result"=>$this->data['result']);

		// echo "<pre>";
		// var_dump($dados);
		// echo "</pre>";
		// die();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('operations/edit.php',$dados);
		$this->load->view('include/footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();
		
		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['company_id'] = $this->input->post('company_id');
		$data['active'] = $this->input->post('active');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('operations_model', 'model', TRUE);

			if ($this->model->saveeditoperations($data,$id)) {
						redirect('operations/5');
			} else {
						redirect('operations/6');
			}
	}
}
