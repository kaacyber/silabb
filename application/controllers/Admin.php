<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('form_validation');

        if (!$this->session->userdata('id_user')) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

     public function v_grafik()
     {
        $data['title'] = 'Grafik Data Konflik';
        $data['content'] = 'data_table/v_grafik';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);          
    }

    // DATA USER
    public function data_user()
    {
        $data['title'] = 'Data User';
        $data['content'] = 'data_table/data_user';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['user'] = $this->M_admin->getUser();
        // $data['user'] = $this->db->get('tb_user')->result_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

    public function save_user()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_user.nama]', [
            'is_unique' => 'This name is already registered!'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data User';
            $data['content'] = 'data_table/data_user';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['user'] = $this->db->get('tb_user')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('user', 'Added');
            redirect('Admin/data_user');
        }
    }

    public function update_user()
    {
        echo json_encode($this->M_admin->get_user_byId($_POST['id']));
    }

    public function saveUpdate_user()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data User';
            $data['content'] = 'data_table/data_user';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['user'] = $this->db->get('tb_user')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            $old_psw = $this->input->post('old_pass');
            $new_psw = $this->input->post('password');
            $new_hash_psw = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            if ($old_psw == $new_psw) {
                $this->db->set('password', $old_psw);
            } else {
                $this->db->set('password', $new_hash_psw);
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->where('id_user', $this->input->post('id'));
            $this->db->update('tb_user', $data);
            $this->session->set_flashdata('user', 'Updated');
            redirect('Admin/data_user');
        }
    }

    public function delete_user($id_user)
    {
        $where = array('id_user' => $id_user);
        $this->M_admin->delete_data($where, 'tb_user');
        $this->session->set_flashdata('user', 'Deleted');
        redirect('Admin/data_user');
    }
    // END DATA USER

    // DATA LOKASI
    public function data_lokasi()
    {
        $data['title'] = 'Data Provinsi';
        $data['content'] = 'data_table/data_lokasi';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['lokasi'] = $this->M_admin->get_lokasi();
        $data['tb_konflik_provinsi'] = $this->db->get('tb_provinsi')->result_array();
        $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

    function save_lokasi()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim|is_unique[tb_konflik_provinsi.lokasi]', [
            'is_unique' => 'This Konflik is already registered!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->save_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Added');
            redirect('Admin/data_lokasi');
        }
    }

    public function update_lokasi()
    {
        echo json_encode($this->M_admin->get_lokasi_byId($_POST['id']));
    }

    function saveUpdate_lokasi()
    {
        // print_r($_POST);
        // exit();
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lab', 'Lab', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['prodi'] = $this->db->get('tb_prodi')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->update_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Updated');
            redirect('Admin/data_lokasi');
        }
    }

    public function delete_lokasi($id_lokasi)
    {
        $where = array('id_lokasi' => $id_lokasi);
        $this->M_admin->delete_data($where, 'tb_lokasi');
        $this->session->set_flashdata('lokasi', 'Deleted');
        redirect('Admin/data_lokasi');
    }

    public function find_provinsi()
    {
        $q = $this->input->post("provinsi");
        $sql = "select id_provinsi as id,nama_provinsi as text from tb_provinsi where nama_provinsi like '%" . $q . "%' order by id_provinsi asc";
        //die($sql);
        $data_tindakan = $this->db->query($sql)->result_array();

        echo json_encode($data_tindakan);
    }
    
    // END DATA LOKASI

    // DATA KABUPATEN

    public function data_kabupaten()
    {
        $data['title'] = 'Data Kabupaten';
        $data['content'] = 'data_table/data_kabupaten';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['lokasi'] = $this->M_admin->get_lokasi();
        $data['tb_konflik_provinsi'] = $this->db->get('tb_provinsi')->result_array();
        $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

    function save_kabupaten()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim|is_unique[tb_konflik_provinsi.lokasi]', [
            'is_unique' => 'This Konflik is already registered!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->save_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Added');
            redirect('Admin/data_lokasi');
        }
    }

    public function update_kabupaten()
    {
        echo json_encode($this->M_admin->get_lokasi_byId($_POST['id']));
    }

    function saveUpdate_kabupaten()
    {
        // print_r($_POST);
        // exit();
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lab', 'Lab', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['prodi'] = $this->db->get('tb_prodi')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->update_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Updated');
            redirect('Admin/data_lokasi');
        }
    }

    public function delete_kabupaten($id_lokasi)
    {
        $where = array('id_lokasi' => $id_lokasi);
        $this->M_admin->delete_data($where, 'tb_lokasi');
        $this->session->set_flashdata('lokasi', 'Deleted');
        redirect('Admin/data_lokasi');
    }

    // public function find_provinsi()
    // {
    //     $q = $this->input->post("provinsi");
    //     $sql = "select id_provinsi as id,nama_provinsi as text from tb_provinsi where nama_provinsi like '%" . $q . "%' order by id_provinsi asc";
    //     //die($sql);
    //     $data_tindakan = $this->db->query($sql)->result_array();

    //     echo json_encode($data_tindakan);
    // }

    // END DATA KABUPATEN

    // DATA KECAMATAN

    public function data_kecamatan()
    {
        $data['title'] = 'Data Kecamatan';
        $data['content'] = 'data_table/data_kecamatan';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['lokasi'] = $this->M_admin->get_lokasi();
        $data['tb_konflik_provinsi'] = $this->db->get('tb_provinsi')->result_array();
        $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

    function save_kecamatan()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim|is_unique[tb_konflik_provinsi.lokasi]', [
            'is_unique' => 'This Konflik is already registered!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['jenis'] = $this->db->get('tb_jenis_konflik')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->save_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Added');
            redirect('Admin/data_lokasi');
        }
    }

    public function update_kecamatan()
    {
        echo json_encode($this->M_admin->get_lokasi_byId($_POST['id']));
    }

    function saveUpdate_kecamatan()
    {
        // print_r($_POST);
        // exit();
        $result['error'] = TRUE;
        $this->form_validation->set_rules('lab', 'Lab', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Lokasi';
            $data['content'] = 'data_table/data_lokasi';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi();
            $data['prodi'] = $this->db->get('tb_prodi')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->update_lokasi($_POST);
            $this->session->set_flashdata('lokasi', 'Updated');
            redirect('Admin/data_lokasi');
        }
    }

    public function delete_kecamatan($id_lokasi)
    {
        $where = array('id_lokasi' => $id_lokasi);
        $this->M_admin->delete_data($where, 'tb_lokasi');
        $this->session->set_flashdata('lokasi', 'Deleted');
        redirect('Admin/data_lokasi');
    }

    // public function find_provinsi()
    // {
    //     $q = $this->input->post("provinsi");
    //     $sql = "select id_provinsi as id,nama_provinsi as text from tb_provinsi where nama_provinsi like '%" . $q . "%' order by id_provinsi asc";
    //     //die($sql);
    //     $data_tindakan = $this->db->query($sql)->result_array();

    //     echo json_encode($data_tindakan);
    // }

    // END DATA KECAMATAN

    // DATA JENIS KONFLIK

    public function data_konflik()
    {
        $data['title'] = 'Data Konflik';
        $data['content'] = 'data_table/data_konflik';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['user'] = $this->M_admin->getKonflik();
        // $data['user'] = $this->db->get('tb_user')->result_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }

    public function save_konflik()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[tb_user.nama]', [
            'is_unique' => 'This name is already registered!'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data User';
            $data['content'] = 'data_table/data_user';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['user'] = $this->db->get('tb_user')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('user', 'Added');
            redirect('Admin/data_konflik');
        }
    }

    public function update_konflik()
    {
        echo json_encode($this->M_admin->get_user_byId($_POST['id']));
    }

    public function saveUpdate_konflik()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data User';
            $data['content'] = 'data_table/data_user';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['user'] = $this->db->get('tb_user')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            $old_psw = $this->input->post('old_pass');
            $new_psw = $this->input->post('password');
            $new_hash_psw = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            if ($old_psw == $new_psw) {
                $this->db->set('password', $old_psw);
            } else {
                $this->db->set('password', $new_hash_psw);
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->where('id_user', $this->input->post('id'));
            $this->db->update('tb_user', $data);
            $this->session->set_flashdata('user', 'Updated');
            redirect('Admin/data_konflik');
        }
    }

    public function delete_konflik($id_user)
    {
        $where = array('id_user' => $id_user);
        $this->M_admin->delete_data($where, 'tb_user');
        $this->session->set_flashdata('user', 'Deleted');
        redirect('Admin/data_konflik');
    }
    // END DATA JENIS KONFLIK

    // // DATA PRODI
    // public function data_prodi()
    // {
    //     $data['title'] = 'Data Program Studi';
    //     $data['content'] = 'data_table/data_prodi';
    //     $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     $data['prodi'] = $this->M_admin->getProdi();
    //     $this->load->view('templates/template_header', $data);
    //     $this->load->view('templates/template', $data);
    //     $this->load->view('templates/template_footer', $data);
    // }

    // public function save_prodi()
    // {
    //     $result['error'] = TRUE;
    //     $this->form_validation->set_rules('nama', 'Lab', 'required|trim|is_unique[tb_prodi.nama_prodi]', [
    //         'is_unique' => 'This prodi is already registered!'
    //     ]);
    //     $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
    //     $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim');
    //     if ($this->form_validation->run() == FALSE) {
    //         $data['title'] = 'Data Program Studi';
    //         $data['content'] = 'data_table/data_prodi';
    //         $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //         $data['prodi'] = $this->db->get('tb_prodi')->result_array();
    //         $this->load->view('templates/template_header', $data);
    //         $this->load->view('templates/template', $data);
    //         $this->load->view('templates/template_footer', $data);
    //     } else {
    //         $data = [
    //             'nama_prodi' => $this->input->post('nama'),
    //             'jurusan' => $this->input->post('jurusan'),
    //             'fakultas' => $this->input->post('fakultas')
    //         ];
    //         $this->db->insert('tb_prodi', $data);

    //         $this->session->set_flashdata('prodi', 'Added');
    //         redirect('Admin/data_prodi');
    //     }
    // }

    // public function update_prodi()
    // {
    //     echo json_encode($this->M_admin->get_prodi_byId($_POST['id']));
    // }

    // public function saveUpdate_prodi()
    // {
    //     $result['error'] = TRUE;
    //     $this->form_validation->set_rules('nama', 'Lab', 'required|trim');
    //     $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
    //     $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim');
    //     if ($this->form_validation->run() == FALSE) {
    //         $data['title'] = 'Data Program Studi';
    //         $data['content'] = 'data_table/data_prodi';
    //         $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //         $data['prodi'] = $this->db->get('tb_prodi')->result_array();
    //         $this->load->view('templates/template_header', $data);
    //         $this->load->view('templates/template', $data);
    //         $this->load->view('templates/template_footer', $data);
    //     } else {
    //         $data = [
    //             'nama_prodi' => $this->input->post('nama'),
    //             'jurusan' => $this->input->post('jurusan'),
    //             'fakultas' => $this->input->post('fakultas')
    //         ];
    //         $this->db->where('id_prodi', $this->input->post('id'));
    //         $this->db->update('tb_prodi', $data);

    //         $this->session->set_flashdata('prodi', 'Updated');
    //         redirect('Admin/data_prodi');
    //     }
    // }



    // public function delete_prodi($id_prodi)
    // {
    //     $where = array('id_prodi' => $id_prodi);
    //     $this->M_admin->delete_data($where, 'tb_prodi');
    //     $this->session->set_flashdata('prodi', 'Deleted');
    //     redirect('Admin/data_prodi');
    // }
    // END DATA PRODI

    // DATA PELAPORAN
    // public function data_pelaporan()
    // {
    //     $data['title'] = 'Data Pelaporan';
    //     $data['content'] = 'data_table/data_pelaporan';
    //     $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     $data['lokasi'] = $this->M_admin->get_lokasi_aset();
    //     $data['aset'] = $this->db->get('tb_aset')->result_array();
    //     $data['lapor'] = $this->M_admin->getPelaporan();

    //     $this->load->view('templates/template_header', $data);
    //     $this->load->view('templates/template', $data);
    //     $this->load->view('templates/template_footer', $data);
    // }

    // public function pelaporanLaboran()
    // {
    //     $data['title'] = 'Data Pelaporan';
    //     $data['content'] = 'data_table/data_pelaporan';
    //     $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     $data['lokasi'] = $this->M_admin->get_lokasi_aset();
    //     $data['aset'] = $this->db->get('tb_aset')->result_array();
    //     $data['lapor'] = $this->M_admin->getPelaporanLaboran();

    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
    //     $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/template_header', $data);
    //         $this->load->view('templates/template', $data);
    //         $this->load->view('templates/template_footer', $data);
    //     } else {

    //         $data = [
    //             'id_user' => $data['akun']['id_user'],
    //             'tgl_lapor' => date('Y-m-d'),
    //             'kode_aset' => $this->input->post('nama_barang'),
    //             'deskripsi_laporan' => $this->input->post('deskripsi'),
    //             'status' => "Belum Ditanggapi",
    //         ];
    //         $this->db->insert('tb_pelaporan', $data);

    //         $this->session->set_flashdata('pelaporan', 'Added');
    //         redirect('Admin/pelaporanLaboran');
    //     }
    // }

     public function v_map()
    {
        $data['title'] = 'Peta Data Konflik';
        $data['content'] = 'data_table/v_map';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }


    public function update_pelaporan()
    {
        echo json_encode($this->M_admin->get_pelaporan_byId($_POST['id']));
    }


    public function saveUpdate_pelaporan()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Pelaporan';
            $data['content'] = 'data_table/data_pelaporan';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['lokasi'] = $this->M_admin->get_lokasi_aset();
            $data['aset'] = $this->db->get('tb_aset')->result_array();

            $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
            $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
            $data['lapor'] = $this->db->get('tb_pelaporan')->result_array();

            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {

            $data = [
                'id_user' => $data['akun']['id_user'],
                'tgl_lapor' => date('Y-m-d'),
                'kode_aset' => $this->input->post('nama_barang'),
                'deskripsi_laporan' => $this->input->post('deskripsi'),
            ];
            $this->db->where('id_pelaporan', $this->input->post('id'));
            $this->db->update('tb_pelaporan', $data);

            $this->session->set_flashdata('pelaporan', 'Updated');
            redirect('Admin/data_pelaporan');
        }
    }


    public function delete_pelaporan($id_pelaporan)
    {
        $where = array('id_pelaporan' => $id_pelaporan);
        $this->M_admin->delete_data($where, 'tb_pelaporan');
        $this->session->set_flashdata('pelaporan', 'Deleted');

        if ($this->session->userdata('jabatan') == "Kepala Laboran") {
            redirect('Admin/data_pelaporan');
        } else {
            redirect('Admin/pelaporanLaboran');
        }
    }

    public function update_tanggapan()
    {
        echo json_encode($this->M_admin->get_pelaporan_byId($_POST['id']));
    }

    public function saveUpdate_tanggapan()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $result['error'] = TRUE;
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->data_pelaporan();
        } else {

            $data = [
                'status' => "Sudah Ditanggapi",
                'tanggapan' => $this->input->post('tanggapan'),
            ];
            $this->db->where('id_pelaporan', $this->input->post('id_tanggapan'));
            $this->db->update('tb_pelaporan', $data);

            $this->session->set_flashdata('pelaporan', 'Ditanggapi');
            redirect('Admin/data_pelaporan');
        }
    }
    // END DATA PELAPORAN

    // // DATA ASET
    // public function data_aset()
    // {
    //     $data['title'] = 'Data Aset';
    //     $data['content'] = 'data_table/data_aset';
    //     $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     $data['aset'] = $this->M_admin->getAset();
    //     $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
    //     $this->load->view('templates/template_header', $data);
    //     $this->load->view('templates/template', $data);
    //     $this->load->view('templates/template_footer', $data);
    // }

    function save_aset()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('barang', 'Barang', 'required|trim');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Aset';
            $data['content'] = 'data_table/data_aset';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['aset'] = $this->M_admin->get_aset();
            $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->save_aset($_POST);
            $this->session->set_flashdata('aset', 'Added');
            redirect('Admin/data_aset');
        }
    }
    function saveUpdate_aset()
    {
        // print_r($_POST);
        // exit();
        $result['error'] = TRUE;
        $this->form_validation->set_rules('barang', 'Barang', 'required|trim');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Aset';
            $data['content'] = 'data_table/data_aset';
            $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['aset'] = $this->M_admin->get_aset();
            $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
            $this->load->view('templates/template_header', $data);
            $this->load->view('templates/template', $data);
            $this->load->view('templates/template_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->update_aset($_POST);
            $this->session->set_flashdata('aset', 'Updated');
            redirect('Admin/data_aset');
        }
    }

    public function update_aset()
    {
        echo json_encode($this->M_admin->get_aset_byId($_POST['id']));
    }

    public function delete_aset($kode_aset)
    {
        $where = array('kode_aset' => $kode_aset);
        $this->M_admin->delete_data($where, 'tb_aset');
        $this->session->set_flashdata('aset', 'Deleted');
        redirect('Admin/data_aset');
    }
    // END DATA ASET

    // public function autocomplete()
    // {
    //     // tangkap variabel keyword dari URL
    //     $keyword = $this->uri->segment(3);
    //     $arr = array();
    //     // cari di database
    //     // $data = $this->db->select('kode_aset,nama_barang')->where("kode_aset like '%$keyword%' or nama_barang '%$keyword%'")->order_by('kode_aset')->limit(10)->get('tb_aset');

    //     $data = $this->db->from('tb_aset')->where("kode_aset like '%$keyword%' or nama_barang like '%$keyword%'")->get();

    //     // format keluaran di dalam array
    //     foreach ($data->result() as $row) {
    //         $arr['query'] = $keyword;
    //         $arr['suggestions'][] = array(
    //             'value'          => $row->kode_aset . ' ' . $row->nama_barang,
    //             'kode_aset'      => $row->kode_aset,
    //             'nama_barang'    => $row->nama_barang
    //         );
    //     }
    //     // minimal PHP 5.2
    //     echo json_encode($arr);
    // }


}
