<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class M_admin extends CI_Model
{
    function get_lokasi()
    {
        $this->db->join('tb_provinsi', 'tb_konflik_provinsi.id_provinsi=tb_konflik_provinsi.id_provinsi');
        // $this->db->group_by('tb_prodi.fakultas', 'ASC');
        $lokasi = $this->db->get('tb_konflik_provinsi')->result_array();
        return $lokasi;
    }

    public function get_Pelaporan()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        return $this->db->get('tb_pelaporan')->result_array();
    }

    public function getPelaporan()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        return $this->db->get('tb_pelaporan')->result_array();
    }
    public function getPelaporanLaboran()
    {
        $this->db->join('tb_user', 'tb_user.id_user=tb_pelaporan.id_user');
        $this->db->join('tb_aset', 'tb_aset.kode_aset=tb_pelaporan.kode_aset');
        $this->db->where('tb_pelaporan.id_user', $this->session->userdata('id_user'));
        return $this->db->get('tb_pelaporan')->result_array();
    }

    public function getAset()
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        return $this->db->get('tb_aset')->result_array();
    }

    public function getUser()
    {
        return $this->db->get('tb_user')->result_array();
    }

     public function getKonflik()
    {
        return $this->db->get('tb_jenis_konflik')->result_array();
    }

    public function getProdi()
    {
        return $this->db->get('tb_prodi')->result_array();
    }

    // public function getLokasi()
    // {
    //     $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
    //     return $this->db->get('tb_lokasi')->result_array();
    // }

    function get_user_byId($id)
    {
        $this->db->where('id_user=', $id);
        $user = $this->db->get('tb_user')->row_array();
        return $user;
    }

     function get_konflik_byId($id)
    {
        $this->db->where('id_jenis=', $id);
        $jenis = $this->db->get('tb_jenis_konflik')->row_array();
        return $jenis;
    }

    function get_lokasi_byId($id)
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->where('id_lokasi=', $id);
        $lokasi = $this->db->get('tb_lokasi')->row_array();
        return $lokasi;
    }

    function get_prodi_byId($id)
    {
        $this->db->where('id_prodi=', $id);
        $prodi = $this->db->get('tb_prodi')->row_array();
        return $prodi;
    }

    function get_aset_byId($id)
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('kode_aset=', $id);
        $aset = $this->db->get('tb_aset')->row_array();
        return $aset;
    }

    function get_pelaporan_byId($id)
    {
        // $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->where('id_pelaporan=', $id);
        $pelaporan = $this->db->get('tb_pelaporan')->row_array();
        return $pelaporan;
    }

    function get_aset()
    {
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $aset = $this->db->get('tb_aset')->result_array();
        return $aset;
    }

    function get_lokasi_aset()
    {
        $this->db->join('tb_prodi', 'tb_lokasi.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_aset', 'tb_lokasi.id_lokasi=tb_aset.id_lokasi');
        $this->db->group_by('tb_lokasi.id_lokasi', 'ASC');
        $this->db->order_by('tb_prodi.fakultas', 'ASC');
        return $data = $this->db->get('tb_lokasi')->result_array();
    }

    public function numrows_lokasi()
    {
        return $this->db->get('tb_lokasi')->num_rows();
    }

    ///////////////////////////////// MENGHITUNG JUMLAH DATA /////////////////////////////////

    function get_num_rows_lokasi()
    {
        $this->db->select('nama_prodi');
        $this->db->select('COUNT(id_lokasi) as jumlahLokasi');
        $this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_lokasi.id_prodi');
        $this->db->group_by('tb_lokasi.id_prodi');
        // $this->db->order_by('COUNT(tb_lokasi.id_prodi)', 'desc');
        return $this->db->get('tb_lokasi')->result_array();
    }

    public function get_num_rows_prodi()
    {
        $query = $this->db->get('tb_prodi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function get_num_rows_kepalaLaboran()
    {
        $this->db->where('jabatan', "Kepala Laboran");
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function get_num_rows_Laboran()
    {
        $this->db->where('jabatan', "Laboran");
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    ///////////////////////////////// END MENGHITUNG JUMLAH DATA /////////////////////////////////



    // =================================== LOKASI ===================================
    function save_lokasi()
    {
        $data = array(
            'id_provinsi' => $_POST['id_provinsi'],
            'tahun' => $_POST['tahun'],
            'lokasi' => $_POST['lokasi'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'tanggal' => $_POST['tanggal'],
            'id_jenis' => $_POST['id_jenis'],
            'potensi_masalah' => $_POST['potensi_masalah'],
            'uraian' => $_POST['uraian'],
            'tindak_lanjut' => $_POST['tindak_lanjut'],
            'foto' => $_FILES['foto'],
            'id_user' => $_POST['id_user']


        );
        $this->db->insert('tb_konflik_provinsi', $data);
    }

     function save_konflik()
    {
        $data = array(
            'nama_jenis' => $_POST['nama_jenis']

        );
        $this->db->insert('tb_jenis_konflik', $data);
    }

     function update_jenis()
    {
        $data = array(
            'nama_jenis' => $_POST['nama_jenis']
        );
        $this->db->where('id_jenis', $_POST['id_jenis']);
        $this->db->update('tb_jenis_konflik', $data);
    }

    function update_lokasi()
    {
        $data = array(
            'id_prodi' => $_POST['id_prodi'],
            'nama_lab' => $_POST['lab']
        );
        $this->db->where('id_lokasi', $_POST['id']);
        $this->db->update('tb_lokasi', $data);
    }
    // =================================== END LOKASI ===================================

    // =================================== ASET ===================================
    public function save_aset()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|JPEG|jpg|jpeg|png|gif|ico',
            // 'file_name' => $_POST['nama'],
            'upload_path' => realpath('./upload/barang')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('foto');


        $data = array(
            'id_lokasi' => $_POST['id_lokasi'],
            'nama_barang' => $_POST['barang'],
            'spesifikasi' => $_POST['spesifikasi'],
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'keterangan' => $_POST['keterangan'],
            'foto' => $_FILES['foto']['name']
        );

        $this->db->insert('tb_aset', $data);
    }

    public function update_aset()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|JPEG|jpg|jpeg|png|gif|ico',
            // 'file_name' => $_POST['nama'],
            'upload_path' => realpath('./upload/barang')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('foto');


        $data = array(
            'id_lokasi' => $_POST['id_lokasi'],
            'nama_barang' => $_POST['barang'],
            'spesifikasi' => $_POST['spesifikasi'],
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'keterangan' => $_POST['keterangan'],
            // 'foto' => $_FILES['foto']['name']
        );

        $this->db->where('kode_aset', $_POST['id']);
        $this->db->update('tb_aset', $data);
    }
    // =================================== END ASET ===================================

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update(){
        $post = $this->input->post();
        $this->id_jenis = $post["id_jenis"];
        $this->nama_jenis = $post["nama_jenis"];
        return $this->db->update($this->tb_jenis_konflik, array('id_konflik' => $post['id_jenis']));
    }
}
