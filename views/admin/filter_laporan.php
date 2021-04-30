<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Filter Laporan Transaksi</h1>
    </div>
  </section>

  <div class="card">
    <div class="card-body">
      <form action="<?php echo base_url('admin/laporan') ?>" method='POST'>

        <div class="form-group">
          <label>Dari Tanggal</label>
          <input type="date" name="dari_tanggal" class="form-control">
          <?php echo form_error('dari_tanggal', '<span class="text-small text-danger">','</span>') ?>
        </div>

        <div class="form-group">
          <label>Sampai Tanggal</label>
          <input type="date" name="sampai_tanggal" class="form-control">
          <?php echo form_error('sampai_tanggal', '<span class="text-small text-danger">','</span>') ?>
        </div>

        <button type="sumbit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
      </form>
    </div>
  </div>
</div>