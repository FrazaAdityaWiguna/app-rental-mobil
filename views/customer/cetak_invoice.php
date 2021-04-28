<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Rental Mobil</title>
</head>

<body>
  <div class="container">
    <table class="table table-striped m-auto" style="width:50%;">
      <h2 class="d-flex justify-content-center">Invoice Pembayaran Anda</h2>
      <?php foreach($transaksi as $tr) : ?>
      <tr>
        <td>Nama Customer</td>
        <td>:</td>
        <td><?php echo $tr->nama ?></td>
      </tr>

      <tr>
        <td>Merk Mobil</td>
        <td>:</td>
        <td><?php echo $tr->merk ?></td>
      </tr>

      <tr>
        <td>Tanggal Rental</td>
        <td>:</td>
        <td><?php echo $tr->tanggal_rental ?></td>
      </tr>

      <tr>
        <td>Tanggal Kembali</td>
        <td>:</td>
        <td><?php echo $tr->tanggal_kembali ?></td>
      </tr>

      <tr>
        <td>Biaya Sewa/Hari</td>
        <td>:</td>
        <td>Rp. <?php echo number_format($tr->harga, 0,',','.') ?></td>
      </tr>

      <tr>
        <?php 
            $x = strtotime($tr->tanggal_kembali);
            $y = strtotime($tr->tanggal_rental);
            $jmlHari = abs(($x - $y)/(60*60*24));
            ?>
        <td>Jumlah Hari Sewa</td>
        <td>:</td>
        <td><?php echo $jmlHari ?> hari</td>
      </tr>

      <tr>
        <td>Status Pembayaran</td>
        <td>:</td>
        <td>
          <?php 
    if($tr->status_pembayaran == '0'){
      echo 'Belum Lunas';
    }else{
      echo 'Lunas';
    }
    ?>
        </td>
      </tr>

      <tr style="font-weight: bold; color:red;"> <?php 
            $x = strtotime($tr->tanggal_kembali);
            $y = strtotime($tr->tanggal_rental);
            $jmlHari = abs(($x - $y)/(60*60*24));
            ?>
        <td>Jumlah Pembayaran</td>
        <td>:</td>
        <td>
          Rp. <?php echo number_format($tr->harga * $jmlHari, 0,',','.')  ?>
        </td>
      </tr>

      <tr>
        <td>Rekening Pembayaran</td>
        <td>:</td>
        <td>
          <?php foreach($bank as $bk) : ?>
          <ul>
            <li>
              <?php echo $bk->nama_bank. " : ". $bk->nomor_rekening ?>
            </li>
          </ul>
          <?php endforeach; ?>
        </td>
      </tr>

      <?php endforeach; ?>
    </table>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script>
  window.print();
  </script>
</body>

</html>