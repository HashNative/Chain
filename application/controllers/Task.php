<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Task';

		$this->load->model('model_task');
	}

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{  
        if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
		$this->form_validation->set_rules('service_charge_value', 'Charge Amount', 'trim|integer');
		$this->form_validation->set_rules('vat_charge_value', 'Vat Charge', 'trim|integer');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
	
	
        if ($this->form_validation->run() == TRUE) {
            // true case

        	$data = array(
        		'company_name' => $this->input->post('company_name'),
        		'service_charge_value' => $this->input->post('service_charge_value'),
        		'vat_charge_value' => $this->input->post('vat_charge_value'),
        		'address' => $this->input->post('address'),
        		'phone' => $this->input->post('phone'),
        		'country' => $this->input->post('country'),
        		'message' => $this->input->post('message'),
                'currency' => $this->input->post('currency')
        	);

        	$update = $this->model_task->update($data, 1);
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('task/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('task/index', 'refresh');
        	}
        }
        else {

            // false case
            $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_task->getCompanyData(1);
			$this->render_template('task/index', $this->data);
        }	

		
	}



	public function test(){

		$this->load->view('templates/header');
		$this->load->view('test');
		$this->load->view('templates/footer');

	}

}