<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <!-- Datepicker -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 20px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="">Laporan Penerbitan Akta</a> / Daftar Penerbitan Akta
        </div>
      </div>
      <div class="col-md-4 offset-md-0">
        <ul class="list-group">
          <li class="list-group-item list-group-item-primary">Bulan :</li>
          <li class="list-group-item list-group-item-secondary">Tahun : </li>
        </ul>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Edit</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</button>
        <div class="btn btn-success">
          <a href="<?php echo base_url()?>index.php/laporan" style="color: #fff;">Selesai</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbitan Akta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="<?php echo base_url()?>index.php/menu/laporan/tambah" method="post">
                  <div class="form-group">
                    <label>No Akta</label>
                    <input type="text" class="form-control" name="no_akta" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Akta</label>
                    <input class="form-control" id="datepicker" name="tgl_akta" width="300" required="">
                  </div>
                  <div class="form-group">
                    <label>Bentuk Perbuatan Hukum</label>
                    <input type="text" class="form-control" name="bentuk_perbuatan_hukum" required="">
                  </div>
                  <div class="form-group">
                    <hr><label><b>Pihak Yang Mengalihkan</b></label> <hr>
                    <label>Nama</label>
                    <input type="text" class="form-control" name="p_mengalihkan_nama" required="">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="p_mengalihkan_alamat" required="">
                  </div>
                  <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" class="form-control" name="p_mengalihkan_npwp" required="">
                  </div>
                  <div class="form-group">
                    <hr><label><b>Pihak Yang Menerima</b></label> <hr>
                    <label>Nama</label>
                    <input type="text" class="form-control" name="p_menerima_nama" required="">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="p_menerima_alamat" required="">
                  </div>
                  <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" class="form-control" name="p_menerima_npwp" required="">
                  </div>
                  <div class="form-group">
                    <hr>
                    <label>Jenis dan Nomor Hak</label>
                    <input type="text" class="form-control" name="jenis_dan_nomor_hal" required="">
                  </div>
                  <div class="form-group">
                    <label>Letak Tanah dan Bangunan</label>
                    <input type="text" class="form-control" name="letak_tanah_dan_bangunan" required="">
                  </div>
                  <div class="form-group">
                    <label>Luas Tanah</label>
                    <input type="number" class="form-control" name="luas_tanah" placeholder="m2" required="">
                  </div>
                  <div class="form-group">
                    <label>Luas Bangunan</label>
                    <input type="number" class="form-control" name="luas_bangunan" placeholder="m2" required="">
                  </div>
                  <div class="form-group">
                    <label>Harga Transaksi</label>
                    <input type="number" class="form-control" name="harga-transaksi" required="">
                  </div>
                  <div class="form-group">
                    <label>NOP SPPT PBB</label>
                    <input type="text" class="form-control" name="sppt_pbb_nop_tahun" required="">
                  </div>
                  <div class="form-group">
                    <label>NJOP SPPT PBB</label>
                    <input type="text" class="form-control" name="sppt_pbb_njop" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" id="datepicker" name="ssp_tanggal" width="300" required="">
                  </div>
                  <div class="form-group">
                    <label>Nominal SSP</label>
                    <input type="number" class="form-control" name="ssp_nominal" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal SSPD BPHTB</label>
                    <input class="form-control" id="datepicker" name="sspd_bphtb_tanggal" width="300" required="">
                  </div>
                  <div class="form-group">
                    <label>Nominal SSPD BPHTB</label>
                    <input type="number" class="form-control" name="sspd_bphtb_nominal" required="">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required="">
                  </div>
                  <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <div class="col-md-12 offset-md-0">
        <!-- Table -->
        <table id="table_id" class="display">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Akta</th>
                  <th scope="col">Bentuk Perbuatan Hukum</th>
                  <th scope="col">Nama Alamat & NPWP</th>
                  <th scope="col">Jenis & nomor hak</th>
                  <!-- <th scope="col">Letak Tanah & Bangunan</th>
                  <th scope="col">Luas</th>
                  <th scope="col">Harga transaksi perolehan/pengalihan hak</th>
                  <th scope="col">SPTT PBB</th>
                  <th scope="col">SSP</th>
                  <th scope="col">SSPD BPHTB</th>
                  <th scope="col">Keterangan</th> -->
                </tr>
            </thead>
            <tbody>
              <?php
               $no=1;
                 echo "<tr>
                       <td>$no</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>

                 </tr>";
                 $no++;
               ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
      $('#datepicker').datepicker({
          showOtherMonths: true
      });
  </script>

<?php $this->load->view('menu/footer'); ?>
