<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Print Laporan Transaksi</title>
</head>

<body>
  <div class="container vh-100 vw-100 d-flex justify-content-center">
    <div>
      <h3 class="text-center">Laporan Transaksi Rental Mobil</h3>
      <table>
        <tr>
          <td>Dari tanggal</td>
          <td>:</td>
          <td><?php echo date('d-M-Y', strtotime($_GET['dari'])); ?></td>
        </tr>

        <tr>
          <td>Sampai tanggal</td>
          <td>:</td>
          <td><?php echo date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
        </tr>
      </table>

      <table class="table table-bordered mt-2 mr-1 ml-1">
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
  <script>
  window.print();
  </script>
</body>

</html>