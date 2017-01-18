<?php
/**
 * Created by PhpStorm.
 * User: hemuhan
 * Date: 17/1/16
 * Time: 上午10:48
 * @property $user_model user_model
 */


class Api extends MY_Controller {

    private $_message = "获取信息成功";
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

        $this->send_data(true,$userinfo,$this->_message);
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
     * 蛋兑换成鸡
     */
    public function egg2chicken(){
        $user_id = $this->get_userid();
        try{
            $soil_id = $this->user_model->egg2chicken($user_id);
            $this->send_data(true,$soil_id);
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
            $soil_id = $this->user_model->enable_soil($user_id,$soil_id);
            $this->send_data(true,$soil_id);
        }catch (Exception $e){
            $this->send_data(false,null,$e->getMessage());
        }
    }

    public function pay(){
        $this->load->model('topup_model');
        $this->load->model('token_model');
        $this->load->library("pay");
        /*用户地址*/
        $memLink = "http://h5.91marryu.com/onechicken/wechat/game";
        /*服务器通知地址*/
        $serLink = "http://h5.91marryu.com/onechicken/api/payCall";
        /*金额*/
        $money = $_POST['money'];
        /*订单号*/
        $data['order_num'] = $order= 'Mer' . date('Ymdhis').rand(1,99999);
        /*微信用户id*/
        $data['wu_id'] = $wu_id = $_COOKIE['user_id'];
        $data['create_time'] = time();

        /*写入支付记录*/
        $dataObj = $this->token_model->setData($data);
        $this->topup_model->save($dataObj);

        $this->pay->pays($memLink,$serLink,$money,$order);
    }

    public function payCall()
    {
        //todo:反写换鸡蛋
        $data = $this->_addTopUp();
        if($data && $data['message'])
        {
//            $data['money']=1;
//            $data['order_num']=1;
            /*反写*/
            $this->load->model('topup_model');
            $sql1 = "select * from top_up WHERE order_num = ".$data['order_num'];
            $orderInfo = $this->topup_model->querySql($sql1);
            $info = $this->topup_model->writeMoney($data['money'],$data['order_num']);
            $money = $data['money'];
            $sql = "update chicken_wehcat_user set tou_up = tou_up+$money WHERE id = ".$orderInfo['wu_id'];
            $this->topup_model->addExtract($sql);
            if($info)
                true;
                //反写换鸡蛋
        }
    }

    private function verifyReturn(){
        try {
            if(empty($_REQUEST)) {
                return false;
            }
            else {
                $paymentResult = $_REQUEST['paymentResult'];
                $xmlResult = new SimpleXMLElement($paymentResult);
                $strSignature = $xmlResult->WxPayRsp->head->Signature;
                $rspCode = $xmlResult->WxPayRsp->head->RspCode;
                if($rspCode == "000000")
                {
                    $strBody = subStrXml("<body>","</body>",$paymentResult);

                    if(md5Verify($strBody,$strSignature,$this->ipspay_config["MerCode"],$this->ipspay_config["MerCert"])){
                        return true;
                    }else{
                        return false;
                    }
                }

            }
        } catch (Exception $e) {
            Log::ERROR("异常:" . $e);
        }
        return false;
    }

    private function _addTopUp()
    {
        $verify_result = $this->verifyReturn();
        if ($verify_result) { // 验证成功

            $paymentResult = $_REQUEST['paymentResult'];
            $xmlResult = new SimpleXMLElement($paymentResult);
            $status = $xmlResult->WxPayRsp->body->Status;
            if($status == "Y")
            {
                $merBillNo = $xmlResult->WxPayRsp->body->MerBillno;
                /*订单号*/
                $data['order_num'] = $MerCode = $xmlResult->WxPayRsp->body->MerCode;
                $Account = $xmlResult->WxPayRsp->body->Account;
                $IpsBillNo = $xmlResult->WxPayRsp->body->IpsBillNo;
                /*订单金额*/
                $data['money'] =$ordAmt = $xmlResult->WxPayRsp->body->OrdAmt;
                $message = true;
            }elseif($status == "N")
            {
                $message = true;
            }else {
                $message = true;
            }

        } else {
            $message = false;
        }
        $data['message'] = $message ;

    }


    /**
     * 微信分享接口 所需access_token && signature
     */
    public function share()
    {
        $this->load->model('token_model');
//        $this->token_model->getWeChatSignature();
        $data = $this->token_model->setToken();
        $this->send_data(true,$data,$this->_message);
        /*getWeChatSignature*/
    }



    public function tixian()
    {
        /*银行卡号brank_num 姓名name 提现金额money wu_id create_time*/
        $this->load->model('topup_model');
        $name = "'".$_POST['name']."'";
        $brank_num = $_POST['brank_num'];
        $money = $_POST['money'];
        $wu_id = $_POST['userid'];
        $create_time = time();
        $sql = " INSERT INTO extract (`name`,`brank_num`,`money`,`wu_id`,`create_time`) VALUES ( $name,$brank_num,$money,$wu_id,$create_time)";
        $info = $this->topup_model->addExtract($sql);
        if($info)
            $this->send_data(true);

        $this->send_data(false,[],'失败');
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