<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_ extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User__model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_/index.html';
            $config['first_url'] = base_url() . 'user_/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User__model->total_rows($q);
        $user_ = $this->User__model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user__data' => $user_,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user_/user__list', $data);
    }

    public function read($id) 
    {
        $row = $this->User__model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'password' => $row->password,
		'role' => $row->role,
		'nama_user' => $row->nama_user,
		'nik' => $row->nik,
		'foto' => $row->foto,
	    );
            $this->load->view('user_/user__read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_/create_action'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'role' => set_value('role'),
	    'nama_user' => set_value('nama_user'),
	    'nik' => set_value('nik'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('user_/user__form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'role' => $this->input->post('role',TRUE),
		'nama_user' => $this->input->post('nama_user',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->User__model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User__model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'role' => set_value('role', $row->role),
		'nama_user' => set_value('nama_user', $row->nama_user),
		'nik' => set_value('nik', $row->nik),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('user_/user__form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'role' => $this->input->post('role',TRUE),
		'nama_user' => $this->input->post('nama_user',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->User__model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User__model->get_by_id($id);

        if ($row) {
            $this->User__model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');
	$this->form_validation->set_rules('nama_user', 'nama user', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User_.php */
/* Location: ./application/controllers/User_.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-06 03:00:39 */
/* http://harviacode.com */