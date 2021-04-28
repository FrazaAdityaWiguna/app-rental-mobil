<?php 

class dashboard extends CI_Controller{

  public function index()
  {
    if($this->session->userdata('id_customer') == 0){
      redirect('auth/login');
    }else{
      $data['mobil'] = $this->rental_model->get_data('mobil')->result();
      $data['type'] = $this->rental_model->get_data('type')->result();
      $data['customer'] = $this->rental_model->get_data('customer')->result();
      $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer")->result();
      $data['bank'] = $this->db->query("SELECT * FROM bank")->result();
      
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/dashboard', $data);
      $this->load->view('templates_admin/footer');
    }
  }

}

?>