<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workers extends CI_Controller {

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

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Funcionario cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Erro ao cadastrar!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Funcionario atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar.!";
			$this->load->view('include/msg_error',$data);
		}
		$this->load->view('workers/index.php');
		$this->load->view('include/footer');
	}

		public function listworkers($indice=null)
	{
		/*Verifica Sessão*/
		$this->verifcar_sessao();

		$this->load->model("workers_model");

		$busca = $this->workers_model->get_workers();
		$busca = $this->input->get('busca');
		$url_paginacao = $busca != NULL ? base_url('/workers/listworkers?busca='.$busca.'&') :
                 base_url('/workers/listworkers?');





		// $workers = $this->workers_model->listWorkersAdd();
		// $dados = array("workers"=>$workers);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		if ($indice==1) {
			$data['msg'] = "Funcionario cadastrado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==2) {
			$data['msg'] = "Funcionario já cadastrado numa equipe ou setor!";
			$this->load->view('include/msg_error',$data);
		} else	if ($indice==3) {
			$data['msg'] = "Deletado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==4) {
			$data['msg'] = "Erro ao deletar.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==5) {
			$data['msg'] = "Funcionario atualizado com sucesso!";
			$this->load->view('include/msg_success',$data);
		} else if ($indice==6) {
			$data['msg'] = "Erro ao atualizar.!";
			$this->load->view('include/msg_error',$data);
		} else if ($indice==7) {
			$data['msg'] = "Este funcionário já está cadastrado no sistema em outra equipe!";
			$this->load->view('include/msg_error',$data);
		}


		/**Paginação*/
        $get_total_results = $this->workers_model->get_workers($busca);

          $total_resultados = $get_total_results['total'];
          $get_paginacao = $this->paginacao_func($url_paginacao, $total_resultados, 20);


        $get_users = $this->workers_model->get_workers($busca,$get_paginacao['inicio'],$get_paginacao['qtidade_re']);


         $this->load->view('workers/listworkers.php',
                 array(
	                     "workers"=>$get_users['dados'],
	                     'busca'=>$busca,
	                     "pag"=>$get_paginacao['paginacao'])
                 );

            /*Paginação*/








		// $this->load->view('workers/listworkers.php',$dados);
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
		$this->load->model("workers_model");
		$workers = $this->workers_model->listWorkersAdd();
		$employees = $this->workers_model->listEmployee();
		$users = $this->workers_model->listUser();
		$teams = $this->workers_model->listTeam();


		$dados = array(
						"employees"=>$employees,
						"users"=>$users,
						"teams"=>$teams,
						"workers"=>$workers
					);

		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('workers/addworker.php',$dados);
		$this->load->view('include/footer');
	}

	public function saveworker()
	{
		$this->verifcar_sessao();

		$employee = $this->input->post('employee_id');
		$data['employee_id'] = $this->input->post('employee_id');
		$data['team_id'] = $this->input->post('team_id');
		$data['active'] = $this->input->post('active');
		$data['created'] = date('Y-m-d H:i:s');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		$this->load->model('workers_model', 'model', TRUE);

		$this->db->where('employee_id', $data['employee_id']);
		$num_rows = $this->db->count_all_results('workers');
		// var_dump($num_rows);
		if($num_rows > 0){
			redirect('workers/listworkers/7');
		} else {
			$this->model->saveworkers($data,$employee);
						redirect('workers/listworkers/1');
		}

			// if ($this->model->saveworkers($data,$employee)) {
			// 			redirect('workers/listworkers/1');
			// } else {
			// 			redirect('workers/listworkers/2');
			// }


	}

		public function delete($id=null)
		{
			$this->verifcar_sessao();

			$this->db->where('id',$id);
			if ($this->db->delete('workers')) {
							redirect('workers/listworkers/3');
				} else {
							redirect('workers/listworkers/4');
				}
	}

	public function edit($id=null)
	{
		$this->verifcar_sessao();

		$this->load->model("workers_model");
		$workers = $this->workers_model->listWorkersEdit($this->uri->segment(3));
		$employees = $this->workers_model->listEmployee();
		$users = $this->workers_model->listUser();
		$teams = $this->workers_model->listTeam();

		$dados = array(
						"employees"=>$employees,
						"users"=>$users,
						"teams"=>$teams,
						"workers"=>$workers
					);


		$this->load->view('include/header');
		$this->load->view('include/menu_top');
		$this->load->view('include/menu');
		$this->load->view('workers/editworker.php',$dados);
		$this->load->view('include/footer');
	}


	public function save_edit()
	{
		$this->verifcar_sessao();

		$id = $this->input->post('id');
		// $data['employee_id'] = $this->input->post('employee_id');
		$data['team_id'] = $this->input->post('team_id');
		$data['active'] = $this->input->post('active');
		$data['modified'] = date('Y-m-d H:i:s');
		$data['user_id'] = $this->session->userdata('id');

		$this->load->model('workers_model', 'model', TRUE);

			if ($this->model->saveeditworkers($data,$id)) {
						redirect('workers/listworkers/5');
			} else {
						redirect('workers/listworkers/6');
			}

	}

	public function exp_excel(){

		 $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('lista');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Lista');
                $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
                $this->excel->getActiveSheet()->setCellValue('B4', 'Lista1');
                $this->excel->getActiveSheet()->setCellValue('C4', 'Lista2');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:C1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                // $this->db->select('*');
                // $rs = $this->db->get('workers');

                $this->db->select('w.id as wid,e.name as ename,t.name as tname');
				$this->db->from('workers as w');
				$this->db->join('users as u', 'u.id = w.user_id');
				$this->db->join('employees as e', 'e.id = w.employee_id');
				$this->db->join('teams as t', 't.id = w.team_id');
				$rs = $this->db->get();

                $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

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


}
