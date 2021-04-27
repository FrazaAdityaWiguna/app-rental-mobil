<?php 

class transaksi extends CI_Controller{

  public function index()
  {
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer")->result();
    $data['bank'] = $this->db->query("SELECT * FROM bank")->result();

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }

  public function pembayaran($id)
  {
    $where = array('id_rental' => $id);
    $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental ='$id'")->result();

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/konfirmasi_pembayaran', $data);
    $this->load->view('templates_admin/footer');
  }

  public function download_pembayaran($id)
  {
    $this->load->helper('download');
    $filePembayaran = $this->rental_model->downloadPembayaran($id);
    $file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
    force_download($file, NULL);

  }

  public function cek_pembayaran()
  {
    $id                                  = $this->input->post('id_rental');
    $status_pembayaran                   = $this->input->post('status_pembayaran');

    $data = array(
      'status_pembayaran' => $status_pembayaran,
    );

    $where = array(
      'id_rental' => $id,
    );

    $this->rental_model->update_data('transaksi', $data, $where);
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Pembayaran Telah Dikonfirmasi!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('admin/transaksi');
  }

}

?>