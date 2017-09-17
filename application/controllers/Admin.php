<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function orders()
	{
        $per_page = 2;

        $this->load->model('orders');
        $this->load->library('pagination');
        $config['base_url'] = '/admin/orders';
        $config['total_rows'] = $this->orders->total_orders();
        $config['per_page'] = $per_page;
        
        $this->pagination->initialize($config);
        $start = $this->uri->segment(3, 0);

        $data['results'] = $this->orders->get_orders($start, $per_page);
        $data['links'] = $this->pagination->create_links();
		$this->load->view('admin', $data);
    }

    public function delete()
    {
        $this->load->library('user_agent');
        $this->load->model('orders');
        $this->load->helper('url');
        $id = $this->uri->segment(3, 0);
        $this->orders->delete_order($id);
        if ($this->agent->is_referral())
        {
            redirect($this->agent->referrer(), 'refresh');
        }
    }

    public function send()
    {
        $this->load->library('user_agent');
        $this->load->model('orders');
        $this->load->helper('url');
        $id = $this->uri->segment(3, 0);
        $this->orders->send_order($id);
        if ($this->agent->is_referral())
        {
            redirect($this->agent->referrer(), 'refresh');
        }
    }

}