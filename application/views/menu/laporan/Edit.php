<?php $this->load->view('menu/header'); ?>
<?php $this->load->view('menu/navbar'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 20px;">
        <div class="alert alert-info" role="alert">
          <a href="<?php echo base_url()?>index.php/home">Home</a> / <a href="">Laporan Penerbitan Akta</a> / Edit Penerbitan Akta
        </div>
      </div>
      <div class="col-md-8 offset-md-2">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h4><center>Edit Data Penerbitan Akta</center></h4>
          </div>
          <div class="card-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <?php
                  foreach ($record as $a) {
                    echo "<input type='hidden' class='form-control' name='data_laporan_id' value='$a->id'>";
                  }
                ?>
                <label>No Akta</label>
                <input type="text" class="form-control" name="no_akta" value="<?php echo $a->no_akta; ?>" required="">
              </div>
              <div class="form-group">
                <label>Tanggal Akta</label>
                <!-- <input class="form-control" id="datepicker" name="tgl_akta" width="400" required=""> -->
                <input class="form-control" type="date"  id="example-date-input" name="tgl_akta" value="<?php echo $a->tgl_akta; ?>">
              </div>
              <div class="form-group">
                <label>Bentuk Perbuatan Hukum</label>
                <input type="text" class="form-control" name="bentuk_perbuatan_hukum" value="<?php echo $a->bentuk_perbuatan_hukum; ?>" required="">
              </div>
              <div class="form-group">
                <hr><label><b>Pihak Yang Mengalihkan</b></label> <hr>
                <label>Nama</label>
                <input type="text" class="form-control" name="p_mengalihkan_nama" value="<?php echo $a->p_mengalihkan_nama; ?>" required="">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="p_mengalihkan_alamat" required="" rows="3"><?php echo $a->p_mengalihkan_alamat; ?></textarea>
              </div>
              <div class="form-group">
                <label>NPWP</label>
                <input type="text" class="form-control" name="p_mengalihkan_npwp" value="<?php echo $a->p_menerima_npwp; ?>" required="">
              </div>
              <div class="form-group">
                <hr><label><b>Pihak Yang Menerima</b></label> <hr>
                <label>Nama</label>
                <input type="text" class="form-control" name="p_menerima_nama" value="<?php echo $a->p_menerima_nama; ?>" required="">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="p_menerima_alamat" required="" rows="3"><?php echo $a->p_menerima_alamat; ?></textarea>
              </div>
              <div class="form-group">
                <label>NPWP</label>
                <input type="text" class="form-control" name="p_menerima_npwp" value="<?php echo $a->p_menerima_alamat; ?>" required="">
              </div>
              <div class="form-group">
                <hr>
                <label>Jenis dan Nomor Hak</label>
                <input type="text" class="form-control" name="jenis_dan_nomor_hak" value="<?php echo $a->jenis_dan_nomor_hak; ?>" required="">
              </div>
              <div class="form-group">
                <label>Letak Tanah dan Bangunan</label>
                <textarea class="form-control" name="letak_tanah_dan_bangunan" required="" rows="3"><?php echo $a->letak_tanah_dan_bangunan; ?></textarea>
              </div>
              <div class="form-group">
                <label>Luas Tanah</label>
                <input type="number" class="form-control" name="luas_tanah" value="<?php echo $a->luas_tanah; ?>" placeholder="m2" required="">
              </div>
              <div class="form-group">
                <label>Luas Bangunan</label>
                <input type="number" class="form-control" name="luas_bangunan" value="<?php echo $a->luas_bangunan; ?>" placeholder="m2" required="">
              </div>
              <div class="form-group">
                <label>Harga Transaksi</label>
                <input type="number" class="form-control" name="harga_transaksi" value="<?php echo $a->harga_transaksi; ?>" required="">
              </div>
              <div class="form-group">
                <label>NOP SPPT PBB</label>
                <select class="custom-select" id="inputGroupSelect01" name="sppt_pbb_nop_tahun" required="">
                  <option selected value="<?php echo $a->sppt_pbb_nop_tahun; ?>"><?php echo $a->sppt_pbb_nop_tahun; ?></option>
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
                <label>NJOP SPPT PBB</label>
                <input type="number" class="form-control" name="sppt_ppb_njop" value="<?php echo $a->sppt_ppb_njop; ?>" required="">
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input class="form-control" type="date"  id="example-date-input" name="ssp_tanggal" value="<?php echo $a->ssp_tanggal; ?>" required="">
              </div>
              <div class="form-group">
                <label>Nominal SSP</label>
                <input type="number" class="form-control" name="ssp_nominal"  value="<?php echo $a->ssp_nominal; ?>" required="">
              </div>
              <div class="form-group">
                <label>Tanggal SSPD BPHTB</label>
                <input class="form-control" type="date"  id="example-date-input" name="sspd_bphtb_tanggal"  value="<?php echo $a->sspd_bphtb_tanggal; ?>" required="">
              </div>
              <div class="form-group">
                <label>Nominal SSPD BPHTB</label>
                <input type="number" class="form-control" name="sspd_bphtb_nominal"  value="<?php echo $a->sspd_bphtb_nominal; ?>" required="">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" required="" rows="3"><?php echo $a->keterangan; ?></textarea>
              </div>
              <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
              <div class="btn btn-danger btn-sm">
                <a href="#" onclick="history.go(-1);" style="color: #fff;">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('menu/footer'); ?>
