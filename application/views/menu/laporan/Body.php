<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="">Laporan Penerbitan Akta</a>
        </div>
      </div>
      <div class="col-md-12 offset-md-0">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="<?php echo base_url()?>index.php/menu/laporan/tambah" method="post">
                  <div class="form-group">
                    <label>Bulan</label>
                    <select class="custom-select" id="inputGroupSelect01" name="periode_bulan">
                      <option selected value="0">Pilih...</option>
                      <?php
                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        $angka=array("01","02","03","04","05","06","07","08","09","10","11","12");
                        $jlh_bln=count($bulan);
                        for($c=0; $c<$jlh_bln; $c+=1){
                            echo"<option value=$angka[$c]> $bulan[$c] </option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <select class="custom-select" id="inputGroupSelect01" name="periode_tahun">
                      <option selected value="0">Pilih...</option>
                      <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                        ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <input type="hidden" name="status" value="Draf">
                    <input type="hidden" name="ppat_id" value="<?php echo $this->session->userdata('ppat_id'); ?>">
                    <input type="hidden" name="tgl_laporan" value="<?php echo $tgl=Date("d-m-Y H:i:s");?>">
                  </div>
                  <button type="submit" name="simpan" class="btn btn-success btn-sm">Next</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="<?php echo base_url()?>index.php/menu/laporan/edit" method="post">
                  <?php foreach ($record as $r) {} ?>
                  <div class="form-group">
                    <label>Bulan</label>
                    <input type="hidden" name="id" value="<?php echo $r->id; ?>">
                    <select class="custom-select" id="inputGroupSelect01" name="periode_bulan">
                      <option selected value="0">Pilih...</option>
                      <?php
                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        $angka=array("01","02","03","04","05","06","07","08","09","10","11","12");
                        $jlh_bln=count($bulan);
                        for($c=0; $c<$jlh_bln; $c+=1){
                            echo"<option value=$angka[$c]> $bulan[$c] </option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <select class="custom-select" id="inputGroupSelect01" name="periode_tahun">
                      <option selected value="0">Pilih...</option>
                      <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                        ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <input type="hidden" name="status" value="Draf">
                    <input type="hidden" name="ppat_id" value="<?php echo $this->session->userdata('ppat_id'); ?>">
                    <input type="hidden" name="tgl_laporan" value="<?php echo $tgl=Date("d-m-Y H:i:s");?>">
                  </div>
                  <button type="submit" name="edit" class="btn btn-success">Edit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 offset-md-0">
          <div class="card card border-info mb-3">
            <div class="card-header">
              <!-- <center>Data Laporan</center> <hr> -->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah
              </button>
            </div>
            <div class="card-body">
              <div style="overflow-x:auto;">
                <!-- Table -->
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Bulan</th>
                          <th scope="col">Tahun</th>
                          <th scope="col">Tanggal Laporan</th>
                          <th scope="col">Status</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no=1;
                       foreach ($record as $r) {
                         echo "<tr>
                               <td>$no</td>
                               <td>$r->periode_bulan</td>
                               <td>$r->periode_tahun</td>
                               <td>$r->tgl_laporan</td>
                               <td>$r->status</td>
                               <td>
                                  <a href='menu/laporan/detail/$r->id' class='btn btn-warning btn-sm' style='color: #fff;'>Detail</a>
                                  <a href='menu/laporan/edit/$r->id' class='btn btn-success btn-sm' style='color: #fff;' data-toggle='modal' data-target='#exampleModal1'>Edit</a>
                                  <a href='#' class='btn btn-danger btn-sm' style='color: #fff;' data-toggle='modal' data-target='#hapus'>Hapus</a>
                                  <a href='menu/laporan/kirim/$r->id' class='btn btn-primary btn-sm' style='color: #fff;'>Kirim</a>
                               </td>
                         </tr>";
                         $no++;
                       }
                       ?>
                    </tbody>
                </table>
              </div>
            </div>
            <div class="modal" id="hapus">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <p>Apakah yakin ingin menghapus data?</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="menu/laporan/hapus/<?php echo $r->id; ?>" method="post">
            						<button type="submit" class="btn btn-success btn-sm">Ya</button>
            						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
            				</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('.confirmation1').on('click', function () {
        return confirm('Apakah yakin ingin menghapus data?');
    });
  </script>

<?php $this->load->view('menu/footer'); ?>
