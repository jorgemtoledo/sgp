<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("users_model");
		$users = $this->users_model->listUsers();
		$teams = $this->users_model->listTeams();

		$dados = array("users"=>$users,
						"teams"=>$teams);

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
		$this->load->view('users/index.php',$dados);
		$this->load->view('include/footer');
	}

	public function add()
	{
		$this->verifcar_sessao();
		$this->load->model("users_model");
		$users = $this->users_model->listUsers();
		$teams = $this->users_model->listTeams();

		$dados = array("users"=>$users,
						"teams"=>$teams);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('users/adduser.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveuser()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		// $data['employee_id'] = $this->input->post('employee_id');
		$data['level'] = $this->input->post('level');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		// $data['team_id'] = $this->input->post('team_id');

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveuser($data)) {
						redirect('users/1');
			} else {
						redirect('users/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('users')) {
						redirect('users/3');
			} else {
						redirect('users/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		if (!isset($id) || $id == '0') {
			redirect('users');
		} else {
			$this->db->where('id',$id);
			$data['users'] = $this->db->get('users')->result();
		}

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('users/edituser.php',$data);
		$this->load->view('include/footer');
	}

	public function myEdit($id=null)
	{
		$this->verifcar_sessao();

		// Session id
		$data['user_id'] = $this->session->userdata('id');
		$session_id = $data['user_id'];

		if($session_id != $id){
			redirect('dashboard');
		} else {


		if (!isset($id) || $id == '0') {
			redirect('users');
		} else {
			$this->db->where('id',$id);
			$data['users'] = $this->db->get('users')->result();
		}
		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('users/myEdituser.php',$data);
		$this->load->view('include/footer');

		};
	}

	public function save_edit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		// $data['employee_id'] = $this->input->post('employee_id');
		$data['level'] = $this->input->post('level');
		$data['active'] = $this->input->post('active');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('users/5');
			} else {
						redirect('users/6');
			}
	}

	public function save_myEdit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['password'] = md5($this->input->post('password'));
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('users_model', 'model', TRUE);

			if ($this->model->saveedit($data,$id)) {
						redirect('dashboard');
			} else {
						redirect('dashboard');
			}
	}

	public function permission($user_id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("users_model");
		$this->db->where('id',$user_id);
		$data['users'] = $this->db->get('users')->result();
		$users = $data['users'];

		$this->db->where('user_id',$user_id);
		$teams_users['teams_users'] = $this->db->get('teams_users')->result();
		$teams_users = $teams_users['teams_users'];



		$teams = $this->users_model->listTeams();

		$dados = array("users"=>$users,"teams"=>$teams, "teams_users"=>$teams_users);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('users/permission.php',$dados);
		$this->load->view('include/footer');
	}

	// public function savepermission(){
	// 	$user_id = $this->input->post("id");
	// 	$team_id = $this->input->post("team_id");
	// 	// echo "<pre>";
	// 	// 	var_dump($team_id);
	// 	// 	var_dump($user_id);
	// 	// 	echo "</pre>";
	// 	// 	die();

	// 	$this->load->model('users_model', 'model', TRUE);
	// 	if($this->model->savePermission($user_id,$team_id)){

	// 		redirect('users/1');
	// 		} else {
	// 		redirect('users/2');
	// 		}
	// }

	public function savepermission(){
		$user_id = $this->input->post("id");
		$this->db->where('user_id',$user_id);
		$this->db->delete('teams_users');

		$data = array();
		foreach($this->input->post("team_id") as $team_id){
			$data[] = array('team_id' => $team_id, 'user_id'=>$user_id);
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('users_model', 'model', TRUE);
		if($this->model->savePermission($data)){

			redirect('users');
			} else {
			redirect('users');
			}
	}


// =============================Teste Datatable===============

	public function testeindex($indice=null)
		{
			/*Verifica Sessão*/
			$this->verifcar_sessao();

			$this->load->model("employees_model");
			$listEmployees = $this->employees_model->listEmployees();

			$dados = array("listEmployees"=>$listEmployees);

			// echo "<pre>";
			// print_r($dados);
			// echo "</pre>";
			// die();

			$this->load->view('include/headerpopup');

			$this->load->view('users/datatable.php',$dados);


			$this->load->view('include/footer');
		}


// ============================================================


}
