<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Driver extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'driver/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'driver/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'driver/index.html';
            $config['first_url'] = base_url() . 'driver/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Driver_model->total_rows($q);
        $driver = $this->Driver_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'driver_data' => $driver,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('driver/driver_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Driver_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_driver' => $row->id_driver,
		'id_lokasi' => $row->id_lokasi,
		'id_user' => $row->id_user,
		'status' => $row->status,
	    );
            $this->load->view('driver/driver_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('driver/create_action'),
	    'id_driver' => set_value('id_driver'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'id_user' => set_value('id_user'),
	    'status' => set_value('status'),
	);
        $this->load->view('driver/driver_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Driver_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('driver'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Driver_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('driver/update_action'),
		'id_driver' => set_value('id_driver', $row->id_driver),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'id_user' => set_value('id_user', $row->id_user),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('driver/driver_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_driver', TRUE));
        } else {
            $data = array(
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Driver_model->update($this->input->post('id_driver', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('driver'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Driver_model->get_by_id($id);

        if ($row) {
            $this->Driver_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('driver'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_lokasi', 'id lokasi', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_driver', 'id_driver', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Driver.php */
/* Location: ./application/controllers/Driver.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:37 */
/* http://harviacode.com */