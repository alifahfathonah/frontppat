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
                <form class="" action="<?php echo base_url()?>index.php/menu/laporan/tambah_laporan_list" method="post">
                  <div class="form-group">
                    <?php
                      foreach ($detail as $a) {
                        echo "<input type='hidden' class='form-control' name='data_laporan_id' value='$a->id'>";
                      }
                    ?>
                    <label>No Akta</label>
                    <input type="text" class="form-control" name="no_akta" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Akta</label>
                    <!-- <input class="form-control" id="datepicker" name="tgl_akta" width="400" required=""> -->
                    <input class="form-control" type="date"  id="example-date-input" name="tgl_akta">
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
                    <textarea class="form-control" name="p_mengalihkan_alamat" required="" rows="3"></textarea>
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
                    <textarea class="form-control" name="p_menerima_alamat" required="" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" class="form-control" name="p_menerima_npwp" required="">
                  </div>
                  <div class="form-group">
                    <hr>
                    <label>Jenis dan Nomor Hak</label>
                    <input type="text" class="form-control" name="jenis_dan_nomor_hak" required="">
                  </div>
                  <div class="form-group">
                    <label>Letak Tanah dan Bangunan</label>
                    <textarea class="form-control" name="letak_tanah_dan_bangunan" required="" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Luas Tanah</label>
                    <input type="number" class="form-control" name="luas_tanah"  placeholder="m2" required="">
                  </div>
                  <div class="form-group">
                    <label>Luas Bangunan</label>
                    <input type="number" class="form-control" name="luas_bangunan" placeholder="m2" required="">
                  </div>
                  <div class="form-group">
                    <label>Harga Transaksi</label>
                    <input type="number" class="form-control" name="harga_transaksi" required="">
                  </div>
                  <div class="form-group">
                    <label>NOP Tahun SPPT PBB</label>
                    <select class="custom-select" id="inputGroupSelect01" name="sppt_pbb_nop_tahun" required="">
                      <option selected>Pilih...</option>
                      <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                        ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="sppt_pbb_nop_tahun" required=""> -->
                  </div>
                  <div class="form-group">
                    <label>NJOP (Rp) SPPT PBB</label>
                    <input type="number" class="form-control" name="sppt_ppb_njop" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" type="date"  id="example-date-input" name="ssp_tanggal">
                  </div>
                  <div class="form-group">
                    <label>Nominal SSP</label>
                    <input type="number" class="form-control" name="ssp_nominal" required="">
                  </div>
                  <div class="form-group">
                    <label>Tanggal SSPD BPHTB</label>
                    <input class="form-control" type="date"  id="example-date-input" name="sspd_bphtb_tanggal">
                  </div>
                  <div class="form-group">
                    <label>Nominal SSPD BPHTB</label>
                    <input type="number" class="form-control" name="sspd_bphtb_nominal" required="">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" required="" rows="3"></textarea>
                  </div>
                  <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 offset-md-0">
        <div class="card border-info mb-3">
          <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah</button>
            <a href="<?php echo base_url()?>index.php/laporan btn-sm" class='btn btn-success' style="color: #fff;">Selesai</a>
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
                  <th rowspan="2">Aksi</th>
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
                           <td>
                             <div class='btn btn-success btn-sm'>
                               <center><a href='../edit_laporan_list/$r->id' style='color: #fff;'>Edit</a></center>
                             </div>
                             <div class='btn btn-danger btn-sm'>
                               <center><a href='../hapus_laporan_list/$r->id' style='color: #fff;' class='confirmation'>Hapus</a></center>
                             </div>
                           </td>
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
