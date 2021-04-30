<main class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <a href="<?php echo base_url('admin/data_bank')?>" class="btn btn-primary mb-3">Tambah Bank</a>

    <div class="card w-50">
      <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">

          <tr>
            <th>No</th>
            <th>Bank</th>
            <th>Nomor Rekening</th>
            <th>Aksi</th>
          </tr>

          <?php 
          $no=1;
          foreach($bank as $bk) :
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $bk->nama_bank ?></td>
            <td><?php echo $bk->nomor_rekening ?></td>
            <td>
              <a href="<?php echo base_url('admin/data_bank/delete_bank/') .$bk->id_bank?>"
                class="btn btn-sm btn-danger"><i class='fas fa-trash'></i></a>
              <a href="<?php echo base_url('admin/data_bank/update_bank/') .$bk->id_bank?>"
                class="btn btn-sm btn-primary"><i class='fas fa-edit'></i></a>
            </td>
          </tr>
          <?php endforeach; ?>

        </table>
      </div>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

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
            <th>Total Denda</th>
            <th>Tgl. Dikembalikan</th>
            <th>Status Pengembalian</th>
            <th>Status Rental</th>
            <th>Cek Pembayaran</th>
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

            <td>
              <center>
                <?php if(empty($tr->bukti_pembayaran)){ ?>
                <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
                <?php }else if($tr->status_pembayaran == '0'){ ?>
                <a class="btn btn-sm btn-warning"
                  href="<?php echo base_url('admin/transaksi/pembayaran/'). $tr->id_rental ?>"><i
                    class="fas fa-file-invoice-dollar"></i></a>
                <?php }else{ ?>
                <a class="btn btn-sm btn-primary"
                  href="<?php echo base_url('admin/transaksi/pembayaran/'). $tr->id_rental ?>"><i
                    class="fas fa-check-circle"></i></a>
                <?php } ?>
              </center>
            </td>

            <td>
              <?php 
            if($tr->status == '1'){?>

              <div class="row">
                <div class="col" style="flex-grow: 0 !important;">
                  <a class="btn btn-sm btn-primary mr-1"
                    href="<?php echo base_url('admin/transaksi/delete_transaksi/'.$tr->id_rental) ?>"><i
                      class="fas fa-trash"></i></a>
                </div>

                <?php } else { ?>
                <div class="row">
                  <div class="col" style="flex-grow: 0 !important; width: 100px;">
                    <a class="btn btn-sm btn-primary mr-1"
                      href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i
                        class="fas fa-check"></i></a>


                  </div>

                  <div class="row">
                    <div class="col p-0">
                      <a class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#batal_transaksi"
                        href="#"><i class="fas fa-times"></i></a>
                    </div>
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

<div class="modal fade" id="batal_transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda ingin membatalkan transaksi?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
        <a class="btn btn-sm btn-primary"
          href="<?php echo base_url('admin/transaksi/batal_transaksi/'.$tr->id_rental) ?>">Ya</a>
      </div>
    </div>
  </div>
</div>