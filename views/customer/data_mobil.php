<main>
  <div class="container">
    <div class="row d-flex justify-content-center">

      <?php foreach($mobil as $mb) : ?>

      <div class="col-lg-6 col-md-6">
        <div class="card mb-5">
          <img class="card-img-top" src="<?php echo base_url('assets/upload/'). $mb->gambar ?>" alt="Card image cap" />
          <div class="card-body">
            <h4 class="card-title"><?php echo $mb->merk ?></h4>
            <h5 class="text-warning text-small">Harga</h5>
            <div class="dropdown-divider"></div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <table class="table table-bordered text-warning">
              <thead>
                <tr>
                  <th scope="col">Benefit</th>
                  <th scope="col">Benefit</th>
                  <th scope="col">Benefit</th>
                </tr>
              </thead>
            </table>
            <a href="#" class="btn btn-dark">Rental</a>
            <a href="<?php echo base_url('customer/data_mobil/detail_mobil/').$mb->id_mobil ?>"
              class="btn btn-warning">Detail</a>
          </div>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</main>