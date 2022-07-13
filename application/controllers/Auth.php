<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function index()
	{
		if($this->session->userdata('isLog')){
			redirect('');
		}else{	
			$this->load->view('login');
		}
		
	}
	function do(){
		if($this->input->method() == 'post'){
			$username = $this->input->post('username');
			$pwd = $this->input->post('password');
			$cek = $this->model_app->view_where('users',array('users_username'=>$username));
			if($cek->num_rows() > 0){
				$row = $cek->row_array();
				$peg = $this->model_app->view_where('pegawai',array('pegawai_id'=>$row['users_pegawai_id']));
				if($peg->num_rows() > 0){
					if(sha1($pwd) == $row['users_password']){
						$data = array('id'=>$row['users_id'],'username'=>$row['users_username'],'pegawai'=>$row['users_pegawai_id'],'role'=>$row['users_role']);
						$this->session->set_userdata('isLog',$data);
						redirect('');
					}else{
						$this->session->set_flashdata('erorr',json_encode('Passowrd salah'));
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('erorr',json_encode('Akun tidak memiliki data pegawai'));
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('erorr',json_encode('Akun tidak ditemukan'));
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
	}
}