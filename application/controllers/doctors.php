<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctors extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();
		$this->load->model("doctors_model");



		$busca = $this->doctors_model->get_doctors();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/doctors?busca='.$busca.'&') :
                 base_url('/doctors?');


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
		} else if ($indice==7) {
			$data['msg'] = "Médico ou CRM já cadastrado no sistema!";
			$this->load->view('include/msg_error',$data);
		}


		/**Paginação*/
                $get_total_results = $this->doctors_model->get_doctors($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 15);


                $get_users = $this->doctors_model->get_doctors($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('doctors/index.php',
                         array(
			                     "doctors"=>$get_users['dados'],
			                     'busca'=>$busca,
			                     "pag"=>$get_paginacao['paginacao'])
                         );

            /*Paginação*/


		// $this->load->view('doctors/index.php',$dados);
		$this->load->view('include/footer');
	}


	/*Funcao generica */
	public function paginacao_func($url_pagination, $total_resultados,$resultados_per_pagina=10)
	{
			$config['base_url'] = $url_pagination;

            $config['total_rows'] = $total_resultados;
            $config['per_page'] = $resultados_per_pagina;
            $config['page_query_string'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Primeiro';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['last_link'] = 'Último';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="current"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $qtidade = $config['per_page'];
            $this->pagination->initialize($config);

            $dados['qtidade_re'] = $qtidade;
            $dados['inicio'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') :  '0'; 
            $dados['paginacao'] = $this->pagination->create_links();
            return $dados;

	}

	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('doctors/adddoctor.php');
		$this->load->view('include/footer');
	}

	public function savedoctor()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['crm'] = $this->input->post('crm');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('doctors_model', 'model', TRUE);

		$this->db->where('crm', $data['crm']);
		$num_rows = $this->db->count_all_results('doctors');
		// var_dump($num_rows);
		if($num_rows > 0){
			redirect('doctors/7');
		} else {
			$this->model->savedoctors($data);
						redirect('doctors/1');
		}
	}

	// public function delete($id=null)
	// {
	// 	$this->verifcar_sessao();

	// 	$this->db->where('id',$id);
	// 	if ($this->db->delete('doctors')) {
	// 					redirect('doctors/3');
	// 		} else {
	// 					redirect('doctors/4');
	// 		}
	// }

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['doctors'] = $this->db->get('doctors')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('doctors/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_edit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['crm'] = $this->input->post('crm');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('doctors_model', 'model', TRUE);

			if ($this->model->saveeditdoctors($data,$id)) {
						redirect('doctors/5');
			} else {
						redirect('doctors/6');
			}
	}
}
