<?php
/**
 * 微信授权页面
 *
 *
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16
 * Time: 13:56
 */
class wechat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCode()
    {
        $this->load->model('token_model');
        echo  $this->token_model->_getCode();
    }


}