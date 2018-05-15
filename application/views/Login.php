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
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/template/style.css"> -->

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
        <div class="col-lg-12">
          <div class="card" style="border-color: #368ee0; margin-top: 20px;">
            <div class="card-header" style="background: #368ee0;">
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                    <p>
                      Silahkan masukkan No SK PPATK dan Password sesuai dengan data yang sudah anda daftarkan di formulir pendaftaran.
                    </p>
                    <hr>
                    <form class="" action="<?php echo base_url()?>index.php/login/aksi_login" method="post">
                      <div class="form-group">
                        <label>No SK PPATK</label>
                        <input type="text" class="form-control" id="sk" name="no_sk_ppat" required="">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" required="">
                      </div>
                      <div class="form-group">
                        <label>Kode Keamanan</label>
                      </div>
                      <div class="form-group" style="margin-top: -15px;">
                        <?=$image;?>
                        <input type="text" name="captcha_code" required="">
                      </div>
                      <button type="submit" name="login" class="btn btn-success" style="color: #fff;">Login</button>
                      <a href="#"  data-toggle="modal" data-target="#exampleModal">Lupa Password?</a>
                    </form>
                  </div>
                <div class="col">
                  <div class="text-center" style="margin-top: 100px;">
                     <h5><center>Belum Mempunyai akun?</center></h5>
                     <a href="<?php echo base_url()?>index.php/daftar"><img src="http://167.114.13.69/perizinan/assets/img/daftar.png" class="rounded" style="width: 300px;"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000;">Lupa Password?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="<?php echo base_url()?>index.php/login/reset" method="post">
                  <div class="form-group">
                    <label style="color: #000;">No SK PPATK</label>
                    <input type="text" class="form-control" name="no_sk_ppat" placeholder="Masukkan No SK PPATK anda" required="">
                  </div>
                  <div class="form-group">
                    <label style="color: #000;">Password</label>
                    <input type="password" class="form-control" name="password" minlength="5" maxlength="20" placeholder="Masukkan password baru anda" required="">
                  </div>
                  <div class="form-group">
                    <label style="color: #000;">Ulangi Password</label>
                    <input type="password" class="form-control" name="re_password" minlength="5" maxlength="20" placeholder="Masukkan kembali password baru anda" required="">
                  </div>
                  <div class="form-group">
                    <label style="color: #000;">Kode Keamanan</label>
                  </div>
                  <div class="form-group" style="margin-top: -15px;">
                    <?=$image;?>
                    <input type="text" name="captcha_code" required="">
                  </div>
                  <button type="submit" name="reset" class="btn btn-success">Reset</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/template/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
