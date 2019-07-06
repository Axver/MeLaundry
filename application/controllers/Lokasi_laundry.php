<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lokasi_laundry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_laundry_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lokasi_laundry/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lokasi_laundry/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lokasi_laundry/index.html';
            $config['first_url'] = base_url() . 'lokasi_laundry/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lokasi_laundry_model->total_rows($q);
        $lokasi_laundry = $this->Lokasi_laundry_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lokasi_laundry_data' => $lokasi_laundry,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('lokasi_laundry/lokasi_laundry_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lokasi_laundry_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lokasi' => $row->id_lokasi,
		'id_user' => $row->id_user,
		'geom' => $row->geom,
		'jam_buka' => $row->jam_buka,
		'jam_tutup' => $row->jam_tutup,
		'foto' => $row->foto,
	    );
            $this->load->view('lokasi_laundry/lokasi_laundry_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi_laundry'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lokasi_laundry/create_action'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'id_user' => set_value('id_user'),
	    'geom' => set_value('geom'),
	    'jam_buka' => set_value('jam_buka'),
	    'jam_tutup' => set_value('jam_tutup'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('lokasi_laundry/lokasi_laundry_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'geom' => $this->input->post('geom',TRUE),
		'jam_buka' => $this->input->post('jam_buka',TRUE),
		'jam_tutup' => $this->input->post('jam_tutup',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Lokasi_laundry_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lokasi_laundry'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lokasi_laundry_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lokasi_laundry/update_action'),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'id_user' => set_value('id_user', $row->id_user),
		'geom' => set_value('geom', $row->geom),
		'jam_buka' => set_value('jam_buka', $row->jam_buka),
		'jam_tutup' => set_value('jam_tutup', $row->jam_tutup),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('lokasi_laundry/lokasi_laundry_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi_laundry'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lokasi', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'geom' => $this->input->post('geom',TRUE),
		'jam_buka' => $this->input->post('jam_buka',TRUE),
		'jam_tutup' => $this->input->post('jam_tutup',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Lokasi_laundry_model->update($this->input->post('id_lokasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lokasi_laundry'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lokasi_laundry_model->get_by_id($id);

        if ($row) {
            $this->Lokasi_laundry_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lokasi_laundry'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi_laundry'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('geom', 'geom', 'trim|required');
	$this->form_validation->set_rules('jam_buka', 'jam buka', 'trim|required');
	$this->form_validation->set_rules('jam_tutup', 'jam tutup', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lokasi_laundry.php */
/* Location: ./application/controllers/Lokasi_laundry.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:38 */
/* http://harviacode.com */