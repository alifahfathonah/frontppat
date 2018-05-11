<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 20px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="#">Akun Saya</a> / <a href="">Ubah Profil</a>
        </div>
      </div>
      <div class="col"></div>
      <div class="col-lg-8">
        <div class="card" style="border-color: #368ee0;">
          <div class="card-header" style="background: #368ee0;"></div>
          <div class="card-body">
            <form class="" action="<?php echo base_url()?>index.php/menu/akun/edit_profil" method="post">
              <?php foreach ($record as $r) {} ?>
              <div class="form-group">
                <label>Nomor SK PPATK</label>
                <input type="hidden" class="form-control" name="ppat_id" value="<?php echo $id = $this->session->userdata('ppat_id'); ?>">
                <input type="text" class="form-control" name="no_sk_ppat" value="<?php echo $r->no_sk_ppat; ?>" required="">
              </div>
              <div class="form-group">
                <label>Nama PPTK</label>
                <input type="text" class="form-control" name="nama_ppat" value="<?php echo $r->nama_ppat; ?>" required="">
              </div>
              <div class="form-group">
                <label>Alamat PPAT</label>
                <input type="text" class="form-control" name="alamat_ppat" value="<?php echo $r->alamat_ppat; ?>" required="">
              </div>
              <div class="form-group">
                <label>Nomor Pokok Wajib Pajak</label>
                <input type="text" class="form-control" name="npwp" value="<?php echo $r->npwp; ?>" required="">
              </div>
              <div class="form-group">
                <label>Daerah Kerja</label>
                <input type="text" class="form-control" name="daerah_kerja" value="<?php echo $r->daerah_kerja; ?>" required="">
              </div>
              <hr>
              <button type="submit" name="submit" class="btn btn-success btn-sm" style="color: #fff;">Simpan</button>
              <a href="<?php echo base_url()?>index.php/home" class='btn btn-danger btn-sm' style="color: #fff;">Batal</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col"></div>
  </div>

<?php $this->load->view('menu/footer'); ?>
