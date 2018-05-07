<?php
  /**
   *
   */
  class M_laporan extends ci_model
  {
    function data_laporan(){
      $sql = "select * from data_laporan where status='Draf' order by tgl_laporan desc";
      return $this->db->query($sql);
    }

    function list_laporan($id){
      $sql = "select * from data_laporan_list where data_laporan_id='$id'";
      return $this->db->query($sql);
    }

    function cek_data($data){
      $query = $this->db->get_where('data_laporan',$data);
      return $query;
    }

    function tambah($status){
      $data=array(
                  'ppat_id'       => $this->input->post('ppat_id'),
                  'periode_bulan' => $this->input->post('periode_bulan'),
                  'periode_tahun' => $this->input->post('periode_tahun'),
                  'status'        => $status);
      $this->db->insert('data_laporan',$data);
    }

    function detail($id){
      $sql = "select * from data_laporan where id='$id'";
      return $this->db->query($sql);
    }

    function edit(){
      $data=array(
                  'periode_bulan' => $this->input->post('periode_bulan'),
                  'periode_tahun' => $this->input->post('periode_tahun'));
      $this->db->where('id',$this->input->post('id'));
      $this->db->update('data_laporan',$data);
    }

    function hapus($id){
      $this->db->where('id',$id);
			$this->db->delete('data_laporan');
    }

    function kirim($id){
      $status = 'Terkirim';
      $data=array(
                  'status' => $status);
      $this->db->where('id',$id);
      $this->db->update('data_laporan',$data);
    }

    function history(){
      $sql = "select * from data_laporan where status='Terkirim' or status='Diterima' or status='Ditolak' order by tgl_laporan desc";
      return $this->db->query($sql);
    }

    function cek_list_laporan($id){
      $sql = "select * from data_laporan_list where id='$id'";
      return $this->db->query($sql);
    }

    function tambah_list_laporan(){
      $data=array(
                  'data_laporan_id'           => $this->input->post('data_laporan_id'),
                  'no_akta'                   => $this->input->post('no_akta'),
                  'tgl_akta'                  => $this->input->post('tgl_akta'),
                  'bentuk_perbuatan_hukum'    => $this->input->post('bentuk_perbuatan_hukum'),
                  'p_mengalihkan_nama'        => $this->input->post('p_mengalihkan_nama'),
                  'p_mengalihkan_alamat'      => $this->input->post('p_menerima_alamat'),
                  'p_mengalihkan_npwp'        => $this->input->post('p_mengalihkan_npwp'),
                  'p_menerima_nama'           => $this->input->post('p_menerima_nama'),
                  'p_menerima_alamat'         => $this->input->post('p_menerima_alamat'),
                  'p_menerima_npwp'           => $this->input->post('p_menerima_npwp'),
                  'jenis_dan_nomor_hak'       => $this->input->post('jenis_dan_nomor_hak'),
                  'luas_tanah'                => $this->input->post('luas_tanah'),
                  'luas_bangunan'             => $this->input->post('luas_bangunan'),
                  'harga_transaksi'           => $this->input->post('harga_transaksi'),
                  'sppt_pbb_nop_tahun'        => $this->input->post('sppt_pbb_nop_tahun'),
                  'sppt_ppb_njop'             => $this->input->post('sppt_ppb_njop'),
                  'ssp_tanggal'               => $this->input->post('ssp_tanggal'),
                  'ssp_nominal'               => $this->input->post('ssp_nominal'),
                  'sspd_bphtb_tanggal'        => $this->input->post('sspd_bphtb_tanggal'),
                  'sspd_bphtb_nominal'        => $this->input->post('sspd_bphtb_nominal'),
                  'keterangan'                => $this->input->post('keterangan'));
      $this->db->insert('data_laporan_list',$data);
    }

    function edit_list_laporan($id){
      $data=array(
                  'no_akta'                   => $this->input->post('no_akta'),
                  'tgl_akta'                  => $this->input->post('tgl_akta'),
                  'bentuk_perbuatan_hukum'    => $this->input->post('bentuk_perbuatan_hukum'),
                  'p_mengalihkan_nama'        => $this->input->post('p_mengalihkan_nama'),
                  'p_mengalihkan_alamat'      => $this->input->post('p_menerima_alamat'),
                  'p_mengalihkan_npwp'        => $this->input->post('p_mengalihkan_npwp'),
                  'p_menerima_nama'           => $this->input->post('p_menerima_nama'),
                  'p_menerima_alamat'         => $this->input->post('p_menerima_alamat'),
                  'p_menerima_npwp'           => $this->input->post('p_menerima_npwp'),
                  'jenis_dan_nomor_hak'       => $this->input->post('jenis_dan_nomor_hak'),
                  'luas_tanah'                => $this->input->post('luas_tanah'),
                  'luas_bangunan'             => $this->input->post('luas_bangunan'),
                  'harga_transaksi'           => $this->input->post('harga_transaksi'),
                  'sppt_pbb_nop_tahun'        => $this->input->post('sppt_pbb_nop_tahun'),
                  'sppt_ppb_njop'             => $this->input->post('sppt_ppb_njop'),
                  'ssp_tanggal'               => $this->input->post('ssp_tanggal'),
                  'ssp_nominal'               => $this->input->post('ssp_nominal'),
                  'sspd_bphtb_tanggal'        => $this->input->post('sspd_bphtb_tanggal'),
                  'sspd_bphtb_nominal'        => $this->input->post('sspd_bphtb_nominal'),
                  'keterangan'                => $this->input->post('keterangan'));
      $this->db->where('id',$id);
      $this->db->update('data_laporan_list',$data);
    }

    function hapus_list_laporan($id){
      $this->db->where('id',$id);
      $this->db->delete('data_laporan_list');
    }
  }
?>
