<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 20px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="">History</a>
        </div>
      </div>
      <div class="col-md-12 offset-md-0">
        <div class="card card border-info mb-3">
          <div class="card-header">
            <center>History Laporan</center>
          </div>
          <div class="card-body">
            <!-- Table -->
            <table id="table_id" class="display">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Bulan</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Tanggal Laporan</th>
                      <th scope="col">Status</th>
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
                     </tr>";
                     $no++;
                   }
                   ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('menu/footer'); ?>
