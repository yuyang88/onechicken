<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 下午11:38
 */

class User_model extends CI_Model {
    public $userinfo;
    public $soils;
    public $recommand_list;

    public function userinfo($userid)
    {
        /**
         * 获取用户基本信息
         */
        $userinfo = $this->db->query("select wu.id,wu.nickname,wu.headimgurl,ua.eggs,ua.today_eggs,ua.money,ua.recommand_eggs,ua.total_eggs from chicken_wechat_user as wu inner join user_addition as ua on ua.user_id = wu.id where wu.id = ? limit 1",[$userid])->row_array();
        if(!$userinfo){
            throw new Exception("用户不存在");
        }
        $recommand_list = $this->recommands($userid);
        $soils = $this->soil($userid);
        $this->recommand_list = $recommand_list;
        $this->soils = $soils;
        $this->userinfo = $userinfo;
        $userinfo['soil_list'] = $soils;
        $userinfo['recommand_list'] = $recommand_list;
        $userinfo['total_eggs'] = $userinfo['total_eggs'] + $userinfo['today_eggs'];
        return $userinfo;
    }

    /**
     * 推荐成功的用户列表
     * @param $userid 用户ID
     * @return Array
     */
    public function recommands($userid){
        $result = $this->db->query("select cw.id,cw.nickname,cw.headimgurl from chicken_wechat_user as cw inner join user_addition as ua on ua.user_id = cw.id where ua.recommand = ? ",[$userid]);
        return $result->result_array();

    }

    /**
     * 获取土地信息,包括鸡的信息
     * @param $userid 用户ID
     */
    public function soil($userid){
        $result = $this->db->query("select * from soil where user_id = ?",[$userid])->result_array();
        foreach($result as &$item){
            if($item['enabled']){
                $chickens = $this->db->query("select * from chicken where soil_id = ? and user_id = ? and is_dead = 0 ",[$item['id'],$userid])->result_array();
                $item['chickens'] = $chickens;
            }
        }
        return $result;
    }



    /**
     * @param $userid 用户ID
     * @param $eggs   蛋的数量
     * 将钱转化为蛋
     */
    public function money2eggs($userid,$eggs){

    }


    /**
     * 推荐成功后调用的方法
     * @param $userid 当前用户
     * @param $recommand_id 被推荐者的用户ID
     */
    public function recommand_ok($userid,$recommand_id){

    }


    /**
     * 拾取鸡蛋
     * @param $userid 用户ID
     * @param $soilid 土地ID
     * @param $chicken 鸡
     */

    public function get_egs($userid,$soilid,$chicken){

    }
}