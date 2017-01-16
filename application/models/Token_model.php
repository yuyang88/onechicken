<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16
 * Time: 13:09
 */
class token_model extends CI_Model
{
    private $table_token = 'wechat_token';

    public function __construct()
    {
        parent::__construct();
        $this->load->database($this->table_token);

    }

    public function getData()
    {


        return $this->db->where('valid_time > ',time())->get($this->table_token)->result_array();
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
            $obj-> $key= $value;
        }

        return $obj;
    }
}
