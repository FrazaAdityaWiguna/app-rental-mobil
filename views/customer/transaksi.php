<main>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card mx-auto" style="margin-top: 50px; margin-bottom: 50px;">
          <div class="card-header">
            Data Transaksi Anda
          </div>

          <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>

          <div class="card-body">
            <table class="table table-bordered table-striped table-responsive">
              <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Merk Mobil</th>
                <th>No. Plat</th>
                <th>Harga Sewa</th>
                <th>Tgl. Rental</th>
                <th>Tgl. Kembali</th>
                <th>Action</th>
                <th>Batal</th>
              </tr>

              <?php $no=1; foreach($transaksi as $tr) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tr->nama ?></td>
                <td><?php echo $tr->merk ?></td>
                <td><?php echo $tr->no_plat ?></td>
                <td>Rp.<?php echo number_format($tr->harga, 0,',','.') ?></td>
                <td><?php echo date('d/m/y', strtotime($tr->tanggal_rental)) ?></td>
                <td><?php echo date('d/m/y', strtotime($tr->tanggal_kembali)) ?></td>
                <td>
                  <?php if($tr->status_rental == 'Selesai'){ ?>
                  <button class="btn btn-sm btn-danger">Rental Selesai</button>
                  <?php } else { ?>
                  <a href="<?php echo base_url('customer/transaksi/pembayaran/'.$tr->id_rental) ?>"
                    class="btn btn-sm btn-warning">Cek Pembayaran</a>
                  <?php } ?>
                </td>
                <td>
                  <?php if($tr->status_rental == 'Belum Selesai'){ ?>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#batal_transaksi">
                    Batal
                  </button>

                  <?php } else { ?>
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Transaksi Telah Selesai
                  </button>
                  <?php } ?>

                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
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
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kembali</button>
        <a class="btn btn-sm btn-primary"
          href="<?php echo base_url('customer/transaksi/batal_transaksi/'.$tr->id_rental) ?>">Ya</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf, Transaksi telah dilakukan dan tidak bisa dibatalkan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>