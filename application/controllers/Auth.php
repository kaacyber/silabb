<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('id_user')) {
            redirect('Admin');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $data['meta'] = "Ini Tampilan Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        $akun = $this->db->get_where('tb_user', ['username' => $nama])->row_array();

        // jia user ada
        if ($akun) {
            if (password_verify($password, $akun['password'])) {
                $data = [
                    'id_user' => $akun['id_user'],
                    'username' => $akun['username'],
                    'id_role' => $akun['id_role']
                ];

                $this->session->set_userdata($data);
                redirect('Admin');
            } else {
                $this->session->set_flashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> wrong password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> your name is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('nama')) {
            redirect('Admin');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_user.nama]', [
            'is_unique' => 'This name is already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password at least 6 character!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Registration";
            $data['meta'] = "Ini Tampilan Registrasi";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'jabatan' => "Laboran",
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your account has been created. Please login!</div>');
            redirect('auth');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('jabatan');


        $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Success!</b> you have been logout!</div>');
        redirect('auth');
    }

    function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
