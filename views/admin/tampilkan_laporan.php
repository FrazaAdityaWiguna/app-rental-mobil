<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tampilan Hasil Laporan Transaksi</h1>
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

  <div class="card">
    <div class="card-body">
      <div class="btn-group mb-3">
        <a href="<?php echo base_url('admin/laporan/print_laporan/?dari='.set_value('dari_tanggal').'&sampai='.set_value('sampai_tanggal')) ?>"
          class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
      </div>

      <table class="table table-responsive table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Customer</th>
          <th>Mobil</th>
          <th>Tgl. Rental</th>
          <th>Tgl. Kembali</th>
          <th>Harga/Hari</th>
          <th>Denda/Hari</th>
          <th>Total Denda</th>
          <th>Tgl. Dikembalikan</th>
          <th>Status Pengembalian</th>
          <th>Status Rental</th>
        </tr>

        <?php 
            $no=1;
            foreach($laporan as $lp) :
          ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $lp->nama ?></td>
          <td><?php echo $lp->merk ?></td>
          <td><?php echo date('d/m/y', strtotime($lp->tanggal_rental));  ?></td>
          <td><?php echo date('d/m/y', strtotime($lp->tanggal_kembali)); ?></td>
          <td>Rp.<?php echo number_format($lp->harga,0,',','.') ?></td>
          <td>Rp.<?php echo number_format($lp->denda,0,',','.') ?></td>
          <td>Rp.<?php echo number_format($lp->total_denda,0,',','.') ?></td>
          <td>
            <?php 
            if($lp->tanggal_pengembalian == '0000-00-00'){
              echo '<center>-</center>';
            }else{
              echo date('d/m/y', strtotime($lp->tanggal_pengembalian));
            }
            ?>
          </td>

          <td>
            <?php echo $lp->status_pengembalian?>
          </td>

          <td>
            <?php echo $lp->status_rental?>
          </td>
        </tr>

        <?php endforeach; ?>

      </table>
    </div>
  </div>
</div>