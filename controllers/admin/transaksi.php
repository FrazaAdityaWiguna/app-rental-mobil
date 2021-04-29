<?php 

class transaksi extends CI_Controller{

  public function index()
  {
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer")->result();
    $data['bank'] = $this->db->query("SELECT * FROM bank")->result();

    if($this->session->userdata('id_customer') == 0){
      redirect('auth/login');
    }else{
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_transaksi', $data);
    $this->load->view('templates_admin/footer');}
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

  public function transaksi_selesai($id)
  {
    $where = array('id_rental' => $id);
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tp WHERE id_rental = '$id' ")->result();

    foreach($data['transaksi'] as $tp){
      $data['mobil'] = $this->db->query("SELECT * FROM mobil mb WHERE id_mobil = '$tp->id_mobil' ")->result();
    }

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/transaksi_selesai', $data);
    $this->load->view('templates_admin/footer');
  }

  public function transaksi_selesai_aksi()
  {
    $id                       = $this->input->post('id_rental');
    $tanggal_pengembalian     = $this->input->post('tanggal_pengembalian');
    $status_rental            = $this->input->post('status_rental');
    $status_pengembalian      = $this->input->post('status_pengembalian');
    $tanggal_kembali          = $this->input->post('tanggal_kembali');
    $denda                    = $this->input->post('denda');
    $id_mobil                 = $this->input->post('id_mobil');
    $status                   = $this->input->post('status');

    $x = strtotime($tanggal_pengembalian);
    $y = strtotime($tanggal_kembali);
    $total_denda = abs(($x - $y)*($denda)/(60*60*24));

    $data = array(
      'tanggal_pengembalian' => $tanggal_pengembalian,
      'status_rental'        => $status_rental,
      'status_pengembalian'  => $status_pengembalian,
      'total_denda'          => $total_denda,
    );

    $where = array(
      'id_rental' => $id,
    );

    $id_mobil = array(
      'id_mobil' => $id_mobil,
    );

    $data_mobil = array(
      'status'    => $status,
    );

    $this->rental_model->update_data('mobil', $data_mobil, $id_mobil);
    $this->rental_model->update_data('transaksi', $data, $where);
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Transaksi Telah Dikonfirmasi!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/transaksi');
  }

  public function delete_transaksi($id){
    $where = array('id_rental' => $id);

    $this->rental_model->delete_data($where, 'transaksi');
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data Transaksi Berhasil dihapus!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/transaksi');
  }

  public function batal_transaksi($id)
  {
    $where = array('id_rental' => $id);
    $data = $this->rental_model->get_where($where, 'transaksi')->row();

    $id_mobil = array('id_mobil' => $data->id_mobil);
    $data2 = array('status' => '1');

    $this->rental_model->update_data('mobil', $data2, $id_mobil);
    $this->rental_model->delete_data($where, 'transaksi');
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Transaksi Telah Dibatalkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
    redirect('admin/transaksi');
  }
}

?>