<?php 

class laporan extends CI_Controller{

  public function index()
  {
    $dari_tanggal         = $this->input->post('dari_tanggal');
    $sampai_tanggal       = $this->input->post('sampai_tanggal');

    $this->_rules();
    
    if($this->session->userdata('id_customer') == '0'){
      redirect('auth_login');
    }
    
    if($this->form_validation->run() == FALSE){
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/filter_laporan');
      $this->load->view('templates_admin/footer');
    }else{
      $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND date(tanggal_rental) >= '$dari_tanggal' AND date(tanggal_rental) <= '$sampai_tanggal'")->result();

      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tampilkan_laporan', $data);
      $this->load->view('templates_admin/footer');
    }
  }

  public function print_laporan()
  {
    $dari_tanggal = $this->input->get('dari');
    $sampai_tanggal = $this->input->get('sampai');

    $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND date(tanggal_rental) >= '$dari_tanggal' AND date(tanggal_rental) <= '$sampai_tanggal'")->result();

    if($this->session->userdata('id_customer') == '0'){
      redirect('auth_login');
    }

    $this->load->view('admin/print_laporan', $data);
  }
  
  public function _rules()
  {
    $this->form_validation->set_rules('dari_tanggal', 'Dari Tanggal', 'required', array('required' => 'Harap isi Tanggalnya!'));
    $this->form_validation->set_rules('sampai_tanggal', 'Sampai Tanggal', 'required',array('required' => 'Harap isi Tanggalnya!'));
  }
}

?>