<div class="container mt-5 mb-5" style="min-height: 400px">
  <div class="card">
    <div class="card-body">
      <?php foreach($detail as $dt) : ?>
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo base_url('assets/upload/').$dt->gambar ?>" style="height: 200px" alt="Rental Mobil">
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Merk</th>
              <td><?php echo $dt->merk ?></td>
            </tr>
            <tr>
              <th>Nomor Plat</th>
              <td><?php echo $dt->no_plat ?></td>
            </tr>
            <tr>
              <th>Warna</th>
              <td><?php echo $dt->warna ?></td>
            </tr>
            <tr>
              <th>Tahun Produksi</th>
              <td><?php echo $dt->tahun ?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><?php 
                if($dt->status == "0"){
                  echo "<span class='badge badge-danger'>Tidak Tersedia/sedang dirental</span>";
                }else{
                  echo "<span class='badge badge-success'>Tersedia</span>";
                }
              ?></td>
            </tr>
            <tr>
              <td></td>
              <td>
                <?php 
                  if($dt->status == "0") {
                    echo "<span class='btn btn-danger' disable>Telah di Rental</span>";
                  }else{
                    echo anchor('customer/rental/tambah_rental/'. $dt->id_mobil, "<button class='btn btn-success'>Rental</button>");
                  }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>