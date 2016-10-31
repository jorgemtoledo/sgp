<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cids extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('cids_model','cids');
	}

	public function index($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("cids_model");

		$busca = $this->cids_model->get_cids();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/cids?busca='.$busca.'&') :
                 base_url('/cids?');



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

		/**Paginação*/
                $get_total_results = $this->cids_model->get_cids($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 15);


                $get_users = $this->cids_model->get_cids($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('cids/index.php',
                         array(
			                     "cids"=>$get_users['dados'],
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


	public function add()
	{
		$this->verifcar_sessao();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('cids/addcid.php');
		$this->load->view('include/footer');
	}

	public function saveCid()
	{
		$this->verifcar_sessao();

		$data['name'] = $this->input->post('name');
		$data['description'] = $this->input->post('description');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');

		$this->load->model('cids_model', 'model', TRUE);

			if ($this->model->saveCids($data)) {
						redirect('cids/1');
			} else {
						redirect('cids/2');
			}
	}

	public function delete($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		if ($this->db->delete('cids')) {
						redirect('cids/3');
			} else {
						redirect('cids/4');
			}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->db->where('id',$id);
		$data['cids'] = $this->db->get('cids')->result();

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('cids/edit.php',$data);
		$this->load->view('include/footer');
	}

	public function save_editCid()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['description'] = $this->input->post('description');
		$data['modified'] = date('Y-m-d H:i:s');

		// echo "<pre>";
		// var_dump($data,$id);
		// echo "</pre>";
		// die();

		$this->load->model('cids_model', 'model', TRUE);

			if ($this->model->saveeditCids($data,$id)) {
						redirect('cids/5');
			} else {
						redirect('cids/6');
			}
	}
}
