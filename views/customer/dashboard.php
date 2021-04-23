<main>
  <div class="row text-center">
    <div class="col justify-content-center">
      <h1 class="font-weight-bold text-warning mb-3">PESAN MOBIL HARI INI!</h1>

      <?php if($this->session->userdata('nama')) { ?>
      <h4 class="text-white mb-4">Pesan Mobil Sekarang!</h4>
      <a href="<?php echo base_url('customer/data_mobil') ?>" class="content-link text-warning">
        <button class="btn btn-outline-warning mr-3 btn-lg button-link">
          Mobil
        </button>
      </a>
      <?php } else { ?>
      <h4 class="text-white mb-4">Silakan Login Terlebih Dahulu!</h4>
      <a href="<?php echo base_url('register') ?>" class="content-link text-warning">
        <button class="btn btn-outline-warning mr-3 btn-lg button-link">
          Register
        </button>
      </a>
      <a href="<?php echo base_url('auth/login') ?>" class="content-link text-warning">
        <button class="btn btn-outline-warning mr-3 btn-lg button-link">
          Login
        </button>
        <?php } ?>
      </a>
    </div>
  </div>
</main>