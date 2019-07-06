<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Driver_antar_jemput extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_antar_jemput_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'driver_antar_jemput/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'driver_antar_jemput/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'driver_antar_jemput/index.html';
            $config['first_url'] = base_url() . 'driver_antar_jemput/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Driver_antar_jemput_model->total_rows($q);
        $driver_antar_jemput = $this->Driver_antar_jemput_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'driver_antar_jemput_data' => $driver_antar_jemput,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('driver_antar_jemput/driver_antar_jemput_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Driver_antar_jemput_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_driver' => $row->id_driver,
		'id_user' => $row->id_user,
		'tgl_waktu' => $row->tgl_waktu,
	    );
            $this->load->view('driver_antar_jemput/driver_antar_jemput_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver_antar_jemput'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('driver_antar_jemput/create_action'),
	    'id_driver' => set_value('id_driver'),
	    'id_user' => set_value('id_user'),
	    'tgl_waktu' => set_value('tgl_waktu'),
	);
        $this->load->view('driver_antar_jemput/driver_antar_jemput_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Driver_antar_jemput_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('driver_antar_jemput'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Driver_antar_jemput_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('driver_antar_jemput/update_action'),
		'id_driver' => set_value('id_driver', $row->id_driver),
		'id_user' => set_value('id_user', $row->id_user),
		'tgl_waktu' => set_value('tgl_waktu', $row->tgl_waktu),
	    );
            $this->load->view('driver_antar_jemput/driver_antar_jemput_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver_antar_jemput'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_driver', TRUE));
        } else {
            $data = array(
	    );

            $this->Driver_antar_jemput_model->update($this->input->post('id_driver', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('driver_antar_jemput'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Driver_antar_jemput_model->get_by_id($id);

        if ($row) {
            $this->Driver_antar_jemput_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('driver_antar_jemput'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('driver_antar_jemput'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('id_driver', 'id_driver', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Driver_antar_jemput.php */
/* Location: ./application/controllers/Driver_antar_jemput.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:37 */
/* http://harviacode.com */