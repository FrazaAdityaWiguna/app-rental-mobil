<main class="container">
  <div class="card mx-auto" style="margin-top: 50px; margin-bottom: 50px; width: 80%">
    <div class="card-header">
      Data Transaksi Anda
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped table-responsive">
        <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Merk Mobil</th>
          <th>No. Plat</th>
          <th>Harga Sewa</th>
          <th>Tgl. Rental</th>
          <th>Tgl. Kembali</th>
          <th>Action</th>
        </tr>

        <?php $no=1; foreach($transaksi as $tr) : ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $tr->nama ?></td>
          <td><?php echo $tr->merk ?></td>
          <td><?php echo $tr->no_plat ?></td>
          <td>Rp.<?php echo number_format($tr->harga, 0,',','.') ?></td>
          <td><?php echo date('d/m/y', strtotime($tr->tanggal_rental)) ?></td>
          <td><?php echo date('d/m/y', strtotime($tr->tanggal_kembali)) ?></td>
          <td><?php echo date('d/m/y', strtotime($tr->tanggal_kembali)) ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</main>