<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16
 * Time: 12:37
 * @description 微信分享access_token 数据
 */
class Accesstoken_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function getData(){


        return $this->db->get('test')->result_array();
    }

    public function setData()
    {
        $obj = new stdClass();
        $obj->access_token = '111';
        $obj->signature = '111';

        $obj = ['access_token' => 222,'signature'=>222];
        return $this->db->set($obj)->insert('test');
    }
}