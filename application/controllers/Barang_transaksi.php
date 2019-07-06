<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang_transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang_transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang_transaksi/index.html';
            $config['first_url'] = base_url() . 'barang_transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Barang_transaksi_model->total_rows($q);
        $barang_transaksi = $this->Barang_transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_transaksi_data' => $barang_transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('barang_transaksi/barang_transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'tgl_waktu' => $row->tgl_waktu,
		'id_jenis' => $row->id_jenis,
		'jumlah' => $row->jumlah,
	    );
            $this->load->view('barang_transaksi/barang_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_transaksi/create_action'),
	    'id_user' => set_value('id_user'),
	    'tgl_waktu' => set_value('tgl_waktu'),
	    'id_jenis' => set_value('id_jenis'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->load->view('barang_transaksi/barang_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Barang_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_transaksi/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'tgl_waktu' => set_value('tgl_waktu', $row->tgl_waktu),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->load->view('barang_transaksi/barang_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Barang_transaksi_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_transaksi_model->get_by_id($id);

        if ($row) {
            $this->Barang_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang_transaksi.php */
/* Location: ./application/controllers/Barang_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:37 */
/* http://harviacode.com */