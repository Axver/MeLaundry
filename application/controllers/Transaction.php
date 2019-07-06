<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaction/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaction/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaction/index.html';
            $config['first_url'] = base_url() . 'transaction/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaction_model->total_rows($q);
        $transaction = $this->Transaction_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaction_data' => $transaction,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('transaction/transaction_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'tgl_waktu' => $row->tgl_waktu,
		'id_lokasi' => $row->id_lokasi,
		'tgl_antar' => $row->tgl_antar,
		'weight' => $row->weight,
		'tgl_jemput' => $row->tgl_jemput,
		'total_bayar' => $row->total_bayar,
		'status' => $row->status,
		'lat' => $row->lat,
		'lon' => $row->lon,
	    );
            $this->load->view('transaction/transaction_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaction/create_action'),
	    'id_user' => set_value('id_user'),
	    'tgl_waktu' => set_value('tgl_waktu'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'tgl_antar' => set_value('tgl_antar'),
	    'weight' => set_value('weight'),
	    'tgl_jemput' => set_value('tgl_jemput'),
	    'total_bayar' => set_value('total_bayar'),
	    'status' => set_value('status'),
	    'lat' => set_value('lat'),
	    'lon' => set_value('lon'),
	);
        $this->load->view('transaction/transaction_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'tgl_antar' => $this->input->post('tgl_antar',TRUE),
		'weight' => $this->input->post('weight',TRUE),
		'tgl_jemput' => $this->input->post('tgl_jemput',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'status' => $this->input->post('status',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lon' => $this->input->post('lon',TRUE),
	    );

            $this->Transaction_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaction'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaction/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'tgl_waktu' => set_value('tgl_waktu', $row->tgl_waktu),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'tgl_antar' => set_value('tgl_antar', $row->tgl_antar),
		'weight' => set_value('weight', $row->weight),
		'tgl_jemput' => set_value('tgl_jemput', $row->tgl_jemput),
		'total_bayar' => set_value('total_bayar', $row->total_bayar),
		'status' => set_value('status', $row->status),
		'lat' => set_value('lat', $row->lat),
		'lon' => set_value('lon', $row->lon),
	    );
            $this->load->view('transaction/transaction_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'tgl_antar' => $this->input->post('tgl_antar',TRUE),
		'weight' => $this->input->post('weight',TRUE),
		'tgl_jemput' => $this->input->post('tgl_jemput',TRUE),
		'total_bayar' => $this->input->post('total_bayar',TRUE),
		'status' => $this->input->post('status',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lon' => $this->input->post('lon',TRUE),
	    );

            $this->Transaction_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaction'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $this->Transaction_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaction'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_lokasi', 'id lokasi', 'trim|required');
	$this->form_validation->set_rules('tgl_antar', 'tgl antar', 'trim|required');
	$this->form_validation->set_rules('weight', 'weight', 'trim|required');
	$this->form_validation->set_rules('tgl_jemput', 'tgl jemput', 'trim|required');
	$this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
	$this->form_validation->set_rules('lon', 'lon', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:39 */
/* http://harviacode.com */