<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
  </section>

  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h4>Data Mobil</h4>
      </div>
      <table class='table table-hover table-striped table-bordered'>
        <thead>
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Type</th>
            <th>Merk</th>
            <th>No. Plat</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $no=1;
        foreach ($mobil as $mb) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td>
              <img src="<?php echo base_url(). 'assets/upload/'  .$mb->gambar ?>" alt="Mobil" width='100px'>
            </td>
            <td><?php echo $mb->kode_type ?></td>
            <td><?php echo $mb->merk ?></td>
            <td><?php echo $mb->no_plat ?></td>
            <td><?php 
        if($mb->status === '0') {
          echo "<span class='badge badge-danger'> Tidak Tersedia</span>";
        } else {
          echo "<span class='badge badge-primary'> Tersedia</span>";
        }
        ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card w-75">
    <div class="card-body">
      <div class="card-title">
        <h4>Data Customer</h4>
      </div>
      <table class="table table-striped table-responsive table-bordered">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>alamat</th>
          <th>Gender</th>
        </tr>

        <?php 
      $no = 1;
      foreach($customer as $cs) :
      ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $cs->nama ?></td>
          <td><?php echo $cs->username ?></td>
          <td><?php echo $cs->alamat ?></td>
          <td><?php echo $cs->gender ?></td>
        </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="card w-50">
    <div class="card-body">
      <div class="card-title">
        <h4>
          Data Bank
        </h4>
      </div>
      <table class="table table-responsive table-bordered table-striped">

        <tr>
          <th>No</th>
          <th>Bank</th>
          <th>Nomor Rekening</th>
        </tr>

        <?php 
          $no=1;
          foreach($bank as $bk) :
          ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $bk->nama_bank ?></td>
          <td><?php echo $bk->nomor_rekening ?></td>
        </tr>
        <?php endforeach; ?>

      </table>
    </div>
  </div>

  <?php echo $this->session->flashdata('pesan') ?>

  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h4>Data Transaksi</h4>
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
            foreach($transaksi as $tr) :
          ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $tr->nama ?></td>
          <td><?php echo $tr->merk ?></td>
          <td><?php echo date('d/m/y', strtotime($tr->tanggal_rental));  ?></td>
          <td><?php echo date('d/m/y', strtotime($tr->tanggal_kembali)); ?></td>
          <td>Rp.<?php echo number_format($tr->harga,0,',','.') ?></td>
          <td>Rp.<?php echo number_format($tr->denda,0,',','.') ?></td>
          <td>Rp.<?php echo number_format($tr->total_denda,0,',','.') ?></td>
          <td>
            <?php 
            if($tr->tanggal_pengembalian == '0000-00-00'){
              echo '<center>-</center>';
            }else{
              echo date('d/m/y', strtotime($tr->tanggal_pengembalian));
            }
            ?>
          </td>

          <td>
            <?php echo $tr->status_pengembalian?>
          </td>

          <td>
            <?php echo $tr->status_rental?>
          </td>
        </tr>

        <?php endforeach; ?>

      </table>
    </div>
  </div>

</div>