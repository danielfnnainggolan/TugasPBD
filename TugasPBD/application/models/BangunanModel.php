<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BangunanModel extends CI_Model {

	public function get(){
			$result = $this->db->get('bangunan')->result();
			return $result;
	}

	public function addTempat($data)
    {
        $result = $this->db->insert('bangunan',$data);
        return $result;
    }

		public function deleteTempat($bangunan_id)
    {
        $result = $this->db->delete('bangunan', array('bangunan_id' => $bangunan_id));
        return $result;
    }

		public function getBangunan($id){
				$this->db->where('bangunan.bangunan_id', $id);
				$result = $this->db->get('bangunan');
				return $result->row();
		}

		public function updateBangunan($data)
	    {
				$id= $data['id'];
	      $bangunan_nama = $data['bangunan_nama'];
	      $bangunan_lat = $data['bangunan_lat'];
	      $bangunan_long = $data['bangunan_long'];
				$sql =
	      "UPDATE bangunan" .
	      " SET bangunan_nama = '$bangunan_nama', bangunan_lat = '$bangunan_lat', bangunan_long = '$bangunan_long'".
	      " WHERE bangunan.bangunan_id = ".$id."" ;
	      $this->db->query($sql);
	      return ($this->db->affected_rows() > 0);

	    }


}
