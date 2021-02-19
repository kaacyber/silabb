<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Map extends CI_Controller{
    public function v_map()
    {
        $data['title'] = 'Peta Data Konflik';
        $data['content'] = 'data_table/v_map';
        $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/template_header', $data);
        $this->load->view('templates/template', $data);
        $this->load->view('templates/template_footer', $data);
    }
}
 ?>

