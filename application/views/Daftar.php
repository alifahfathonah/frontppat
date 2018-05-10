<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/template/style.css"> -->

    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <title>Dinas Pelayanan Pajak Kota Bandung</title>
    <style>
      hr {
          display: block;
          margin-top: 0.5em;
          margin-bottom: 0.5em;
          margin-left: auto;
          margin-right: auto;
          border-style: inset;
          border-width: 3px;
          background: #00a4da;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-2" style="padding-top: 15px; padding-bottom: 20px;">
          <img src="https://kangnopal.files.wordpress.com/2016/08/logo-pemerintah-kota-bandung-transparent.png?w=296&h=245" class="rounded float" style="width: 130px; height: 110px;">
        </div>
        <div class="col-lg-8" style="padding-left: 0px;">
          <br>
            <h4>Sistem Laporan Penerbitan Akta <br> Dinas Pelayanan Pajak <br> Kota Bandung</h4>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card" style="border-color: #368ee0;  margin-top: 20px;">
            <div class="card-header" style="background: #368ee0;">
              <h5 style="color: #fff;"><center>Form Pendaftaran</center></h5>
            </div>
            <div class="card-body">
              <div class="alert alert-danger" role="alert">
                - No SK PPATK dan Password akan digunakan untuk login ke halaman akun anda. <br>
                - Setiap No SK PPATK hanya dapat digunakan satu kali untuk pendaftaran akun, jika anda lupa password gunakan fasilitas Lupa Password
              </div>
              <br>
              <form class="" action="<?php echo base_url()?>index.php/daftar/aksi_daftar" method="post">
                <div class="form-group">
                  <label>No SK PPATK</label>
                  <input type="text" class="form-control" id="sk" name="no_sk_ppat" placeholder="Masukkan No SK PPTK" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda" required="">
                </div>
                <div class="form-group">
                  <label>Ulangi Password</label>
                  <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Masukkan passwod anda lagi" required="">
                </div>
                <!-- <div class="form-group">
                  <label>Tanggal SK</label>
                  <input class="form-control" id="datepicker" name="tgl" width="300" required="">
                </div> -->
                <div class="form-group">
                  <label>Nama PPTK</label>
                  <input type="text" class="form-control" id="nama_ppat" name="nama_ppat" placeholder="Masukkan nama PPTK" required="">
                </div>
                <div class="form-group">
                  <label>NPWP</label>
                  <input type="number" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP" required="">
                </div>
                <div class="form-group">
                  <label>Daerah Kerja</label>
                  <!-- <input type="text" class="form-control" id="alamat_ppat" name="alamat_ppat" rows="3"> -->
                  <textarea class="form-control" name="daerah_kerja" required="" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Kode Keamanan</label>
                </div>
                <div class="form-group" style="margin-top: -15px;">
                  <?=$image;?>
                  <input type="text" name="captcha_code" required="">
                  <input type="hidden" class="form-control" name="tgl_daftar" value="<?php echo $tgl=Date("d-m-Y H:i:s");?>">
                </div>
                <hr>
                <button type="submit" class="btn btn-success" style="color: #fff;">Daftar</button>
                <div class="btn btn-danger">
                  <a href="<?php echo base_url()?>index.php/login" style="color: #fff;">Batal</a>
                </div>
              </form>
            </div>
            <div class="card-footer text-muted"></div>
          </div>
        </div>
      </div>
    </div>

    <footer></footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        $('#datepicker').datepicker({
            showOtherMonths: true
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
