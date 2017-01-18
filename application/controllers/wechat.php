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
        $this->load->model('token_model');
    }

    public function getCode()
    {
        $recommand_code = '';
        $parent_id = 0;
        if($_GET['code'] && $_GET['state'] == '123')
        {
            if($_GET['recommand_code'])
                $recommand_code = $_GET['recommand_code'];

            if($recommand_code)
            {
                $this->load->model('topup_model');
                $sql = "update chicken_wehcat_user set recommand_num = recommand+1 WHERE recommand_code = $recommand_code";
                $this->topup_model->addExtract($sql);

                $parentInfo = $this->token_model->getid($recommand_code);
                if($parentInfo)
                    $parent_id = $parentInfo['id'];
            }

            $data = $this->token_model->getWeChatOpenId($_GET['code'],$recommand_code,$parent_id);
            if($data) {
                $userinfo= $this->token_model->getWuId($data['wechat_id']);
                setcookie('user_id',$userinfo['id'],time()+8640000);
                header("Location:http://h5.91marryu.com/onechicken/index.php/wechat/game");
            }
        }
         $this->token_model->_getCode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    }

    public function game()
    {
        $this->load->view('chicken');
    }


}