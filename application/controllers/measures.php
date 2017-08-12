<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Measures extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
    }

    public function verifcar_sessao(){
        if($this->session->userdata('logado') == false){
            redirect('dashboard/login');
        }
    }

    public function index($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        // $this->load->model("measures_model");
        // $measures = $this->measures_model->listMeasures();

        // $dados = array("measures"=>$measures);

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
        $this->load->view('measures/index.php');
        $this->load->view('include/footer');
    }

    // Reasons

    public function reason($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        $this->load->model("measures_model");
        $reasons = $this->measures_model->listReason();

        $dados = array("reasons"=>$reasons);

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
        $this->load->view('measures/reason.php', $dados);
        $this->load->view('include/footer');
    }

    public function reason_add()
    {
        $this->verifcar_sessao();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/reason_add.php');
        $this->load->view('include/footer');
    }

    public function savereason()
    {
        $this->verifcar_sessao();

        $data['name'] = $this->input->post('name');
        $data['created'] = date('Y-m-d H:i:s');
        $data['modified'] = date('Y-m-d H:i:s');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->model('measures_model', 'model', TRUE);
            if ($this->model->saveReason($data)) {
                        redirect('measures/reason/1');
            } else {
                        redirect('measures/reason/2');
            }
    }

    public function reason_edit($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        $this->db->where('id',$indice);
        $data['reason_measures'] = $this->db->get('reason_measures')->result();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');

        $this->load->view('measures/reason_edit.php', $data);
        $this->load->view('include/footer');
    }




    public function delete($id=null)
    {
        $this->verifcar_sessao();

        $this->db->where('id',$id);
        if ($this->db->delete('reason_measures')) {
                        redirect('measures/reason/3');
            } else {
                        redirect('measures/reason/4');
            }
    }

    public function saveEditreason()
    {
        $this->verifcar_sessao();

        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['modified'] = date('Y-m-d H:i:s');

        // echo "<pre>";
        // var_dump($data,$id);
        // echo "</pre>";
        // die();

        $this->load->model('measures_model', 'model', TRUE);

            if ($this->model->saveeditReason($data,$id)) {
                        redirect('measures/reason/5');
            } else {
                        redirect('measures/reason/6');
            }
    }

    // Finish reasons

    // Type Measures
        public function typeMeasures($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        $this->load->model("measures_model");
        $typeMeasures = $this->measures_model->listTypeMeasures();

        $dados = array("typeMeasures"=>$typeMeasures);

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
        $this->load->view('measures/typemeasures.php', $dados);
        $this->load->view('include/footer');
    }

     public function typeMeasures_add()
    {
        $this->verifcar_sessao();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/typemeasures_add.php');
        $this->load->view('include/footer');
    }

    public function savetypemeasure()
    {
        $this->verifcar_sessao();

        $data['name'] = $this->input->post('name');
        $data['created'] = date('Y-m-d H:i:s');
        $data['modified'] = date('Y-m-d H:i:s');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->model('measures_model', 'model', TRUE);
            if ($this->model->saveTypeMeasure($data)) {
                        redirect('measures/typeMeasures/1');
            } else {
                        redirect('measures/typeMeasures/2');
            }
    }

    public function typeMeasure_edit($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        $this->db->where('id',$indice);
        $data['type_measures'] = $this->db->get('type_measures')->result();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');

        $this->load->view('measures/typemeasure_edit.php', $data);
        $this->load->view('include/footer');
    }

    public function saveEditTypemeasure()
    {
        $this->verifcar_sessao();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['modified'] = date('Y-m-d H:i:s');

        // echo "<pre>";
        // var_dump($data,$id);
        // echo "</pre>";
        // die();
        $this->load->model('measures_model', 'model', TRUE);
            if ($this->model->saveeditTypeMeasure($data,$id)) {
                        redirect('measures/typeMeasures/5');
            } else {
                        redirect('measures/typeMeasures/6');
            }
    }

    public function typeMeasures_delete($id=null)
    {
        $this->verifcar_sessao();

        $this->db->where('id',$id);
        if ($this->db->delete('type_measures')) {
                        redirect('measures/typeMeasures/3');
            } else {
                        redirect('measures/typeMeasures/4');
            }
    }

    // Finish Type Measures


    // Measures

    public function listmeasures($indice=null)
    {
        /*Verifica Sessão*/
        $this->verifcar_sessao();

        $this->load->model("measures_model");

        $busca = $this->measures_model->get_measures();
        $busca = $this->input->get('busca');
        $url_paginacao = $busca != NULL ? base_url('/measures/listmeasures?busca='.$busca.'&') :
                 base_url('/measures/listmeasures?');


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
                $get_total_results = $this->measures_model->get_measures($busca);

                  $total_resultados = $get_total_results['total'];
                  $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 100);


                $get_users = $this->measures_model->get_measures($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


                 $this->load->view('measures/listmeasures',
                         array(
                                 "measures"=>$get_users['dados'],
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




    // Start Measures
    public function measures_add()
    {
        $this->verifcar_sessao();

        $this->load->model("measures_model");
        $reasons = $this->measures_model->listReason();
        $typeMeasures = $this->measures_model->listTypeMeasures();

        $dados = array(
                        "reasons"=>$reasons,
                        "typeMeasures"=>$typeMeasures
        );
        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/measures_add.php', $dados );
        $this->load->view('include/footer');
    }


    public function saveMeasure()
    {
        $this->verifcar_sessao();

        //Convert date delivery_date
        $datadelivery = $this->input->post('delivery_date');
        // $datadelivery = explode('/', $datadelivery);
        // $datadelivery = $datadelivery[2].'-'.$datadelivery[1].'-'.$datadelivery[0];

        $dataapplication = $this->input->post('application_date');
        $datastart = $this->input->post('removal_start');
        $datafinish = $this->input->post('removal_finish');
        $datareturn = $this->input->post('return_date');
        $data['worker_id'] = $this->input->post('worker_id');

        $data['delivery_date'] = $datadelivery;
        $data['type_measure_id'] = $this->input->post('type_measure_id');
        $data['reason_measure_id'] = $this->input->post('reason_measure_id');
        $data['application_date'] = $dataapplication;
        $data['occurrence_date'] = $this->input->post('occurrence_date');
        $data['removal_start'] = $datastart;
        $data['removal_finish'] = $datafinish;
        $data['return_date'] = $datareturn;
        $data['removal'] = $this->input->post('removal');
        $data['description'] = $this->input->post('description');

        $data['created'] = date('Y-m-d H:i:s');
        $data['modified'] = date('Y-m-d H:i:s');
        $data['user_id'] = $this->session->userdata('id');

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->model('measures_model', 'model', TRUE);

            if ($this->model->saveMeasures($data)) {
                        redirect('measures/listmeasures/1');
            } else {
                        redirect('measures/listmeasures/2');
            }
    }

    public function view_measure()
    {
        $this->verifcar_sessao();

        $this->load->model("measures_model");
        $this->data['reason'] = $this->measures_model->listReason();
        $this->data['typeMeasures'] = $this->measures_model->listTypeMeasures();
        $this->data['result'] = $this->measures_model->listEditMeasures($this->uri->segment(3));

        $dados = array(//"reason"=>$this->data['reason'],
                        //"typeMeasures"=>$this->data['typeMeasures'],
                        "result"=>$this->data['result']
                    );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/measureuserview.php', $dados);
        $this->load->view('include/footer');
    }

    public function review($id=null)
    {
        $this->verifcar_sessao();

        $this->load->model("measures_model");
        $this->data['reason'] = $this->measures_model->listReason();
        $this->data['typeMeasures'] = $this->measures_model->listTypeMeasures();
        $this->data['result'] = $this->measures_model->listEditMeasures2($id);

        $dados = array(//"reason"=>$this->data['reason'],
                        //"typeMeasures"=>$this->data['typeMeasures'],
                        "result"=>$this->data['result']
        );
        // echo "<pre>";
        // print_r($dados);
        // echo "</pre>";
        // die();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/measureuserreview.php', $dados);
        $this->load->view('include/footer');
    }

    public function delete_measure($id=null)
    {
        $this->verifcar_sessao();

        $this->db->where('id',$id);
        if ($this->db->delete('disciplinary_measures')) {
                        redirect('measures/listmeasures/3');
            } else {
                        redirect('measures/listmeasures/4');
            }
    }

    public function edit($id=null)
    {
       $this->verifcar_sessao();
        $this->load->model(array('measures_model','medicalcertificates_model'));
        // $this->load->model("measures_model");
        $this->data['reasons'] = $this->measures_model->listReason();
        $this->data['typeMeasures'] = $this->measures_model->listTypeMeasures();
        $this->data['workers'] =$this->medicalcertificates_model->listWorkersCombo();
        $this->data['result'] = $this->measures_model->listEditMeasures($this->uri->segment(3));

        $dados = array("reasons"=>$this->data['reasons'],
                        "typeMeasures"=>$this->data['typeMeasures'],
                        "workers"=>$this->data['workers'],
                        "result"=>$this->data['result']
                    );

        // echo "<pre>";
        // print_r($dados);
        // echo "</pre>";
        // die();

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/measures_edit.php', $dados);
        $this->load->view('include/footer');
    }

    public function saveEditMeasure()
    {
        $this->verifcar_sessao();
        $id = $this->input->post('id');

        //Convert date delivery_date
        $datadelivery = $this->input->post('delivery_date');
        $datadelivery = explode('/', $datadelivery);
        $datadelivery = $datadelivery[2].'-'.$datadelivery[1].'-'.$datadelivery[0];

        $dataapplication = $this->input->post('application_date');
        $dataapplication = explode('/', $dataapplication);
        $dataapplication = $dataapplication[2].'-'.$dataapplication[1].'-'.$dataapplication[0];

        $datastart = $this->input->post('removal_start');
        $datastart = explode('/', $datastart);
        $datastart = $datastart[2].'-'.$datastart[1].'-'.$datastart[0];



        $datafinish = $this->input->post('removal_finish');
        $datafinish = explode('/', $datafinish);
        $datafinish = $datafinish[2].'-'.$datafinish[1].'-'.$datafinish[0];


        $datareturn = $this->input->post('return_date');
        $datareturn = explode('/', $datareturn);
        $datareturn = $datareturn[2].'-'.$datareturn[1].'-'.$datareturn[0];


        $data['worker_id'] = $this->input->post('worker_id');

        $data['delivery_date'] = $datadelivery;
        $data['type_measure_id'] = $this->input->post('type_measure_id');
        $data['reason_measure_id'] = $this->input->post('reason_measure_id');
        $data['application_date'] = $dataapplication;
        $data['occurrence_date'] = $this->input->post('occurrence_date');
        $data['removal_start'] = $datastart;
        $data['removal_finish'] = $datafinish;
        $data['return_date'] = $datareturn;
        $data['removal'] = $this->input->post('removal');
        $data['description'] = $this->input->post('description');

        $data['modified'] = date('Y-m-d H:i:s');
        $data['user_id'] = $this->session->userdata('id');

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($id);
        // echo "</pre>";
        // die();

        $this->load->model('measures_model', 'model', TRUE);

            if ($this->model->saveEditMeasures($data,$id)) {
                        redirect('measures/listmeasures/5');
            } else {
                        redirect('measures/listmeasures/6');
            }
    }

    public function exp_excel(){

         $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('lista');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Medidas Disciplinares');
                $this->excel->getActiveSheet()->setCellValue('A3', 'Matricula'); //Employees
                $this->excel->getActiveSheet()->setCellValue('B3', 'Nome do Funcionario'); //Employees
                $this->excel->getActiveSheet()->setCellValue('C3', 'Equipe/Setor'); //Team
                $this->excel->getActiveSheet()->setCellValue('D3', 'Nr Medida'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('E3', 'Data da Aplicação'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('F3', 'Data da Ocorrência'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('G3', 'Tipo de Medida'); //Type_measures
                $this->excel->getActiveSheet()->setCellValue('H3', 'Motivo'); //Reason_measures
                $this->excel->getActiveSheet()->setCellValue('I3', 'Inicio Afastamento'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('J3', 'Fim Afastamento'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('K3', 'Total Afastamento'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('L3', 'Retorno'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('M3', 'DT Entr. no RH'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('N3', 'Observacao'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('O3', 'Usuário que cadastrou/alterou'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('P3', 'Data Cadastro'); //Disciplinary_measures
                $this->excel->getActiveSheet()->setCellValue('Q3', 'Data Modificado'); //Disciplinary_measures


                $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Lista1');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Lista2');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:Q1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#FF0000');

                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('B3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('C3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('D3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('E3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('F3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('G3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('H3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('I3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('J3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('K3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('L3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('M3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('N3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('O3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('P3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));
                $this->excel->getActiveSheet()->getStyle('Q3')->getFont()->applyFromArray(array('name' => 'Arial','color' => array('rgb' => '1a1aff')));

                // MySQL-like timestamp '2008-12-31'
                PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );

       for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                // $this->db->select('*');
                // $rs = $this->db->get('workers');

                $this->db->select('
                e.registration as eregistration,
                e.name as ename,
                t.name as tname,
                dm.id as dmid,
                dm.application_date as dmapplicationdate,
                dm.occurrence_date as dmoccurrencedate,
                tm.name as tmname,
                rm.name as rmname,
                dm.removal_start as dmremovalstart,
                dm.removal_finish as dmremovalfinish,
                dm.removal as dmremoval,
                dm.return_date as dmreturndate,
                dm.delivery_date as dmdeliverydate,
                dm.description as dmdescription,
                u.name as uname,
                dm.created as dmcreated,
                dm.modified as dmmodified
                ');
                 $this->db->from('disciplinary_measures as dm');
                 $this->db->join('workers as w', 'w.id = dm.worker_id','inner');
                 $this->db->join('users as u', 'u.id = dm.user_id','inner');
                 $this->db->join('teams as t', 't.id = w.team_id','inner');
                 $this->db->join('employees as e', 'e.id = w.employee_id','inner');
                 $this->db->join('reason_measures as rm', 'rm.id = dm.reason_measure_id','inner');
                 $this->db->join('type_measures as tm', 'tm.id = dm.type_measure_id','inner');

                $rs = $this->db->get();

                $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

                $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $filename='Lista.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache

                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');

    }

    public function view_excel()
    {
    $this->verifcar_sessao();
    $this->load->model(array('measures_model'));
    $exp_excel = $this->measures_model->exp_excel();

    $dados = array(
        "exp_excel"=>$exp_excel
    );
    $this->load->view('include/headerpopup');
    $this->load->view('measures/view_measure_excel',$dados);
    $this->load->view('include/footer');
    }


      // Mostra equipe pelo tipo de permissao do usuario as equipes
    public function teammeasures($id=null)
    {
        $this->verifcar_sessao();

        // Session id
        $data['user_id'] = $this->session->userdata('id');
        $session_id = $data['user_id'];

        if($session_id != $id){
            redirect('measures');
        } else {

        $this->load->model("tasks_model");
        // $this->load->model(array('measures_model','medicalcertificates_model'));
        $teams = $this->tasks_model->listTeams($this->uri->segment(3));

        $dados = array("teams"=>$teams);

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/teammeasures.php',$dados);
        $this->load->view('include/footer');

        };
    }

    public function tdmeasures($id=null)
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
        $this->load->view('measures/tdmeasures.php',$dados);
        $this->load->view('include/footer');
    }

    // Measure by worker
     public function dmeasureworker($id=null)
    {
        $this->verifcar_sessao();

        // $this->load->model("tasks_model");
         $this->load->model(array('measures_model','tasks_model'));
        $teams = $this->tasks_model->listWorkers($this->uri->segment(3));
        $teamOne = $this->tasks_model->listOneTeams($this->uri->segment(3));
        $listWorker = $this->tasks_model->listTasksWorker($this->uri->segment(3));
        $listMeasureEmployee = $this->measures_model->listMeasureEmployee($this->uri->segment(3));

        $dados = array("teams"=>$teams,
                        "teamOne"=>$teamOne,
                        "listWorker"=>$listWorker,
                        "listMeasureEmployee"=>$listMeasureEmployee
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('measures/dmeasureworker.php',$dados);
        $this->load->view('include/footer');
    }






}