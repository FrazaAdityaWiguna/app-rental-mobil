<div class="container">
  <div class="card" style="margin-top: 50px; margin-bottom: 50px">
    <div class="card-header">
      Form Rental Mobil
    </div>

    <div class="card-body">

      <?php foreach($detail as $dt) : ?>

      <form action="<?php echo base_url('customer/rental/tambah_rental_aksi/'. $dt->id_mobil) ?>" method="POST">

        <div class="form-gruop mb-3">
          <label>Harga Sewa/Hari</label>
          <input type="hidden" name="id_mobil" value="<?php echo $dt->id_mobil ?>">
          <input type="hidden" name="total_denda" value="0">
          <input type="text" class="form-control" name="harga" value="<?php echo $dt->harga ?>" readonly>
        </div>

        <div class="form-gruop mb-3">
          <label>Denda/Hari</label>
          <input type="text" class="form-control" name="denda" value="<?php echo $dt->denda ?>" readonly>
        </div>

        <div class="form-gruop mb-3">
          <label>Tanggal Rental</label>
          <input type="date" class="form-control" name="tanggal_rental">
          <?php echo form_error('tanggal_rental', '<span class="text-small text-danger">','</span>') ?>
        </div>

        <div class="form-gruop mb-3">
          <label>Tanggal Kembali</label>
          <input type="date" class="form-control" name="tanggal_kembali">
          <?php echo form_error('tanggal_kembali', '<span class="text-small text-danger">','</span>') ?>
        </div>

        <button Type="submit" class="btn btn-warning">Rental</button>

      </form>

      <?php endforeach; ?>
    </div>

  </div>
</div>