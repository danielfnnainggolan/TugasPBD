<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function get($username){
        $this->db->where('username', $username);
        $result = $this->db->get('user')->row();
        return $result;
    }


    public function register($data)
    {
        $result = $this->db->insert('user',$data);
        return $result;
    }

    public function getUser(){
      $this->db->select('dataprofil.nama, dataprofil.email, user.username, user.id_user,user.tipe_user');
      $this->db->from('dataprofil');
      $this->db->join('user', 'dataprofil.id_user =user.id_user', 'right');
      $this->db->where('user.tipe_user', 'user');
      $result=$this->db->get()->result();
      return $result;
    }

    public function getProfile(){
    $id = $this->session->userdata('id');
    $this->db->select('dataprofil.nama, dataprofil.email, user.username, user.id_user');
    $this->db->from('dataprofil');
    $this->db->join('user', 'dataprofil.id_user =user.id_user', 'right');
    $this->db->where('user.id_user', $id);
    $result=$this->db->get();
    return $result->row();
    }

    public function updateUser($data) {
      $id= $this->session->userdata('id');
      $username = $data['username'];
      $nama = $data['nama'];
      $email = $data['email'];
      $sql =
      "UPDATE dataprofil" .
      " INNER JOIN  user ON dataprofil.id_user = user.id_user" .
      " SET username = '$username', nama = '$nama', email = '$email'".
      " WHERE user.id_user = ".$id."" ;
      $this->db->query($sql);
      return ($this->db->affected_rows() > 0);
    }
    public function editProfile($id){
    $this->db->select('dataprofil.nama, dataprofil.email, user.username, user.id_user');
    $this->db->from('dataprofil');
    $this->db->join('user', 'dataprofil.id_user =user.id_user', 'inner');
    $this->db->where('user.id_user', $id);
    $result=$this->db->get();
    return $result->row();
    }

    public function deleteUser($id){
        $result = $this->db->delete('user', array('id_user' => $id));
        return $result;
    }

}
