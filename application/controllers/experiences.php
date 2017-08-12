<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Experiences extends CI_Controller {

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
            $data['msg'] = "Este funcionário já tem avaliação cadastrada no Sistema!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/index.php');
        $this->load->view('include/footer');
    }

        public function experiencesOne($indice=null)
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
            $data['msg'] = "Este funcionário já tem avaliação cadastrada no Sistema!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/experienceone.php');
        $this->load->view('include/footer');
    }

    public function experListOne($indice=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $id = $this->session->userdata('id');
        $teams_users = $this->users_model->teams_users($id);
         $listTeams = array();
         foreach($teams_users as $value){
            $listTeams[] = $value->team_id;
         }

        $listexperiences = $this->experiences_model->experListOne($listTeams);

        $dados = array(
            "listexperiences"=>$listexperiences
        );
        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        if ($indice==1) {
            $data['msg'] = "Cadastro com sucesso!";
            $this->load->view('include/msg_success',$data);
        } else if ($indice==2) {
            $data['msg'] = "Este funcionário já tem avaliação cadastrada no Sistema, nesse perído! <br />
                                    Favor conferir nas opções <strong>(Editar ou Concluir Avaliação de Experiência)</strong> ou em <strong>(Avaliações finalizadas)</strong>! ";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/explistone.php',$dados);
        $this->load->view('include/footer');
    }

    public function editExpOne($indice=null)
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");
        $editexperiences = $this->experiences_model->listExperiencesOne();

        $dados = array(
            "editexperiences"=>$editexperiences
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        if ($indice==1) {
            $data['msg'] = "Cadastro com sucesso!";
            $this->load->view('include/msg_success',$data);
        } else if ($indice==2) {
            $data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/expeditone.php',$dados);
        $this->load->view('include/footer');
    }

        public function listFinishOne($indice=null)
    {
        $this->verifcar_sessao();
        // $this->load->model("experiences_model");
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $id = $this->session->userdata('id');
        $teams_users = $this->users_model->teams_users($id);
         $listTeams = array();
         foreach($teams_users as $value){
            $listTeams[] = $value->team_id;
         }

        $listFinishOnes = $this->experiences_model->listFinishOne($listTeams);


        // echo "<pre>";
        // print_r($nameRh);
        // echo "</pre>";
        // die();

        $dados = array(
            "listFinishOnes" => $listFinishOnes
        );


        $this->load->view('include/headerpopup');
        if ($indice==1) {
            $data['msg'] = "Cadastro com sucesso!";
            $this->load->view('include/msg_success',$data);
        } else if ($indice==2) {
            $data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/explistonefinish.php',$dados);
        $this->load->view('include/footer');
    }

    public function experienceadd($id=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $listCoordenators = $this->experiences_model->listCoordenator();
        $type_attendances = $this->experiences_model->type_attendances();
        $empExperiences= $this->experiences_model->listEditExperience($this->uri->segment(3));


        // Attendances worker_id
        $worker_id = $empExperiences->wid;
        $validate_experiences1 = $this->experiences_model->validate_experiences1($worker_id);
        $count_experience = count($validate_experiences1);
        if ($count_experience == 0) {

        $attendances = $this->experiences_model->attendances($worker_id);
        $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
        $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);
        $medical_certificates = $this->experiences_model->medical_certificates($worker_id);


        $id = $this->session->userdata('id');
        $level_user = $this->users_model->level_user($id);


        $dados = array(
            "empExperiences"=>$empExperiences,
            "listCoordenators"=>$listCoordenators,
            "attendances"=>$attendances,
            "type_attendances"=>$type_attendances,
            "disciplinary_measures"=>$disciplinary_measures,
            "medical_certificates"=>$medical_certificates,
            "level_user"=>$level_user,
            "listEditFeedbacks"=>$listEditFeedbacks
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('experiences/experienceadd.php',$dados);
        $this->load->view('include/footer');
    } else {
        redirect('/experiences/experListOne/2');
    }
    }

    public function saveexperienceOne()
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");

        $values_Coordinator = $this->input->post('coordinator_id1');
        $Coordinator = explode("&", $values_Coordinator);
        $email_coordinator = $Coordinator[0];
        $id_coordinator = $Coordinator[1];


       $worker_id = $this->input->post('worker_id');
       $validate_experiences1 = $this->experiences_model->validate_experiences1($worker_id);
       $count_experience = count($validate_experiences1);
       if ($count_experience == 0) {
            $data['hire_date'] = $this->input->post('hire_date');
            $data['period1'] = 1;
            $data['worker_id'] = $this->input->post('worker_id');
            $data['supervisor_id1'] = $this->input->post('supervisor_id1');
            $data['final_experience'] = $this->input->post('final_experience');
            $data['team_id1'] = $this->input->post('team_id1');
            $data['final_experience1'] = $this->input->post('final_experience1');
            $data['sales1'] = $this->input->post('sale1');
            $data['sales2'] = $this->input->post('sale2');
            $data['description_sales1'] = $this->input->post('description_sales1');
            $data['description_behavioral1'] = $this->input->post('description_behavioral1');
            $data['description_attendance1'] = $this->input->post('description_attendance1');
            $data['value_quality1'] = $this->input->post('value_quality1');
            $data['value_quality2'] = $this->input->post('value_quality2');
            $data['value_quality3'] = $this->input->post('value_quality3');
            $data['average_quality1'] = $this->input->post('average_quality1');
            $data['description_quality1'] = $this->input->post('description_quality1');
            $data['description_measure1'] = $this->input->post('description_measure1');
            $data['sup_approved1'] = $this->input->post('sup_approved1');
            $data['coordinator_id1'] = $id_coordinator;
            $data['date_coord1'] = date('Y-m-d H:i:s');
            $data['description_sup1'] = $this->input->post('description_sup1');
            // $data['finish_pediod1'] = $this->input->post('finish_pediod1');
            $data['finish_pediod1'] = 0;
            $data['rh_approved1'] = 0;
            $data['date_rh1'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->input->post('user_id');
            $data['accomplished_date1'] = date('Y-m-d H:i:s');
            $data['coord_approved1'] = 0;

            // Start Period 2
            $data['period2'] = 0;
            // Date final -> final_experience1 to start_experience2
            $data['start_experience2'] = $this->input->post('final_experience1');
            // Date final -> final_experience to final_experience2
            $data['final_experience2'] = $this->input->post('final_experience');

            $data['finish_pediod2'] = 0;
            $data['rh_approved2'] = 0;
            $data['date_coord2'] = date('Y-m-d H:i:s');
            $data['date_rh2'] = date('Y-m-d H:i:s');
            $data['accomplished_date2'] = date('Y-m-d H:i:s');

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();

            $this->load->model('experiences_model', 'model', TRUE);
                if ($this->model->saveexperiences1($data)) {
                    $this->load->model("experiences_model");
                    $worker_id = $this->input->post('worker_id');
                    $workers = $this->experiences_model->listWorker($worker_id);
                    $name_worker = $workers[0]->ename;
                    $team_worker = $workers[0]->tname;

                    // Update employees experiences
                    $id = $workers[0]->eid;
                    $data2['experience1'] = "1";
                    $data2['experience2'] = "0";
                    $this->model->saveeditemployeesExperience($data2,$id);

                            $this->load->library("email");
                            $config['protocol'] = 'smtp';
                            $config['smtp_host'] = 'mail.guiacontato.com.br';
                            $config['smtp_port'] = 587;
                            $config['smtp_user'] = 'contato@guiacontato.com.br'; // email id
                            $config['smtp_pass'] = 'contato10'; // email password
                            $config['mailtype'] = 'html';
                            $config['wordwrap'] = TRUE;
                            $config['charset'] = 'utf-8';
                            $config['newline'] = "\r\n"; //use double quotes here
                            $this->email->initialize($config);

                            $this->email->from("contato@guiacontato.com.br", "SGP - 1º período de experiência.");
                            $this->email->to(array("{$email_coordinator}"));
                            $this->email->subject("SGP - 1º período de experiência do(a) {$name_worker}");
                            $this->email->message(
                                "<strong>Mensagem enviada pelo sistema SGP!</strong><br>
                                <strong>Avaliação do 1º período de experiencia do funcionário.</strong><br>
                                <strong>Funcionario: </strong>{$name_worker} <br>
                                <strong>Equipe/Setor: </strong>{$team_worker} <br>
                                "
                            );
                            $this->email->send();

                            redirect('experiences/1');
                } else {
                            redirect('experiences/2');
                }

        } else {
        redirect('experiences/6');
      }

    }

    public function editExperienceOne($id=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $listCoordenators = $this->experiences_model->listCoordenator();
        $type_attendances = $this->experiences_model->type_attendances();
        $empExperiences= $this->experiences_model->editExperiencesOne($this->uri->segment(3));

        // Attendances worker_id
        $worker_id = $empExperiences->wid;
        $attendances = $this->experiences_model->attendances($worker_id);
        $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
        $medical_certificates = $this->experiences_model->medical_certificates($worker_id);
        $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);

        // Coord
        $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
        $coord = $this->experiences_model->coord_id($coord_id);


        $id = $this->session->userdata('id');
        $level_user = $this->users_model->level_user($id);


        $dados = array(
            "empExperiences"=>$empExperiences,
            "listCoordenators"=>$listCoordenators,
            "attendances"=>$attendances,
            "type_attendances"=>$type_attendances,
            "disciplinary_measures"=>$disciplinary_measures,
            "medical_certificates"=>$medical_certificates,
            "level_user"=>$level_user,
            "coord"=> $coord,
            "listEditFeedbacks"=>$listEditFeedbacks
        );


        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('experiences/editexperienceone.php',$dados);
        $this->load->view('include/footer');
    }




    // // Edit coordinator
    // public function editExperienceOneCoord2($id=null)
    // {
    //     $this->verifcar_sessao();
    //     $models = array(
    //        'experiences_model' => 'experiences_model',
    //        'users_model' => 'users_model'
    //     );
    //     $this->load->model($models);

    //     $listCoordenators = $this->experiences_model->listCoordenator();
    //     $type_attendances = $this->experiences_model->type_attendances();
    //     $empExperiences= $this->experiences_model->editExperiencesOne($this->uri->segment(3));


    //     // Attendances worker_id
    //     $worker_id = $empExperiences->wid;
    //     $attendances = $this->experiences_model->attendances($worker_id);
    //     $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
    //     $medical_certificates = $this->experiences_model->medical_certificates($worker_id);

    //             // Coord
    //     $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
    //     $coord = $this->experiences_model->coord_id($coord_id);


    //     $id = $this->session->userdata('id');
    //     $level_user = $this->users_model->level_user($id);


    //     $dados = array(
    //         "empExperiences"=>$empExperiences,
    //         "listCoordenators"=>$listCoordenators,
    //         "attendances"=>$attendances,
    //         "type_attendances"=>$type_attendances,
    //         "disciplinary_measures"=>$disciplinary_measures,
    //         "medical_certificates"=>$medical_certificates,
    //         "level_user"=>$level_user,
    //         "coord"=> $coord
    //     );

    //     echo "<pre>";
    //     print_r($dados);
    //     echo "</pre>";
    //     die();

    //     $this->load->view('include/header');
    //     $this->load->view('include/menu_top');
    //     $this->load->view('include/menu');
    //     $this->load->view('experiences/editexperienceone.php',$dados);
    //     $this->load->view('include/footer');
    // }

    // public function experienceCoord($id=null)
    // {
    //     $this->verifcar_sessao();
    //     $models = array(
    //        'experiences_model' => 'experiences_model',
    //        'users_model' => 'users_model'
    //     );
    //     $this->load->model($models);

    //     $listCoordenators = $this->experiences_model->listCoordenator();
    //     $type_attendances = $this->experiences_model->type_attendances();
    //     $empExperiences= $this->experiences_model->editExperiencesOne($this->uri->segment(3));

    //     // Attendances worker_id
    //     $worker_id = $empExperiences->wid;
    //     $attendances = $this->experiences_model->attendances($worker_id);
    //     $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
    //     $medical_certificates = $this->experiences_model->medical_certificates($worker_id);
    //     $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);

    //     // Coord
    //     $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
    //     $coord = $this->experiences_model->coord_id($coord_id);


    //     $id = $this->session->userdata('id');
    //     $level_user = $this->users_model->level_user($id);


    //     $dados = array(
    //         "empExperiences"=>$empExperiences,
    //         "listCoordenators"=>$listCoordenators,
    //         "attendances"=>$attendances,
    //         "type_attendances"=>$type_attendances,
    //         "disciplinary_measures"=>$disciplinary_measures,
    //         "medical_certificates"=>$medical_certificates,
    //         "level_user"=>$level_user,
    //         "coord"=> $coord,
    //         "listEditFeedbacks"=>$listEditFeedbacks
    //     );


    //     $this->load->view('include/header');
    //     $this->load->view('include/menu_top');
    //     $this->load->view('include/menu');
    //     $this->load->view('experiences/editexperienceone.php',$dados);
    //     $this->load->view('include/footer');
    // }


     public function saveEditexperienceOne()
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");

            $id = $this->input->post('id');
            $data['hire_date'] = $this->input->post('hire_date');
            $data['period1'] = 1;
            $data['worker_id'] = $this->input->post('worker_id');
            $data['supervisor_id1'] = $this->input->post('supervisor_id1');
            $data['final_experience'] = $this->input->post('final_experience');
            $data['team_id1'] = $this->input->post('team_id1');
            $data['final_experience1'] = $this->input->post('final_experience1');
            $data['sales1'] = $this->input->post('sale1');
            $data['sales2'] = $this->input->post('sale2');
            $data['description_sales1'] = $this->input->post('description_sales1');
            $data['description_behavioral1'] = $this->input->post('description_behavioral1');
            $data['description_attendance1'] = $this->input->post('description_attendance1');
            $data['value_quality1'] = $this->input->post('value_quality1');
            $data['value_quality2'] = $this->input->post('value_quality2');
            $data['value_quality3'] = $this->input->post('value_quality3');
            $data['average_quality1'] = $this->input->post('average_quality1');
            $data['description_quality1'] = $this->input->post('description_quality1');
            $data['description_measure1'] = $this->input->post('description_measure1');
            $data['sup_approved1'] = $this->input->post('sup_approved1');
            $data['coordinator_id1'] = $this->input->post('coordinator_id1');
            $data['description_sup1'] = $this->input->post('description_sup1');
            // $data['finish_pediod1'] = $this->input->post('finish_pediod1');
            $data['finish_pediod1'] = 0;
            $data['user_id'] = $this->input->post('user_id');
            $data['accomplished_date1'] = date('Y-m-d H:i:s');
            $data['coord_approved1'] = 0;

            $this->load->model('experiences_model', 'model', TRUE);

                if ($this->model->updateexperiences1($data,$id)) {
                            redirect('experiences/5');
                } else {
                            redirect('experiences/6');
                }

    }


//===================Experience Coord =====================================================//

public function editExpOneCood($indice=null)
    {
        $this->verifcar_sessao();
        $id = $this->session->userdata('id');
        $this->load->model("experiences_model");
        $editexperiences = $this->experiences_model->listExperiencesCoordOne($id);

        $dados = array(
            "editexperiences"=>$editexperiences
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        if ($indice==1) {
            $data['msg'] = "Cadastro com sucesso!";
            $this->load->view('include/msg_success',$data);
        } else if ($indice==2) {
            $data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/listExpCoord.php',$dados);
        $this->load->view('include/footer');
    }

    public function editExperienceOneCoord($id=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $listCoordenators = $this->experiences_model->listCoordenator();
        $type_attendances = $this->experiences_model->type_attendances();
        $empExperiences= $this->experiences_model->editExperiencesOne($this->uri->segment(3));

        // Attendances worker_id
        $worker_id = $empExperiences->wid;
        $attendances = $this->experiences_model->attendances($worker_id);
        $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
        $medical_certificates = $this->experiences_model->medical_certificates($worker_id);
        $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);

        // Coord
        $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
        $coord = $this->experiences_model->coord_id($coord_id);


        $id = $this->session->userdata('id');
        $level_user = $this->users_model->level_user($id);


        $dados = array(
            "empExperiences"=>$empExperiences,
            "listCoordenators"=>$listCoordenators,
            "attendances"=>$attendances,
            "type_attendances"=>$type_attendances,
            "disciplinary_measures"=>$disciplinary_measures,
            "medical_certificates"=>$medical_certificates,
            "level_user"=>$level_user,
            "coord"=> $coord,
            "listEditFeedbacks"=>$listEditFeedbacks
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('experiences/experienceone_coord.php',$dados);
        $this->load->view('include/footer');
    }



    public function saveEditExpCoordOne()
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");

            $id = $this->input->post('id');

            $data['id_coord1'] = $this->input->post('user_id');
            $data['date_coord1'] = date('Y-m-d H:i:s');
            $data['finish_pediod_coord1'] = 1;
            $data['coord_approved1'] = $this->input->post('coordinator_id1');
            $data['description_coord1'] = $this->input->post('description_coord1');

            $this->load->model('experiences_model', 'model', TRUE);

                if ($this->model->updateexperiences1($data,$id)) {
                            redirect('experiences/editExpOneCood');
                } else {
                            redirect('experiences/editExpOneCood');
                }

    }

//===================Finish Experience Coord ================================================//

//=================== Experience RH =====================================================//

 public function editExpOneRH($indice=null)
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");
        $editexperiences = $this->experiences_model->listExperiencesOneRH();

        $dados = array(
            "editexperiences"=>$editexperiences
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        if ($indice==1) {
            $data['msg'] = "Cadastro com sucesso!";
            $this->load->view('include/msg_success',$data);
        } else if ($indice==2) {
            $data['msg'] = "Erro ao cadastrar, conferir os dados para o cadastro!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/expeditoneRH.php',$dados);
        $this->load->view('include/footer');
    }




public function editExperienceOneRH($id=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $listCoordenators = $this->experiences_model->listCoordenator();
        $type_attendances = $this->experiences_model->type_attendances();
        $empExperiences= $this->experiences_model->editExperiencesOne($this->uri->segment(3));

        // Attendances worker_id
        $worker_id = $empExperiences->wid;
        $attendances = $this->experiences_model->attendances($worker_id);
        $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
        $medical_certificates = $this->experiences_model->medical_certificates($worker_id);
        $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);

        // Coord
        $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
        $coord = $this->experiences_model->coord_id($coord_id);


        $id = $this->session->userdata('id');
        $level_user = $this->users_model->level_user($id);


        $dados = array(
            "empExperiences"=>$empExperiences,
            "listCoordenators"=>$listCoordenators,
            "attendances"=>$attendances,
            "type_attendances"=>$type_attendances,
            "disciplinary_measures"=>$disciplinary_measures,
            "medical_certificates"=>$medical_certificates,
            "level_user"=>$level_user,
            "coord"=> $coord,
            "listEditFeedbacks"=>$listEditFeedbacks
        );


        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('experiences/experienceone_rh.php',$dados);
        $this->load->view('include/footer');
    }


 public function saveEditExpRHOne()
    {
        $this->verifcar_sessao();
        $this->load->model("experiences_model");

            $id = $this->input->post('id');

            $data['id_rh1'] = $this->input->post('user_id');
            $data['date_rh1'] = date('Y-m-d H:i:s');
            $data['rh_approved1'] = $this->input->post('rh_approved1');
            $data['description_rh1'] = $this->input->post('description_rh1');
            $data['reason_experience_rh1'] = $this->input->post('reason_experience_rh1');
            $data['finish_pediod1'] = $this->input->post('finish_pediod1');

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();

            $this->load->model('experiences_model', 'model', TRUE);

                if ($this->model->updateexperiences1($data,$id)) {
                            redirect('experiences/editExpOneRH');
                } else {
                            redirect('experiences/editExpOneRH');
                }

    }

//=================== Finish Experience RH ===============================================//


//View Experiense One
    public function viewExperienceOne($id=null)
    {
        $this->verifcar_sessao();
        $models = array(
           'experiences_model' => 'experiences_model',
           'users_model' => 'users_model'
        );
        $this->load->model($models);

        $listCoordenators = $this->experiences_model->listCoordenator();
        $type_attendances = $this->experiences_model->type_attendances();
        $empExperiences= $this->experiences_model->viewExperiencesOne($this->uri->segment(3));

        // Attendances worker_id
        $worker_id = $empExperiences->wid;
        $attendances = $this->experiences_model->attendances($worker_id);
        $disciplinary_measures = $this->experiences_model->disciplinary_measures($worker_id);
        $medical_certificates = $this->experiences_model->medical_certificates($worker_id);
        $listEditFeedbacks = $this->experiences_model->listEditFeedbacks($worker_id);

                // Coord
        $coord_id = $worker_id = $empExperiences->ecoordinatorid1;
        $coord = $this->experiences_model->coord_id($coord_id);


        $id = $this->session->userdata('id');
        $level_user = $this->users_model->level_user($id);


        $dados = array(
            "empExperiences"=>$empExperiences,
            "listCoordenators"=>$listCoordenators,
            "attendances"=>$attendances,
            "type_attendances"=>$type_attendances,
            "disciplinary_measures"=>$disciplinary_measures,
            "medical_certificates"=>$medical_certificates,
            "level_user"=>$level_user,
            "coord"=> $coord,
            "listEditFeedbacks"=>$listEditFeedbacks
        );

        $this->load->view('include/header');
        $this->load->view('include/menu_top');
        $this->load->view('include/menu');
        $this->load->view('experiences/viewexperienceone.php',$dados);
        $this->load->view('include/footer');
    }








    public function experiencesTwo($indice=null)
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
            $data['msg'] = "Este funcionário já tem avaliação cadastrada no Sistema!";
            $this->load->view('include/msg_error',$data);
        }
        $this->load->view('experiences/experiencetwo.php');
        $this->load->view('include/footer');
    }

}