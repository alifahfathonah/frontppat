<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/style.css">

    <title>Dinas Pelayanan Pajak Kota Bandung</title>
  </head>
  <body>
    <header>
      <h5 style="color: #fff;"><center><br>Sistem Laporan Penerbitan Akta <br> Dinas Pelayanan Pajak <br> Kota Bandung</center></h5>
      <hr>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-4">
          <center><img src="https://baradesain.files.wordpress.com/2011/12/pemerintahkotabandunglogo.png" class="rounded float"></center>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <p>
            Silahkan masukkan No SK PPTK dan Password sesuai dengan data yang sudah anda daftarkan di formulir pendaftaran.
          </p>
          <hr>
          <form class="" action="<?php echo base_url()?>index.php/login/aksi_login" method="post">
            <div class="form-group">
              <label>No SK PPTK</label>
              <input type="number" class="form-control" id="sk" name="no_sk_ppat" required="">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required="">
            </div>
            <div class="form-group">
              <label>Kode Keamanan</label>
              <?=$image;?>
              <input type="text" class="form-control" name="captcha_code" required="">
            </div>
            <button type="submit" class="btn btn-success" style="color: #fff;">Login</button>
            <a href="#" style="color: #fff;">Lupa Password?</a>
          </form>
        </div>
        <div class="col-lg-12">
          <h5><center>Belum Mempunyai akun?</center></h5>
          <div class="text-center">
           <a href="<?php echo base_url()?>index.php/daftar"><img src="http://167.114.13.69/perizinan/assets/img/daftar.png" class="rounded" style="width: 300px;"></a>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
