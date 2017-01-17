<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午10:48
 * @property $user_model user_model
 */


class Api extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    /**
     * 获取用户信息
     */
    public function info(){
        $userinfo = $this->user_model->userinfo($this->get_userid());

        $this->send_data(true,$userinfo,"获取信息成功");
    }

    /**
     * 获取最新的提示消息
     */
    public function messages(){
        $userid = $this->get_userid();
        try{
            $this->send_data(true,$this->user_model->getmessage($userid),null);
        }catch(Exception $e){
            $this->send_data(false,null,$e->getMessage());
        }
    }

    /**
     * 拾取鸡蛋
     */
    public function pickup_eggs(){
        $user_id =  $this->get_userid();
        $soil_id = $_POST['soil_id'];
        $chicken_id = $_POST['chicken_id'];
        try{
            $pickup_nums = $this->user_model->pickup_eggs($user_id,$soil_id,$chicken_id);
            $this->send_data(true,$pickup_nums,null);
        }catch (Exception $e){
            $this->send_data(false,null,$e->getMessage());
        }
    }

    /**
     * 开地
     */

    public function enable_soil(){
        $user_id = $this->get_userid();
        $soil_id = $_POST['soil_id'];
        try{
            $this->user_model->enable_soil($user_id,$soil_id);
            $this->send_data(true);
        }catch (Exception $e){
            $this->send_data(false,null,$e->getMessage());
        }
    }

    public function pay(){
        $this->load->library("pay");
        $this->pay->pays( "http://h5.91marryu.com:8086/wechat/pay/wxonline-result-show.php","http://h5.91marryu.com:8086/wechat/pay/wxonline-result.php");

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