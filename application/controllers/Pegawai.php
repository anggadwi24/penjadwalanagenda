<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
    	if($this->session->userdata('isLog')){
			$this->id = $this->session->userdata['isLog']['id'];
			$this->role = $this->session->userdata['isLog']['role'];
		}else{
			redirect('auth');
		}	
	}
	public function index()
	{	
		$data['title'] = 'PEGAWAI - '.title();
		$data['record'] = $this->model_app->view_where_ordering('pegawai',array('pegawai_visible'=>'y'),'pegawai_id','DESC');
		$this->template->load('template','pegawai',$data);

	}
	function show(){
		if($this->input->method() == 'post'){
			$id = $this->input->post('id');
			$cek = $this->model_app->view_where('pegawai',array('pegawai_id'=>$id));
			if($cek->num_rows() > 0){
				$row = $cek->row_array();
				$status = true;
				$msg = null;
				$arr = array('id'=>$row['pegawai_id'],'name'=>$row['pegawai_name'],'email'=>$row['pegawai_email'],'nip'=>$row['pegawai_nip'],'address'=>$row['pegawai_address'],'gender'=>$row['pegawai_gender'],'telp'=>$row['pegawai_phone'],'bagian'=>$row['pegawai_bagian']);
			}else{
				$arr = null;
				$status = false;
				$msg = 'Pegawai tidak ditemukan';
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg,'arr'=>$arr));
		}

		
	}
	function detail(){
		$id = $this->input->get('id');
		$cek = $this->model_app->view_where('pegawai',array('pegawai_id'=>$id));
		if($cek->num_rows() > 0){
			$data['title'] = 'DETAIL PEGAWAI - '.title();
			$data['row'] = $cek->row_array();
			$this->template->load('template','pegawai_detail',$data);
		}else{
			$this->session->set_flashdata('error',json_encode('Pegawai tidak ditemukan'));
			redirect('pegawai');
		}
	}
	function update(){
		if($this->input->method() == 'post'){
			if($this->role == 'admin'  OR $this->role == 'camat'){
				$name = $this->input->post('name');
				$nip = $this->input->post('nip');
				$gender = $this->input->post('jk');
				$telp = $this->input->post('telp');
				$email = $this->input->post('email');
				$alamat = $this->input->post('address');
				$divisi = $this->input->post('divisi');
				$id = $this->input->post('id');

				$cek = $this->model_app->view_where('pegawai',array('pegawai_id'=>$id));
				if($cek->num_rows() > 0){
					$cekNIP = $this->db->query("SELECT * FROM pegawai WHERE pegawai_nip = '".$nip."' AND pegawai_id != ".$id." ");
					if($cekNIP->num_rows() > 0){
						$status =false;
						$msg = 'Nip Sudah Digunakan';
						
						
					}else{
						$data = array('pegawai_name'=>$name,'pegawai_nip'=>$nip,'pegawai_address'=>$alamat,'pegawai_gender'=>$gender,'pegawai_email'=>$email,'pegawai_phone'=>$telp,'pegawai_bagian'=>$divisi);
						$this->model_app->update('pegawai',$data,array('pegawai_id'=>$id));
						$status =true;
						$msg = 'Pegawai berhasil diubah';
						
						}
				}else{
					$status =false;
					$msg = 'Pegawai tidak ditemukan';
				
				}
			}else{
				$status =false;
				$msg = 'Anda tidak dapat mengakses';
			
			}
			$redirect = base_url('pegawai');
			echo json_encode(array('status'=>$status,'msg'=>$msg,'redirect'=>$redirect));
		}
	}
	function delete(){
		if($this->input->method() == 'get'){
			if($this->role == 'admin' OR $this->role == 'camat'){
				$id = $this->input->get('id');

				$cek = $this->model_app->view_where('pegawai',array('pegawai_id'=>$id));
				if($cek->num_rows() > 0){
					$this->model_app->delete('pegawai',array('pegawai_id'=>$id));
					$this->session->set_flashdata('success','Pegawai berhasil dihapus');
					redirect('pegawai');
				}else{
					$this->session->set_flashdata('error',json_encode('Pegawai tidak ditemukan'));
					redirect('pegawai');
				}
			}else{
				$this->session->set_flashdata('error',json_encode('Anda tidak dapat mengakses'));
				redirect('pegawai');
			}
		}else{
			$this->session->set_flashdata('error',json_encode('Wrong Method'));
			redirect('pegawai');
		}
	}
	function store(){
		if($this->input->method() == 'post'){
			if($this->role == 'admin'  OR $this->role == 'camat'){
				$this->form_validation->set_rules('nip','NIP','required|is_unique[pegawai.pegawai_nip]');
				$this->form_validation->set_rules('name','Nama','required');
				$this->form_validation->set_rules('gender','Jenis Kelamin','required');
				$this->form_validation->set_rules('telp','No. Telp','required');
				$this->form_validation->set_rules('email','Email','required');
				$this->form_validation->set_rules('divisi','Divisi','required');


				if($this->form_validation->run() == false){
					
						$status = false;
						$msg = str_replace(array('<p>','</p>'),'',validation_errors());
						$redirect = base_url('pegawai');
					
				}else{
					$name = $this->input->post('name');
					$nip = $this->input->post('nip');
					$gender = $this->input->post('gender');
					$telp = $this->input->post('telp');
					$email = $this->input->post('email');
					$alamat = $this->input->post('address');
					$divisi = $this->input->post('divisi');
					$data = array('pegawai_name'=>$name,'pegawai_nip'=>$nip,'pegawai_address'=>$alamat,'pegawai_gender'=>$gender,'pegawai_email'=>$email,'pegawai_phone'=>$telp,'pegawai_bagian'=>$divisi);
					$this->model_app->insert('pegawai',$data);
					$msg = 'Pegawai berhasil ditambah';
					$redirect = base_url('pegawai');
					$status = true;
				}
			}else{
				$msg = 'Anda tidak dapat mengakses';
				$status = false;
				$redirect = base_url('pegawai');
				
			}
			echo json_encode(array('status'=>$status,'msg'=>$msg,'redirect'=>$redirect));
		}
	}
	function test(){
	
			$this->form_validation->set_rules('name','Nama ','required');
			$this->form_validation->set_rules('gender','Jenis Kelamin ','required');
			$this->form_validation->set_rules('telp','No. Telp ','required');
			$this->form_validation->set_rules('email','Email ','required');
			$this->form_validation->set_rules('divisi','Divisi ','required');


			if($this->form_validation->run() === false){
					$msg = 'asdasdasd';
					$this->session->set_flashdata('error',$msg);
					redirect('pegawai');
			}else{
					echo "asd";
			}
			
		
	}
}

