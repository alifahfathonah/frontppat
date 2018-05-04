<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 20px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="#">Akun Saya</a> / <a href="">Ubah Password</a>
        </div>
      </div>
      <div class="col"></div>
      <div class="col-lg-8">
        <form class="" action="<?php echo base_url()?>index.php/menu/akun/edit_password" method="post">
          <div class="form-group">
            <label>Password Baru</label>
            <input type="hidden" class="form-control" name="ppat_id" value="<?php echo $id = $this->session->userdata('ppat_id'); ?>">
            <input type="password" class="form-control" name="password" placeholder="Masukkan password baru anda">
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" class="form-control" name="re_password" placeholder="Masukkan kembali password anda">
          </div>
          <hr>
          <button type="submit" name="submit" class="btn btn-success" style="color: #fff;">Ganti</button>
          <div class="btn btn-danger">
            <a href="<?php echo base_url()?>index.php/home" style="color: #fff;">Batal</a>
          </div>
        </form>
      </div>
      <div class="col"></div>
  </div>

<?php $this->load->view('menu/footer'); ?>
