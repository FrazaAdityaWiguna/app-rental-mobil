<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Tambah Bank</h1>
    </div>

    <div class="card">
      <div class="card-body">
        <form action="<?php echo base_url('admin/data_bank/tambah_bank_aksi') ?>" method="POST">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control">
                <?php echo form_error('nama_bank', '<div class="text-small text-danger">','</div>') ?>
              </div>

              <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="text" name="nomor_rekening" class="form-control">
                <?php echo form_error('nomor_rekening', '<div class="text-small text-danger">','</div>') ?>
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-danger mt-4">Reset</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </section>
</div>