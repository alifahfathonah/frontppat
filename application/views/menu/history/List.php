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
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="">History</a> / Daftar Penerbitan Akta
        </div>
      </div>
      <div class="col-md-3 offset-md-0" style="margin-bottom: 20px;">
        <ul class="list-group">
          <?php
            foreach ($detail as $a) {
              echo "
              <li class='list-group-item list-group-item-primary'><center>Bulan : $a->periode_bulan</center></li>
              <li class='list-group-item list-group-item-secondary'><center>Tahun : $a->periode_tahun</center></li>
              ";
            }
          ?>
        </ul>
      </div>
      <div class="col-md-12 offset-md-0">
        <div class="card border-info mb-3">
          <div class="card-header">
            <p><center>Daftar Penerbitan Akta</center></p>
            <a href="<?php echo base_url()?>index.php/history" class='btn btn-success btn-sm' style="color: #fff;">Kembali</a>
          </div>
          <div class="card-body">
            <div style="overflow-x:auto;">
              <table border="1">
                <tr>
                  <th rowspan="2">No</th>
                  <th colspan="2"><center>Akta</center></th>
                  <th rowspan="2"><center>Bentuk Perbuatan Hukum</center></th>
                  <th colspan="2"><center>Nama Alamat dan NPWP</center></th>
                  <th rowspan="2"><center>Jenis dan Nomor Hak</center></th>
                  <th rowspan="2"><center>Letak Tanah dan Bangunan</center></th>
                  <th colspan="2"><center>Luas (m2)</center></th>
                  <th rowspan="2"><center>Harga Transaksi Perolehan/Pengalihan Hak</center></th>
                  <th colspan="2"><center>SPPT PBB</center></th>
                  <th colspan="2"><center>SSP</center></th>
                  <th colspan="2"><center>SSPD BPHTB</center></th>
                  <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                  <th><center>Nomor</center></td>
                  <th>Tanggal</td>
                  <th><center>Pihak Yang Mengalihkan</center></td>
                  <th><center>Pihak Yang Menerima</center></td>
                  <th><center>Tanah</center></td>
                  <th><center>Bangunan</center></td>
                  <th><center>NOP Tahun</center></td>
                  <th><center>NJOP</center></th>
                  <th><center>Tanggal</center></th>
                  <th><center>Rp</center></th>
                  <th><center>Tanggal</center></th>
                  <th><center>Rp</center></th>
                </tr>
                <tr>
                  <?php
                   $no=1;
                   foreach ($laporan as $r) {
                     echo "<tr>
                           <td>$no</td>
                           <td>$r->no_akta</td>
                           <td><center>$r->tgl_akta</center></td>
                           <td>$r->bentuk_perbuatan_hukum</td>
                           <td>$r->p_mengalihkan_nama</td>
                           <td>$r->p_menerima_nama</td>
                           <td>$r->jenis_dan_nomor_hak</td>
                           <td>$r->letak_tanah_dan_bangunan</td>
                           <td>$r->luas_tanah</td>
                           <td>$r->luas_bangunan</td>
                           <td>$r->harga_transaksi</td>
                           <td><center>$r->sppt_pbb_nop_tahun</center></td>
                           <td>$r->sppt_ppb_njop</td>
                           <td><center>$r->ssp_tanggal</center></td>
                           <td>$r->ssp_nominal</td>
                           <td><center>$r->sspd_bphtb_tanggal</center></td>
                           <td>$r->sspd_bphtb_nominal</td>
                           <td>$r->keterangan</td>
                     </tr>";
                     $no++;
                   }
                   ?>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
      $('#datepicker').datepicker({
          showOtherMonths: true
      });
  </script>

  <script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Apakah yakin ingin menghapus data?');
    });
  </script>

<?php $this->load->view('menu/footer'); ?>
