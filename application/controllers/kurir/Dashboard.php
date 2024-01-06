<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		//echo "ini pesan dari construct<br>";
		//$this->load->helper('url');
		if(empty($this->session->userdata('login'))){
			redirect('login');
		}
		$this->load->model('m_kurir');
        $this->load->model('M_order');

	}


	function index(){
		
			$dat = $this->session->userdata('email');
			$data['kurir'] = $this->m_kurir->tampil_login_kurir($dat)->result();
            $kurir = $this->m_kurir->tampil_login_kurir($dat)->result();
			// $data['title'] = "Aplikasi Desa";
			// $data['nama'] = "NekoWeb";
            foreach ($kurir as $kur){
                $id = $kur->id;
            }
            $data['total_order'] = $this->M_order->count_all_orders($id);
            $data['total_process_order'] = $this->M_order->count_process_order($id);
			$data['page'] = 'Dashboard';
			$this->load->view('kurir/header',$data);
			$this->load->view('kurir/dashboard',$data);
			$this->load->view('kurir/footer',$data);
		

	}
    public function task($id)
    {
        $params['title'] = 'Task';

        $config['base_url'] = site_url('kurir/pesanan/index');
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

        // $id = $this->session->userdata('id');
        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dat = $this->session->userdata('email');
        $orders['kurir'] = $this->m_kurir->tampil_login_kurir($dat)->result();
        $orders['orders'] = $this->M_order->get_all_orders($id);
        $orders['pagination'] = $this->pagination->create_links();
        $orders['page'] = 'task';
        $this->load->view('kurir/header', $orders);
        $this->load->view('kurir/pesanan/index', $orders);
        $this->load->view('kurir/footer');
    }

    public function view($id){
        $data = $this->M_order->order_data($id);
        $items = $this->M_order->order_items($id);
        $params['title'] = 'Order #'. $data->order_number;
        $order['kurir'] = $this->m_kurir->tampil_data()->result();
        $order['data'] = $data;
        $order['items'] = $items;
        $order['delivery_data'] = json_decode($data->delivery_data);
        $order['order_flash'] = $this->session->flashdata('order_flash');
        $order['payment_flash'] = $this->session->flashdata('payment_flash');
        $order['page'] = 'task';
        $this->load->view('kurir/header', $order);
        $this->load->view('kurir/pesanan/view', $order);
        $this->load->view('kurir/footer');
    }
    public function status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');

        $this->M_order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');

        redirect('kurir/dashboard/view/'. $order);
    }


}

