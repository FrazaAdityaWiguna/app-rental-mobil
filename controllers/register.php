<?php 

class Register extends CI_Controller{

  public function index(){
    $this->_rules();

    if($this->form_validation->run() == false){
          $this->load->view('templates_admin/header');
    $this->load->view('register_form');
    $this->load->view('templates_admin/footer');
    }else {
      $nama           = htmlspecialchars($this->input->post('nama'));
      $username       = htmlspecialchars($this->input->post('username'));
      $alamat         = htmlspecialchars($this->input->post('alamat'));
      $gender         = $this->input->post('gender');
      $no_telepon     = $this->input->post('no_telepon');
      $no_ktp         = $this->input->post('no_ktp');
      $password       = md5($this->input->post('password')); 
      $role_id        = '2';

      $data = array (
        'nama'          => $nama,
        'username'      => $username,
        'alamat'        => $alamat,
        'gender'        => $gender,
        'no_telepon'    => $no_telepon,
        'no_ktp'        => $no_ktp,
        'password'      => $password,
        'role_id'       => $role_id, 
      );

      $this->rental_model->insert_data($data, 'customer');
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Register, Silakan Login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('auth/login');
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_cek_username_registration');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('gender', 'Gander', 'required');
    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|numeric');
    $this->form_validation->set_rules('no_ktp', 'No. KTP', 'required|numeric|callback_cek_no_ktp');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
  }
  
  public function cek_username_registration($str)
  {
    $db_username = $this->rental_model->get_data('customer')->result();

    foreach ($db_username as $dbu){
      if($str == $dbu->username){
        $this->form_validation->set_message('cek_username_registration', 'Username telah digunakan!');
        return FALSE;
      }
    }

    return TRUE;
  }

  public function cek_no_ktp($str)
  {
    $db_username = $this->rental_model->get_data('customer')->result();

    foreach ($db_username as $dbu){
      if($str == $dbu->no_ktp){
        $this->form_validation->set_message('cek_no_ktp', 'No. KTP telah digunakan!');
        return FALSE;
      }
    }

    return TRUE;
  }
}

?>