<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadeluwarsa extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'kadeluwarsa_model' => 'kadeluwarsa',
            'product_model' => 'product',
        ));
    }
    public function index()
    {
        $params['title'] = 'Kadeluwarsa';

        $config['base_url'] = site_url('admin/orders/index');
        $config['total_rows'] = $this->kadeluwarsa->tampil_data()->result();
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
 
        $orders['kadeluwarsa'] = $this->kadeluwarsa->join2table()->result();
        $orders['ferdinan'] = $this->kadeluwarsa->tampil_data()->result();
        $this->load->view('header', $params);
        $this->load->view('kadeluwarsa/index', $orders);
        $this->load->view('footer');
    }
    public function add()
	{	
		$data['product'] = $this->product->tampil_data()->result();
		$params['title'] = 'Kadeluwarsa';
		$this->load->view('header', $params);
        $this->load->view('kadeluwarsa/add',$data);
        $this->load->view('footer');
	}
    public function tambah(){
		$id_product = $this->input->post('id_product');
		$date = $this->input->post('date');

		//rule validasi
		
			$data = array(
				'id_product' => $id_product,
				'tanggal_kadeluwarsa' => $date,
				
			);

			 $this->kadeluwarsa->simpan_data($data);
            if($data = null){
                $data['page'] = 'tess';
			$this->load->view('header',$data);
			$this->load->view('kadeluwarsa/add',$data);
			$this->load->view('footer');
			

		} else {
            redirect('admin/kadeluwarsa');
		}

	}
    public function edit($id){

		$where = array('id'=>$id);
        $data['product'] = $this->product->tampil_data()->result();
        $data['kadeluwarsa'] = $this->kadeluwarsa->edit_data($where)->result();
		$params['title'] = 'Kadeluwarsa';
		$this->load->view('header', $params);
        $this->load->view('kadeluwarsa/edit',$data);
        $this->load->view('footer');
	}

	public function edit_aksi(){
		$id = $this->input->post('id');
		$id_product = $this->input->post('id_product');
		$date = $this->input->post('date');

		$data = array(
            'id' => $id,
			'id_product' => $id_product,
			'tanggal_kadeluwarsa' => $date,
		);

		$where = array('id'=>$id);

		$this->kadeluwarsa->update_data($where,$data);

		redirect('admin/kadeluwarsa');

	}

	public function hapus($id){
		$where = array('id'=>$id);
		$this->kadeluwarsa->hapus_data($where);
		redirect('admin/kadeluwarsa');
	}

}