<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('utama_model');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('view_register');
	}
	
	public function register()
	{
		//$this->load->library('form_validation');
		
		$this->form_validation->set_rules('Nama', 'Nama', 'required|alpha_numeric|min_length[3]|strtolower|xss_clean|callback_username_check');
		$this->form_validation->set_rules('Password', 'Password', 'required|xss_clean');
		
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('view_register');
		}
		else
		{
			$data['Nama'] = $this->input->post('Nama');
			$data['Password'] = $this->input->post('Password');
			
			if ($this->utama_model->Nama_exists($data['Nama']) == false ){
				
			$this->utama_model->register_user($data);
			$this->load->view('view_login');
			}else{
				$this->load->view('view_register');
			}
		}
		
	}
	
	public function login()
	{		
		$data['Nama'] = $this->input->post('Nama');
		$data['Password'] = sha1($this->input->post('Password'));
		if ($this->utama_model->cek_password($data['Nama'],$data['Password']) == false )
		{
			$this->load->view('view_login');
		}
		else
		{			
			$newdata = array(
                   'Nama'  => $data['Nama'],
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($newdata);
			
			redirect('http://localhost:8989/prak_UKM/index.php/utama/manage');
			
			
		}
	}

	 public function logout()
	{
		$this->session->sess_destroy();
		redirect('http://localhost:8989/prak_UKM/index.php/utama/login');
	}

	public function manage(){
		
		if ($this->session->userdata('Nama') != '' ) {
			
			$data['rows']=$this->utama_model->dataUKM();
			$this->load->view('view_manage',$data);
			}else{
				redirect('http://localhost:8989/prak_UKM/index.php/utama/login');
			}
	}
	
	public function insertNEW_UKM(){
		$arrIsian['NamaUKM'] = urldecode($this->uri->segment('3'));
		$namaUserLogIn=$this->session->userdata('Nama');
		//echo $namaUserLogIn;
		$hasil = $this->utama_model->ID_si_user(strtolower($namaUserLogIn));
		
		foreach ($hasil as $key) {
			$arrIsian['IDuser'] = $key->ID;
		}
		$arrIsian['pengganggu']='';
	
		$this->utama_model->InsertBaruUKM($arrIsian);
		
		$data['asyik']=$this->utama_model->dataUKM();
		$this->load->view('view_main_table',$data);
	}
	
	public function editPenjelasan(){
		
		$id=$this->input->post('id');
		$data['rows']=$this->utama_model->dataUKMperID($id);
		$this->load->view('view_penjelasan',$data);
	}
	
	public function updateNamaUKM(){
		$id=$this->input->post('id');
		$isi=$this->input->post('isi');
		
		$this->utama_model->updateNamaUKM($id,$isi);
		
		$data['asyik']=$this->utama_model->dataUKM();
		$this->load->view('view_main_table',$data);
	}
	
	public function detailPeserta(){
		$id=$this->input->post('id');
		$data['fg']=$this->utama_model->daftarPesertaPerUKM($id);
		
		$this->load->view('view_detail',$data);
	}
	
	public function mydetail(){
		
		//echo "sd";
		//$this->load->view('view_mydetail');
		
		$namaUser = $this->input->post('nama');
		$id = $this->utama_model->ID_si_user($namaUser);
		
		foreach ($id as $key) {
			$data['zz']=$this->utama_model->myDetail($key->ID);
		}
		$this->load->view('view_mydetail',$data);
		 		
	}
	
	public function test(){
		//echo "weleh-weleh";
	}
	
}