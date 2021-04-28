<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi Selesai</h1>
    </div>
  </section>

  <div class="card">
    <div class="card-body">

      <?php foreach($transaksi as $tr): ?>
      <form action="<?php echo base_url('admin/transaksi/transaksi_selesai_aksi') ?>" method="POST">
        <input type="hidden" name="id_rental" value="<?php echo $tr->id_rental?>">
        <input type="hidden" name="tanggal_kembali" value="<?php echo $tr->tanggal_kembali?>">
        <input type="hidden" name="denda" value="<?php echo $tr->denda?>">
        <input type="hidden" name="id_mobil" value="<?php echo $tr->id_mobil?>">

        <?php foreach($mobil as $mb): ?>
        <input type="hidden" name="status" value="1">
        <?php endforeach; ?>

        <div class=" form-group">
          <label>Tanggal Pengembalian</label>
          <input type="date" name="tanggal_pengembalian" class="form-control"
            value="<?php echo $tr->tanggal_pengembalian ?>">
        </div>

        <div class="form-group">
          <label>Status Pengembalian</label>
          <select name="status_pengembalian" class="form-control">
            <?php 
            if($tr->status_pengembalian == 'Belum Kembali'){
              echo'
            <option value="'. $tr->status_pengembalian.'">'.$tr->status_pengembalian.'
            </option>
            <option value="Kembali">Kembali</option>';
            }else{
              echo'
            <option value="'.$tr->status_pengembalian.'">'.$tr->status_pengembalian.'
            </option>
            <option value="Belum Kembali">Belum Kembali</option>';
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Status Rental</label>
          <select name="status_rental" class="form-control">
            <?php 
            if($tr->status_rental == 'Belum Selesai'){
              echo'
            <option value="'.$tr->status_rental.'">'.$tr->status_rental.'
            </option>
            <option value="Selesai">Selesai</option>';
            }else{
              echo'
            <option value="'.$tr->status_rental.'">'.$tr->status_rental.'
            </option>
            <option value="Belum Selesai">Belum Selesai</option>';
            }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-sm btn-success mr-3">Submit</button>
        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>