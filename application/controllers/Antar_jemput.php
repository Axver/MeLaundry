<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Antar_jemput extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Antar_jemput_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'antar_jemput/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'antar_jemput/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'antar_jemput/index.html';
            $config['first_url'] = base_url() . 'antar_jemput/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Antar_jemput_model->total_rows($q);
        $antar_jemput = $this->Antar_jemput_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'antar_jemput_data' => $antar_jemput,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('antar_jemput/antar_jemput_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Antar_jemput_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'tgl_waktu' => $row->tgl_waktu,
		'lokasi_jemput' => $row->lokasi_jemput,
		'lokasi_antar' => $row->lokasi_antar,
		'status' => $row->status,
		'biaya' => $row->biaya,
	    );
            $this->load->view('antar_jemput/antar_jemput_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('antar_jemput'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('antar_jemput/create_action'),
	    'id_user' => set_value('id_user'),
	    'tgl_waktu' => set_value('tgl_waktu'),
	    'lokasi_jemput' => set_value('lokasi_jemput'),
	    'lokasi_antar' => set_value('lokasi_antar'),
	    'status' => set_value('status'),
	    'biaya' => set_value('biaya'),
	);
        $this->load->view('antar_jemput/antar_jemput_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'lokasi_jemput' => $this->input->post('lokasi_jemput',TRUE),
		'lokasi_antar' => $this->input->post('lokasi_antar',TRUE),
		'status' => $this->input->post('status',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
	    );

            $this->Antar_jemput_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('antar_jemput'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Antar_jemput_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('antar_jemput/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'tgl_waktu' => set_value('tgl_waktu', $row->tgl_waktu),
		'lokasi_jemput' => set_value('lokasi_jemput', $row->lokasi_jemput),
		'lokasi_antar' => set_value('lokasi_antar', $row->lokasi_antar),
		'status' => set_value('status', $row->status),
		'biaya' => set_value('biaya', $row->biaya),
	    );
            $this->load->view('antar_jemput/antar_jemput_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('antar_jemput'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'lokasi_jemput' => $this->input->post('lokasi_jemput',TRUE),
		'lokasi_antar' => $this->input->post('lokasi_antar',TRUE),
		'status' => $this->input->post('status',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
	    );

            $this->Antar_jemput_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('antar_jemput'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Antar_jemput_model->get_by_id($id);

        if ($row) {
            $this->Antar_jemput_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('antar_jemput'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('antar_jemput'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('lokasi_jemput', 'lokasi jemput', 'trim|required');
	$this->form_validation->set_rules('lokasi_antar', 'lokasi antar', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Antar_jemput.php */
/* Location: ./application/controllers/Antar_jemput.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:37 */
/* http://harviacode.com */