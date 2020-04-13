<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BangunanModel extends CI_Model {

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
}
