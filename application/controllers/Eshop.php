<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eshop extends CI_Controller {

	public function index()
	{
		$this->load->view('eshop');
	}

	public function new_order()
	{

		 $invalid = array();

		 $data['quantity'] = (int)$this->input->post('quantity');
		 $data['unit_price'] = $this->input->post('unit_price');
		 $data['customer'] = $this->input->post('customer');
		 $data['city'] = $this->input->post('city');
		 $data['address'] = $this->input->post('address');
		 $data['email'] = $this->input->post('email');
		 $data['tel_nr'] = $this->input->post('tel_nr');

		// Tikrinama ar reiksmes ne NULL
		 foreach ($data as $field => $value)
		 {
			if ($value == "" || $value == NULL) 
			{
				$invalid[] = $field;
			}
		 }
		 if (!empty($invalid))
		 {
			 $response['validation'] = false;
			 $response['errors'] = $invalid;

			 $this->output->set_content_type('application/json');
			 $this->output->set_output(json_encode($response));
			 return;
		 }
		
		 // Validacija praejo, issaugoma
		 $this->load->model('orders');
		 $this->orders->insert($data);

		 $response['validation'] = true;
		 $response['errors'] = $invalid;

		 $this->output->set_content_type('application/json');
		 $this->output->set_output(json_encode($response));
		 return;
	}
}
