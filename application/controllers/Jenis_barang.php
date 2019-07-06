<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_barang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_barang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_barang/index.html';
            $config['first_url'] = base_url() . 'jenis_barang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_barang_model->total_rows($q);
        $jenis_barang = $this->Jenis_barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_barang_data' => $jenis_barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenis_barang/jenis_barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis' => $row->id_jenis,
		'nama_jenis' => $row->nama_jenis,
		'harga' => $row->harga,
	    );
            $this->load->view('jenis_barang/jenis_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_barang/create_action'),
	    'id_jenis' => set_value('id_jenis'),
	    'nama_jenis' => set_value('nama_jenis'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('jenis_barang/jenis_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_jenis' => $this->input->post('nama_jenis',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Jenis_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_barang/update_action'),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'nama_jenis' => set_value('nama_jenis', $row->nama_jenis),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('jenis_barang/jenis_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
		'nama_jenis' => $this->input->post('nama_jenis',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Jenis_barang_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $this->Jenis_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jenis', 'nama jenis', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_barang.php */
/* Location: ./application/controllers/Jenis_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:38 */
/* http://harviacode.com */