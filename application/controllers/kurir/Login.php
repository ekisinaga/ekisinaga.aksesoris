<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model(array(
            'LoginModel' => 'm_login',
            'product_model' => 'product',
			'm_kurir' => 'm_kurir',
			'M_order' => 'order',
        ));
	}

	public function index(){

		$this->load->view('kurir/login');

	}
	public function admin(){

		$this->load->view('kurir/dashboard');

	}
	public function do_login(){
		// print_r('halo');
		$email = $this->input->post('email',true);
		// $user = $this->input->post('password',true);
		$pass = md5($this->input->post('password', true));

		//rule validasi
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != FALSE){
			$where = array(
				'email' => $email,
				'password' => $pass
			);

			$cekLogin = $this->m_login->cek_login($where)->num_rows();
			

			if($cekLogin > 0){
				$sess_data = array(
					'email' => $email,
					'login' => 'OK',
				);

				$this->session->set_userdata($sess_data);

				$data['kurir'] = $this->m_kurir->tampil_login_kurir($email)->result();
				$kurir = $this->m_kurir->tampil_login_kurir($email)->result();
				foreach ($kurir as $kur){
					$id = $kur->id;
				}
				$data['total_order'] = $this->order->count_all_orders($id);
				$data['total_process_order'] = $this->order->count_process_order($id);
				// $data['title'] = "Aplikasi Desa";
				// $data['nama'] = "NekoWeb";
				$data['page'] = 'Dashboard';
				$this->load->view('kurir/header',$data);
				$this->load->view('kurir/dashboard',$data);
				$this->load->view('kurir/footer',$data);

			}else{
				redirect(base_url('login/admin'));
			}

		}else{
			$this->load->view('kurir/login');
		}

	}
	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url('login/admin'));

	}
}
?>