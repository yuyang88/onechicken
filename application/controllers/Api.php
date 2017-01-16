<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午10:48
 */


class Api extends CI_Controller    {
    public function index(){
        echo "api";
    }

    /**
     * 土地方面的信息
     */
    public function soil(){
        $this->load->model("soil_model");
        var_dump($this->soil_model->version());
    }
}