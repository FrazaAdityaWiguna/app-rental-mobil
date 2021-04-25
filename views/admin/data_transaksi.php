<main class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Mobil</th>
            <th>Tgl. Rental</th>
            <th>Tgl. Kembali</th>
            <th>Harga/Hari</th>
            <th>Denda/Hari</th>
            <th>Tgl. Dikembalikan</th>
            <th>Status Pengembalian</th>
            <th>Status Rental</th>
            <th>Action</th>
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
            <td>
              <?php 
            if($tr->tanggal_pengembalian == '0000-00-00'){
              echo '-';
            }else{
              echo date('d/m/y', strtotime($tr->tanggal_pengembalian));
            }
            ?>
            </td>
            <td>
              <?php 
            if($tr->status == '1'){
              echo 'Kembali';
            }else{
              echo 'Belum Kembali';
            }
            ?>
            </td>
            <td>
              <?php 
            if($tr->status == '1'){
              echo 'Kembali';
            }else{
              echo 'Belum Kembali';
            }
            ?>
            </td>
            <td>
              <?php 
            if($tr->status == '1'){
              echo '-';
            }else{ ?>

              <div class="row">
                <div class="col" style="flex-grow: 0 !important;">
                  <a class="btn btn-sm btn-primary mr-1"
                    href="<?php echo base_url('admin/transaksi/transaksi_selesai') ?>"><i class="fas fa-check"></i></a>
                </div>

                <div class="row">
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/transaksi_batal') ?>"><i
                      class="fas fa-times"></i></a>
                </div>
              </div>

              <?php } ?>
            </td>
          </tr>

          <?php endforeach; ?>

        </table>
      </div>
    </div>

  </section>
</main>