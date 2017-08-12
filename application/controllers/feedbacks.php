<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedbacks extends CI_Controller {

	public function verifcar_sessao(){
		if($this->session->userdata('logado') == false){
			redirect('dashboard/login');
		}
	}


	public function index($indice=null)
	    {
	        /*Verifica Sessão*/
	        $this->verifcar_sessao();

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        if ($indice==1) {
	            $data['msg'] = "Cadastrado com sucesso!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==2) {
	            $data['msg'] = "Erro ao cadastrar!";
	            $this->load->view('include/msg_error',$data);
	        } else  if ($indice==3) {
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
	        $this->load->view('feedbacks/index.php');
	        $this->load->view('include/footer');
	    }

	    public function typefeedback($indice=null)
	    {
	        /*Verifica Sessão*/
	        $this->verifcar_sessao();

	        $this->load->model("feedbacks_model");
	        $typeFeedbacks = $this->feedbacks_model->listTypeFeedback();
	        $dados = array("typeFeedbacks"=>$typeFeedbacks);

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        if ($indice==1) {
	            $data['msg'] = "Cadastrado com sucesso!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==2) {
	            $data['msg'] = "Erro ao cadastrar!";
	            $this->load->view('include/msg_error',$data);
	        } else  if ($indice==3) {
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
	        $this->load->view('feedbacks/typefeedback.php', $dados);
	        $this->load->view('include/footer');
	    }

	    public function typefeedback_add()
	    {
	        $this->verifcar_sessao();

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        $this->load->view('feedbacks/typefeedback_add.php');
	        $this->load->view('include/footer');
	    }

	    public function savetypefeedback()
	    {
	        $this->verifcar_sessao();

	        $data['name'] = $this->input->post('name');
	        $data['created'] = date('Y-m-d H:i:s');
	        $data['modified'] = date('Y-m-d H:i:s');
	        // echo "<pre>";
	        // print_r($data);
	        // echo "</pre>";
	        // die();

	        $this->load->model('feedbacks_model', 'model', TRUE);
	            if ($this->model->saveTypeFeedback($data)) {
	                        redirect('feedbacks/typefeedback/1');
	            } else {
	                        redirect('feedbacks/typefeedback/2');
	            }
	    }

	    public function typefeedback_edit($indice=null)
	    {
	        /*Verifica Sessão*/
	        $this->verifcar_sessao();

	        $this->db->where('id',$indice);
	        $data['type_feedbacks'] = $this->db->get('type_feedbacks')->result();

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');

	        $this->load->view('feedbacks/typefeedback_edit.php', $data);
	        $this->load->view('include/footer');
	    }

	    // public function delete($id=null)
	    // {
	    //     $this->verifcar_sessao();

	    //     $this->db->where('id',$id);
	    //     if ($this->db->delete('type_feedbacks')) {
	    //                     redirect('feedbacks/typefeedback/3');
	    //         } else {
	    //                     redirect('feedbacks/typefeedback/4');
	    //         }
	    // }

	    public function saveEditTypefeed()
	    {
	        $this->verifcar_sessao();

	        $id = $this->input->post('id');
	        $data['name'] = $this->input->post('name');
	        $data['modified'] = date('Y-m-d H:i:s');

	        // echo "<pre>";
	        // var_dump($data,$id);
	        // echo "</pre>";
	        // die();

	        $this->load->model('feedbacks_model', 'model', TRUE);

	            if ($this->model->saveEditTypefeed($data,$id)) {
	                        redirect('feedbacks/typefeedback/5');
	            } else {
	                        redirect('feedbacks/typefeedback/6');
	            }
	    }


	    public function listfeedbacks($indice=null)
	    {
	        /*Verifica Sessão*/
	        $this->verifcar_sessao();

	        $this->load->model("feedbacks_model");

	        $busca = $this->feedbacks_model->get_feedbacks();
	        $busca = $this->input->get('busca');
	        $url_paginacao = $busca != NULL ? base_url('/feedbacks/listfeedbacks?busca='.$busca.'&') :
	                 base_url('/feedbacks/listfeedbacks?');


	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        if ($indice==1) {
	            $data['msg'] = "Cadastrado com sucesso!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==2) {
	            $data['msg'] = "Erro ao cadastrar!";
	            $this->load->view('include/msg_error',$data);
	        } else  if ($indice==3) {
	            $data['msg'] = "Deletado com sucesso!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==4) {
	            $data['msg'] = "Erro ao deletar.!";
	            $this->load->view('include/msg_error',$data);
	        } else if ($indice==5) {
	            $data['msg'] = "Atualizado com sucesso!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==6) {
	            $data['msg'] = "Erro ao atualizar.!";
	            $this->load->view('include/msg_error',$data);
	        } else if ($indice==7) {
	            $data['msg'] = "Médico ou CRM já cadastrado no sistema!";
	            $this->load->view('include/msg_error',$data);
	        } else if ($indice==8) {
	            $data['msg'] = "OK, verificação dos dados junto ao PONTO!";
	            $this->load->view('include/msg_success',$data);
	        } else if ($indice==9) {
	            $data['msg'] = "Erro!";
	            $this->load->view('include/msg_error',$data);
	        }

	        /**Paginação*/
	                $get_total_results = $this->feedbacks_model->get_feedbacks($busca);

	                  $total_resultados = $get_total_results['total'];
	                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 100);


	                $get_users = $this->feedbacks_model->get_feedbacks($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


	                 $this->load->view('feedbacks/listfeedbacks',
	                         array(
	                                 "feedbacks"=>$get_users['dados'],
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

	public function feedbacks_add()
	{
		$this->verifcar_sessao();
		$this->load->model("feedbacks_model");
		$type_feedbacks = $this->feedbacks_model->listTypeFeedbackCombo();

		$dados = array(
			"type_feedbacks"=>$type_feedbacks
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('feedbacks/addfeedback.php',$dados);
		$this->load->view('include/footer');
	}

	public function manager_feedbacks_add()
	{
		$this->verifcar_sessao();
		$this->load->model("feedbacks_model");
		$type_feedbacks = $this->feedbacks_model->listTypeFeedbackCombo();

		$dados = array(
			"type_feedbacks"=>$type_feedbacks
		);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('feedbacks/manageraddfeedback.php',$dados);
		$this->load->view('include/footer');
	}


	public function saveFeedback()
	    {
	        $this->verifcar_sessao();


	        $data['manager'] = $this->input->post('manager');
	        $data['worker_id'] = $this->input->post('worker_id');
	        $data['type_feedback_id'] = $this->input->post('type_feedback_id');
	        $data['strengths'] = $this->input->post('strengths');
	        $data['improvements'] = $this->input->post('improvements');
	        $data['feed_manager'] = $this->input->post('feed_manager');
	        $data['created'] = date('Y-m-d H:i:s');
	        $data['modified'] = date('Y-m-d H:i:s');
	        $data['user_id'] = $this->session->userdata('id');

	        // echo "<pre>";
	        // print_r($data);
	        // echo "</pre>";
	        // die();

	        $this->load->model('feedbacks_model', 'model', TRUE);

	            if ($this->model->saveFeedbacks($data)) {
	                        redirect('feedbacks/listfeedbacks/1');
	            } else {
	                        redirect('feedbacks/listfeedbacks/2');
	            }
	    }

	    public function managersaveFeedback()
	    {
	        $this->verifcar_sessao();


	        $data['manager'] = $this->input->post('manager');
	        $data['worker_id'] = $this->input->post('worker_id');
	        $data['type_feedback_id'] = $this->input->post('type_feedback_id');
	        $data['strengths'] = $this->input->post('strengths');
	        $data['improvements'] = $this->input->post('improvements');
	        $data['feed_manager'] = $this->input->post('feed_manager');
	        $data['created'] = date('Y-m-d H:i:s');
	        $data['modified'] = date('Y-m-d H:i:s');
	        $data['user_id'] = $this->session->userdata('id');

	        // echo "<pre>";
	        // print_r($data);
	        // echo "</pre>";
	        // die();

	        $this->load->model('feedbacks_model', 'model', TRUE);

	            if ($this->model->saveFeedbacks($data)) {
	                        redirect('feedbacks/teamfeedbacks/1');
	            } else {
	                        redirect('feedbacks/teamfeedbacks/2');
	            }
	    }




	    public function view_feedback()
	    {
	        $this->verifcar_sessao();

	        $this->load->model("feedbacks_model");
	        $this->data['result'] = $this->feedbacks_model->listEditFeedbacks($this->uri->segment(3));

	        $dados = array("result"=>$this->data['result']);

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        $this->load->view('feedbacks/feedbackuserview.php', $dados);
	        $this->load->view('include/footer');
	    }

	     public function feedreview($id=null)
	    {
	        $this->verifcar_sessao();

	        // $this->load->model("tasks_model");
	         $this->load->model(array('feedbacks_model','tasks_model'));
	        $teams = $this->tasks_model->listWorkers($this->uri->segment(3));
	        $teamOne = $this->tasks_model->listOneTeams($this->uri->segment(3));
	        $listWorker = $this->tasks_model->listTasksWorker($this->uri->segment(3));
	        $listEditFeedbacks2 = $this->feedbacks_model->listEditFeedbacks2($this->uri->segment(3));

	        $dados = array("teams"=>$teams,
	                        "teamOne"=>$teamOne,
	                        "listWorker"=>$listWorker,
	                        "listEditFeedbacks2"=>$listEditFeedbacks2
	        );

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        $this->load->view('feedbacks/feedbackuserreview.php',$dados);
	        $this->load->view('include/footer');
	    }

	    public function delete_feedback($id=null)
	    {
	        $this->verifcar_sessao();

	        $this->db->where('id',$id);
	        if ($this->db->delete('feedbacks')) {
	                        redirect('feedbacks/listfeedbacks/3');
	            } else {
	                        redirect('feedbacks/listfeedbacks/4');
	            }
	    }


	    public function feedback_edit()
	{
		$this->verifcar_sessao();
		$this->load->model(array('feedbacks_model','medicalcertificates_model'));
		$this->data['workers'] =$this->medicalcertificates_model->listWorkersCombo();
		$type_feedbacks = $this->feedbacks_model->listTypeFeedbackCombo();
	             $this->data['result'] = $this->feedbacks_model->listEditFeedbacks($this->uri->segment(3));

	             $dados = array("result"=>$this->data['result'], "type_feedbacks"=>$type_feedbacks, "workers"=>$this->data['workers'],);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('feedbacks/editfeedback.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveEditFeedback()
	    {
	        $this->verifcar_sessao();

	        $id = $this->input->post('id');
	        $data['manager'] = $this->input->post('manager');
	        $data['worker_id'] = $this->input->post('worker_id');
	        $data['type_feedback_id'] = $this->input->post('type_feedback_id');
	        $data['strengths'] = $this->input->post('strengths');
	        $data['improvements'] = $this->input->post('improvements');
	        $data['feed_manager'] = $this->input->post('feed_manager');

	        $data['modified'] = date('Y-m-d H:i:s');
	        $data['user_id'] = $this->session->userdata('id');


	        $this->load->model('feedbacks_model', 'model', TRUE);

	            if ($this->model->saveEditFeedbacks($data,$id)) {
	                        redirect('tasks');
	            } else {
	                        redirect('tasks');
	            }
	    }


	     // Mostra equipe pelo tipo de permissao do usuario as equipes
	    public function teamfeedbacks($id=null)
	    {
	        $this->verifcar_sessao();

	        // Session id
	        $data['user_id'] = $this->session->userdata('id');
	        $session_id = $data['user_id'];

	        if($session_id != $id){
	            redirect('tasks');
	        } else {

	        $this->load->model("tasks_model");
	        // $this->load->model(array('measures_model','medicalcertificates_model'));
	        $teams = $this->tasks_model->listTeams($this->uri->segment(3));

	        $dados = array("teams"=>$teams);

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        $this->load->view('feedbacks/teamfeedbacks.php',$dados);
	        $this->load->view('include/footer');

	        };
	    }

	    public function tdfeedbacks($id=null)
	    {
	        $this->verifcar_sessao();

	        $this->load->model("tasks_model");
	        $teams = $this->tasks_model->listWorkers($this->uri->segment(3));
	        $teamOne = $this->tasks_model->listOneTeams($this->uri->segment(3));

	        $dados = array("teams"=>$teams,
	                        "teamOne"=>$teamOne,
	            );

	        $this->load->view('include/header');
	        $this->load->view('include/menu_top');
	        $this->load->view('include/menu');
	        $this->load->view('feedbacks/tdfeedbacks.php',$dados);
	        $this->load->view('include/footer');
	    }

	    public function view_feedbackPDF()
	    {
	        $this->verifcar_sessao();

	        $this->load->model("feedbacks_model");
	        $this->data['result'] = $this->feedbacks_model->listEditFeedbacks($this->uri->segment(3));

	        $dados = array("result"=>$this->data['result']);


	        $html=$this->load->view('feedbackuserviewPDF', $dados, true);
		$pdfFilePath = "printFeedback.pdf";
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "I");


	    }



}
