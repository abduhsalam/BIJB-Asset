<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model("Model_login");
	}
	
	public function index()
	{
		/*
		$server = "http://".$_SERVER["SERVER_NAME"];

		redirect($server."/bis");
		*/
		
		$this->load->view('login');
	}
	
	public function action()
	{
		$data	=	$this->Model_login->check_login();
		$status	=	$this->Model_login->get_status_menu();
		//print_r($status);
		if($data)
		{
				$data = array(
					
				'is_logged'		=> true,
				'key'			=> $data->user_id,
				'unit'			=> $data->id_struktur,
				'user_login'	=> $data->user_name,
				'email'			=> $data->email,
				'akses'			=> explode(',',$data->akses_menu),
				'menu'			=> explode(',',$data->menu),
				'avatar'		=> ($data->user_avatar == true) ? $data->user_avatar : 'avatar.png',
				'akses_menu'	=> ($status)?explode(',',$status->menu):array(),
				'unm'			=> $this->input->post("username"),
				'direktorat' 	=> $data->direktorat,
                'unitkerja' 	=> $data->unitkerja,
                'status_atasan' => $data->status_atasan,
                'id_unitkerja' 	=> $data->id_unitkerja
				);
				
				$this->session->set_userdata($data);
				
				redirect("/");
				
		}
		else
		{
			$this->session->set_flashdata("err","
			<div class='alert alert-danger' style='font-size:12px'>
				<button type='button' class='close' data-dismiss='alert'>
					<i class='icon-remove'></i>
				</button>

				<strong>
					<i class='icon-remove'></i>
					Sorry!
				</strong>

				Username or Password it's wrong
				<br>
				</div>
			");
			redirect('login');
		
			//echo sha1($this->input->post('username').$this->input->post('password'));
		}	
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login");
	}
	
}
