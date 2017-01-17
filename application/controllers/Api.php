<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午10:48
 * @property $user_model user_model
 */


class Api extends MY_Controller {
    /**
     * 获取用户信息
     */
    public function info(){
        $this->load->model("user_model");
        $userinfo = $this->user_model->userinfo($this->get_userid());

        $this->send_data(true,$userinfo,"获取信息成功");
    }

    /**
     * 获取最新的提示消息
     */
    public function messages(){

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