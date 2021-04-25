<?php 

class dashboard extends CI_Controller{

  public function index()
  {
    if($this->session->userdata('id_customer') == 0){
      redirect('auth/login');
    }else{
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/dashboard');
      $this->load->view('templates_admin/footer');
    }
  }

}

?>