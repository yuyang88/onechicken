<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午10:48
 */


class Api extends CI_Controller    {
    public function info(){

    }

    /**
     * 土地方面的信息
     */
    public function soil(){
        $this->load->model("soil_model");
        var_dump($this->soil_model->version());
    }

    public function user()
    {
        $this->load->model('token_model');
        $arr = [
            'a'=>1,
            'b'=>12,
            'c'=>13,
            'd'=>14,
        ];
        var_dump($_REQUEST);die;
        $a = $this->token_model->getToken();
        var_dump($a);die;
        $a = $this->token_model->getWeChatSignature();
        var_dump($a);
    }



}