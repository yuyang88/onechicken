<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/17
 * Time: 19:06
 */
class Topup_model extends CI_Model
{
    public $table = 'tou_up';

    public function __construct()
    {
        parent::__construct();
    }

    public function writeMoney($money,$order_num)
    {
        $sql = "update top_up set money = $money where order_num = $order_num limit 1";
//        return $this->db->query("update top_up set money = ? where order_num = ? limit 1",[$money],$order_num);
        return $this->db->query($sql);
    }


    public function addExtract($sql)
    {
        return $this->db->query($sql);
    }
}