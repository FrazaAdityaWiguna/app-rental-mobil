<?php 

class data_bank extends CI_Controller{

  public function index()
  {
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_bank');
    $this->load->view('templates_admin/footer');
  }

  public function tambah_bank_aksi()
  {
    $this->_rules();

    if($this->form_validation->run() == FALSE) {
      $this->index();
    }else{
      $nama_bank                  = $this->input->post('nama_bank');
      $nomor_rekening             = $this->input->post('nomor_rekening');

      $data = array(
        'nama_bank'        => $nama_bank,
        'nomor_rekening'   => $nomor_rekening,
      );

      $this->rental_model->insert_data($data, 'bank');
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Bank Berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('admin/transaksi');

    }
  }

  public function update_bank($id){
    $where = array('id_bank' => $id);
    $data['bank'] = $this->db->query("SELECT * FROM bank bk WHERE bk.id_bank = '$id'")->result();

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_bank', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_bank_aksi($id)
  {
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->update_bank();
    }else{
      $nama_bank                  = $this->input->post('nama_bank');
      $nomor_rekening             = $this->input->post('nomor_rekening');

      $data = array(
        'nama_bank'        => $nama_bank,
        'nomor_rekening'   => $nomor_rekening,
      );

      $where = array('id_bank' => $id);

      $this->rental_model->update_data('bank', $data, $where);

      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Bank Berhasil diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('admin/transaksi');
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
    $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
  }

  public function delete_bank($id)
  {
    $where = array('id_bank' => $id);

    $this->rental_model->delete_data($where, 'bank');
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Bank Berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('admin/transaksi');
  }

}

?>