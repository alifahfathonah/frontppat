<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4>
              <center>
                <br> Selamat datang, di Aplikasi Front Office <br> <br>
                <button type="submit" class="btn btn-warning" style="color: #fff;"><?php echo $tgl=date('d-m-Y');;?></button>
              </center>
            </h4>
        </div>
      </div>
    </div>

<?php $this->load->view('menu/footer'); ?>
