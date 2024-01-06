<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'kurir_model' => 'kurir',
            'product_model' => 'product',
        ));
    }
    public function index()
    {
        $params['title'] = 'kurir';

        $config['base_url'] = site_url('admin/kurir/index');
        $config['total_rows'] = $this->kurir->tampil_data()->result();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
 
        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $orders['kurir'] = $this->kurir->tampil_data()->result();
        $this->load->view('header', $params);
        $this->load->view('kurir/index', $orders);
        $this->load->view('footer');
    }
    public function add()
	{	
		$params['title'] = 'kurir';
		$this->load->view('header', $params);
        $this->load->view('kurir/add');
        $this->load->view('footer');
	}
    public function tambah(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
        $password = $this->input->post('password');
        $tlp = $this->input->post('tlp');
        $status = 1;
		//rule validasi
		
			$data = array(
				'nama' => $nama,
				'email' => $email,
                'password' => md5($password),
				'tlp' => $tlp,
                'status' => $status,
			);

			 $this->kurir->simpan_data($data);
            if($data = null){
            $data['page'] = 'tess';
			$this->load->view('header',$data);
			$this->load->view('kurir/add',$data);
			$this->load->view('footer');
			

		} else {
            redirect('admin/kurir');
		}

	}
    public function update(){
        $id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
        $password = $this->input->post('password');
        $tlp = $this->input->post('tlp');
        $status = $this->input->post('status');
		//rule validasi
		
			$data = array(
                'id' => $id,
				'nama' => $nama,
				'email' => $email,
                'password' => md5($password),
				'tlp' => $tlp,
                'status' => $status,
			);
            $where = array('id'=>$id);
			$this->kurir->update_data($where,$data);
            if($data = null){
            $data['page'] = 'tess';
			$this->load->view('header',$data);
			$this->load->view('kurir/edit',$data);
			$this->load->view('footer');
			

		} else {
            redirect('admin/kurir');
		}

	}
    public function edit($id){

		$where = array('id'=>$id);
        $data['kurir'] = $this->kurir->edit_data($where)->result();
		$params['title'] = 'kurir';
		$this->load->view('header', $params);
        $this->load->view('kurir/edit',$data);
        $this->load->view('footer');
	}

	public function edit_aksi(){
		$id = $this->input->post('id');
		$id_product = $this->input->post('id_product');
		$date = $this->input->post('date');

		$data = array(
            'id' => $id,
			'id_product' => $id_product,
			'tanggal_kurir' => $date,
		);

		$where = array('id'=>$id);

		$this->kurir->update_data($where,$data);

		redirect('admin/kurir');

	}

	public function hapus($id){
		$where = array('id'=>$id);
		$this->kurir->hapus_data($where);
		redirect('admin/kurir');
	}

}