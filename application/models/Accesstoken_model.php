<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16
 * Time: 12:37
 * @description 微信分享access_token 数据
 */
class Accesstoken_model extends CI_Model
{
    private $table_token = 'wechat_token';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function getData(){


        return $this->db->get($this->table_token)->result_array();
    }

    public function setData($obj)
    {
        return $this->db->set($obj)->insert($this->table_token);
    }

    public function data($arr)
    {
        $obj = new stdClass();
        foreach ($arr as $key=>$value)
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}