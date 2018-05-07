<?php
  /**
   *
   */
  class M_login extends ci_model
  {
    function login($data)
    {
      $query= $this->db->get_where('data_ppat',$data);
      return $query;
    }

    function daftar()
    {
      $data=array(
                  'no_sk_ppat'  => $this->input->post('no_sk_ppat'),
                  'password'    => md5($this->input->post('password')),
                  'nama_ppat'   => $this->input->post('nama_ppat'),
                  'alamat_ppat' => $this->input->post('alamat_ppat'),
                  'npwp'        => $this->input->post('npwp'),
                  'tgl_daftar'  => $this->input->post('tgl_daftar'));
      $this->db->insert('data_ppat',$data);
    }

    function select_profil($id)
    {
      $sql = "select * from data_ppat where ppat_id = '$id'";
      return $this->db->query($sql);
    }

    function update(){
      $data=array(
                  'no_sk_ppat'  => $this->input->post('no_sk_ppat'),
                  'nama_ppat'   => $this->input->post('nama_ppat'),
                  'alamat_ppat' => $this->input->post('alamat_ppat'),
                  'npwp'        => $this->input->post('npwp'),
                  'daerah_kerja'=> $this->input->post('daerah_kerja'));
      $this->db->where('ppat_id',$this->input->post('ppat_id'));
      $this->db->update('data_ppat',$data);
    }

    function reset_pass(){
      $data=array(
                  'password'  => md5($this->input->post('password')));
      $this->db->where('no_sk_ppat',$this->input->post('no_sk_ppat'));
      $this->db->update('data_ppat',$data);
    }

  }
?>
