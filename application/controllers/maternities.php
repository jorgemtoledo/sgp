<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maternities extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("maternities_model");

		$busca = $this->maternities_model->get_maternities();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/maternities?busca='.$busca.'&') :
                 base_url('/maternities?');

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Formulario cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Formulario deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar o Formulario.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Formulario atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar o Formulario.!";
			$this->load->view('include/msg_error',$data);
		}

		// $this->load->view('maternities/index.php');

		/**Paginação*/
                $get_total_results = $this->maternities_model->get_maternities($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 15);


                $get_forms = $this->maternities_model->get_maternities($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('maternities/index.php',
                         array(
			                     "maternities"=>$get_forms['dados'],
			                     'busca'=>$busca,
			                     "pag"=>$get_paginacao['paginacao'])
                         );

            /*Paginação*/

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

	public function add($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("maternities_model");

		$this->data['result'] = $this->maternities_model->listAddFormMaternity($this->uri->segment(3));

		$dados = array("result"=>$this->data['result']);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('maternities/addformmaternity.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveAddFormMaternity()
	{
		$this->verifcar_sessao();

		$data['medical_certificate_id']= $this->input->post('id');
		$data['finish_maternity'] = $this->input->post('finish_maternity');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();

		$this->load->model('maternities_model', 'model', TRUE);

			if ($this->model->saveAddFormMaternity($data)) {
						redirect('maternities/index/1');
			} else {
						redirect('maternities/index/2');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("maternities_model");

		$this->data['result'] = $this->maternities_model->listEditFormMaternity($this->uri->segment(3));

		$dados = array("result"=>$this->data['result']);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('maternities/editformmaternity.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveEditFormMaternity()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['medical_certificate_id']= $this->input->post('medical_certificate_id');
		$data['finish_maternity'] = $this->input->post('finish_maternity');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		// echo "<pre>";
		// print_r($data);
		// print_r($id);
		// echo "</pre>";
		// die();

		$this->load->model('maternities_model', 'model', TRUE);

			if ($this->model->saveEditFormMaternity($data,$id)) {
						redirect('maternities/index/1');
			} else {
						redirect('maternities/index/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('maternities')) {
						redirect('maternities/index/3');
			} else {
						redirect('maternities/index/4');
			}
	}
}