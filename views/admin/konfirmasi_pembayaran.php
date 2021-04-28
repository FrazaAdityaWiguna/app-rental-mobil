<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Konfirmasi Pembayaran</h1>
    </div>

    <center class="card">
      <div class="card-header">Konfirmasi Pembayaran</div>

      <div class="card-body">
        <form action="<?php echo base_url('admin/transaksi/cek_pembayaran') ?>" method="POST">

          <?php foreach($pembayaran as $pmb) : ?>
          <input type="hidden" name="status" value="1">
          <input type="hidden" name="id_mobil" value="<?php echo $pmb->id_mobil ?>">
          <a class="btn btn-sm btn-success"
            href="<?php echo base_url('admin/transaksi/download_pembayaran/').$pmb->id_rental ?>"><i
              class="fas fa-download"></i> Download Bukti Pembayaran</a>

          <div class="custom-control custom-switch ml-5">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
            <input type="hidden" value="<?php echo $pmb->id_rental ?>" name="id_rental">
            <label class="custom-control-label" for="customSwitch1">Konfirmasi Pembayaran</label>
          </div>
          <?php endforeach; ?>
          <hr>
          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

        </form>
      </div>
    </center>
  </section>
</div>