<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Customer</h1>
    </div>
  </section>
  <div class="card">
    <div class="card-body">

      <?php foreach($customer as $cs) : ?>
      <form action="<?php echo base_url('admin/data_customer/update_customer_aksi/').$cs->id_customer ?>" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="hidden" name="id_customer" value="<?php echo $cs->id_customer ?>">
              <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>">
              <?php echo form_error('nama', '<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $cs->username ?>">
              <?php echo form_error('username', '<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat ?>">
              <?php echo form_error('alamat', '<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select name="gender" class="form-control">
                <?php 
                if($cs->gender=='laki-laki'){
                echo '<option value="'.$cs->gender.'">'.$cs->gender.'</option>';
                echo '<option value="perempuan">perempuan</option>';
                }else{
                echo '<option value="'.$cs->gender.'">'.$cs->gender.'</option>';
                echo '<option value="laki-laki">laki-laki</option>';
                }
                ?>
              </select>
              <?php echo form_error('gender', '<span class="text-small text-danger">','</span>') ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>No. Telepon</label>
              <input type="text" name="no_telepon" class="form-control" value="<?php echo $cs->no_telepon ?>">
              <?php echo form_error('no_telepon', '<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
              <label>No. KTP</label>
              <input type="text" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp ?>">
              <?php echo form_error('no_ktp', '<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="<?php echo $cs->password ?>">
              <?php echo form_error('password', '<span class="text-small text-danger">','</span>') ?>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
          </div>
        </div>
      </form>
      <?php endforeach; ?>

    </div>
  </div>
</div>