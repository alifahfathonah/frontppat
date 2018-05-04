<?php
  /**
   *
   */
  class M_laporan extends ci_model
  {
    function select_all()
    {
      $sql = "select * from data_laporan where status='Draf' order by tgl_laporan desc";
      return $this->db->query($sql);
    }

    function list_laporan($id)
    {
      $sql = "select * from data_laporan_list where data_laporan_id='$id'";
      return $this->db->query($sql);
    }

    function cek_data($data)
    {
      $query= $this->db->get_where('data_laporan',$data);
      return $query;
    }

    function tambah($status)
    {
      $data=array(
                  'ppat_id'       => $this->input->post('ppat_id'),
                  'periode_bulan' => $this->input->post('periode_bulan'),
                  'periode_tahun' => $this->input->post('periode_tahun'),
                  'status'        => $status);
      $this->db->insert('data_laporan',$data);
    }

    function detail($id){
      $query= $this->db->get_where('data_laporan',$id);
      return $query;
    }

    function edit()
    {
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

    function history()
    {
      $sql = "select * from data_laporan where status='Terkirim' order by tgl_laporan desc";
      return $this->db->query($sql);
    }
  }
?>
