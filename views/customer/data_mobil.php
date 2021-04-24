<main>
  <div class="container mt-4">

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="row d-flex justify-content-center">

      <?php foreach($mobil as $mb) : ?>

      <div class="col-lg-6 col-md-6">
        <div class="card mb-5">
          <img class="card-img-top" src="<?php echo base_url('assets/upload/'). $mb->gambar ?>" alt="Card image cap" />
          <div class="card-body">
            <h4 class="card-title font-weight-bold"><?php echo $mb->merk ?></h4>
            <h5 class="text-warning text-small text-uppercase">Rp. <?php echo number_format($mb->harga,0,',','.') ?> /
              Hari</h5>
            <div class="dropdown-divider"></div>
            <table class="table table-bordered text-warning">
              <thead>
                <tr>

                  <th scope="col">
                    <?php 
                    if($mb->ac == '1') {
                      echo "<i class='fas fa-check-square text-success'></i>";
                    } else{
                      echo '<i class="fas fa-window-close text-danger"></i>';
                    }
                    ?> AC
                  </th>

                  <th scope="col">
                    <?php 
                    if($mb->supir == '1') {
                      echo "<i class='fas fa-check-square text-success'></i>";
                    } else{
                      echo '<i class="fas fa-window-close text-danger"></i>';
                    }
                    ?> Supir
                  </th>

                  <th scope="col">
                    <?php 
                    if($mb->mp3_player == '1') {
                      echo "<i class='fas fa-check-square text-success'></i>";
                    } else{
                      echo '<i class="fas fa-window-close text-danger"></i>';
                    }
                    ?> Mp3 Player
                  </th>

                  <th scope="col">
                    <?php 
                    if($mb->central_lock == '1') {
                      echo "<i class='fas fa-check-square text-success'></i>";
                    } else{
                      echo '<i class="fas fa-window-close text-danger"></i>';
                    }
                    ?> Central Lock
                  </th>

                </tr>
              </thead>
            </table>

            <?php 
                    
                    if($mb->status == '1'){
                      echo anchor('customer/rental/tambah_rental/'.$mb->id_mobil,
                      '<span class="btn btn-dark">Rental</span>');
                    }else{
                      echo '<span class="btn btn-dark">Tidak Tersedia</span>';
                    }

                    ?>

            <a href="<?php echo base_url('customer/data_mobil/detail_mobil/').$mb->id_mobil ?>"
              class="btn btn-warning">Detail</a>
          </div>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</main>