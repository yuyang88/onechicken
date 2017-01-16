<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午11:16
 */
class Soil_model extends CI_Model {
    public function version(){
        $query = $this->db->query("select version()");
        return $query->result();
    }
}