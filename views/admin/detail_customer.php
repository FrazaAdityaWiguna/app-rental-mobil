<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Cutomer</h1>
    </div>
  </section>

  <?php foreach($detail as $dt) : ?>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td><?php echo $dt->nama ?></td>
            </tr>
            <tr>
              <td>Username</td>
              <td><?php echo $dt->username ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><?php echo $dt->alamat ?></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><?php echo $dt->gender ?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-5">
          <table class="table">
            <tr>
              <td>No. Telepon</td>
              <td><?php echo $dt->no_telepon ?></td>
            </tr>
            <tr>
              <td>No. KTP</td>
              <td><?php echo $dt->no_ktp ?></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><?php echo $dt->password ?></td>
            </tr>
          </table>
          <a class="btn btn-danger ml-4" href="<?php echo base_url('admin/data_customer') ?>">Kembali</a>
          <a class="btn btn-primary ml-2"
            href="<?php echo base_url('admin/data_customer/update_customer/').$dt->id_customer ?>">Update</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>