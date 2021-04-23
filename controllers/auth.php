<?php 

class auth extends CI_Controller{

  public function login()
  {
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->load->view('templates_admin/header');
      $this->load->view('form_login');
      $this->load->view('templates_admin/footer');
    }else{
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));

      $cek = $this->rental_model->cek_login($username, $password);

      if($cek == FALSE){
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username atau Password Salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('auth/login');
      }else{
        $this->session->set_userdata('username', $cek->username);
        $this->session->set_userdata('role_id', $cek->role_id);
        $this->session->set_userdata('nama', $cek->nama);
        $this->session->set_userdata('id_customer', $cek->id_customer);
        $this->session->set_userdata('password', $cek->password);

        switch($cek->role_id){
          case 1 : redirect('admin/dashboard');
            break;
          case 2 : redirect('customer/dashboard');
            break;
          default:
            break;
        }
      }
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('customer/dashboard');
  }

  public function ganti_password()
  {
    $this->load->view('templates_admin/header');
    $this->load->view('ganti_password');
    $this->load->view('templates_admin/footer');
  }

  public function ganti_password_aksi()
  {
    $pass_baru = $this->input->post('pass_baru');
    $ulang_pass = $this->input->post('ulang_pass');

    $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|min_length[8]|callback_cek_password');
    $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required|min_length[8]|matches[pass_baru]');

    if ($this->form_validation->run() == FALSE){
      $this->load->view('templates_admin/header');
      $this->load->view('ganti_password');
      $this->load->view('templates_admin/footer');
    }else{
      $data = array('password'=> md5($pass_baru));
      $id = array('id_customer'=> $this->session->userdata('id_customer'));

      $this->rental_model->update_password($id, $data, 'customer');

      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Password Berhasil Diupdate, Silakan Login!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');

        redirect('auth/login');
    }
  }

  public function cek_password($pass)
  {
    $pass_lama = $this->session->userdata('password');
    $pass = md5($pass);

    if($pass == $pass_lama){
      $this->form_validation->set_message('cek_password', 'Password anda sama seperti yang lama,Silakan Diganti!');
      return FALSE;
    }
    return TRUE;
  }
}

?>