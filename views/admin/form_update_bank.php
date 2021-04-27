<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Mobil</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <?php foreach($bank as $bk) : ?>
        <div class="row">
          <div class="col-md-6">
            <form action="<?php echo base_url('admin/data_bank/update_bank_aksi/').$bk->id_bank ?>" method="POST">

              <div class="form-group">
                <label>Nama Bank</label>
                <input type="hidden" name="id_bank" value="<?php echo $bk->id_bank ?>" class="form-control">
                <input type="text" name="nama_bank" value="<?php echo $bk->nama_bank ?>" class="form-control">
                <?php echo form_error('nama_bank', '<div class="text-small text-danger">','</div>') ?>
              </div>


              <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="text" name="nomor_rekening" value="<?php echo $bk->nomor_rekening ?>" class="form-control">
                <?php echo form_error('nomor_rekening', '<div class="text-small text-danger">','</div>') ?>
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-danger mt-4">Reset</button>
            </form>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
</div>