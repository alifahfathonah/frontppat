<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="judul" style="margin-top: 100px;">
              <h4>
                <center>
                  <br> Selamat datang, <br> di Aplikasi Front Office Laporan Penerbitan Akta <br> <br>
                  <button type="submit" class="btn btn-primary" style="color: #fff;"><?php echo $tgl=date('d-m-Y');;?></button>
                </center>
              </h4>
            </div>
        </div>
      </div>
    </div>

<?php $this->load->view('menu/footer'); ?>
