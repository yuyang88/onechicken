<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


    private $_cookieName = 'aid';
    private $_cookieUserName = 'email';
    private $_cookieTime = 8640000;
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if($_POST)
        {

            $this->load->model("admin_model");
            $userInfo = $this->admin_model->getUsers($_POST['email']);
            if(md5($_POST['password']) == $userInfo['pwd'])
            {
                setcookie($this->_cookieName,$userInfo['id'],time()+$this->_cookieTime);
                setcookie($this->_cookieUserName,$userInfo['email'],time()+$this->_cookieTime);
                header('location:http://localhost/onechicken/index.php/admin/ok');
            }
        }

        $this->load->view('admin_login');
    }

    public function show()
    {
//        error_reporting(0);
        $this->load->library('pagination');
        $this->load->model('topup_model');

        $config['base_url'] = 'http://localhost/onechicken/index.php/admin/show/page/';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;
        $config['enable_query_strings'] = true;

        $this->pagination->initialize($config);

        $data['page'] =  $this->pagination->create_links();
        $page = intval($_GET['page']);
        $sql = "select * from chicken_wechat_user limit $page, 2";
        $data['list'] = $this->topup_model->querySql($sql);

        $this->load->view('admin_user',$data);
//        $this->load->view('admin_login');
    }


    public function tixian()
    {
        $this->load->library('pagination');
        $this->load->model('topup_model');

        $config['base_url'] = 'http://localhost/onechicken/index.php/admin/tixian/page/';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;
        $config['enable_query_strings'] = true;

        $this->pagination->initialize($config);

        $data['page'] =  $this->pagination->create_links();
        $page = intval($_GET['page']);
        $sql = "select * from extract limit $page, 2";
        $list = $this->topup_model->querySql($sql);

        foreach ($list as $key=>$value)
        {
            $id = $value['id'];
            if($value['create_time'])
            {
                $list[$key]['create_time'] = date('Y-m-d H:i');
            }

            if($value['status'] == 1)
            {
                $list[$key]['status'] = "<a href='http://localhost/onechicken/index.php/admin/ok/id/'.$id>未处理</a>";
            }
            else
            {
                $list[$key]['status'] = '已处理';
            }
        }

        $data['list'] = $list;

        $this->load->view('tixian',$data);
    }

    public function logout()
    {
        setcookie($this->_cookieUserName,'',-1);
        setcookie($this->_cookieName,'',-1);
        header('location:http://localhost/onechicken/index.php/admin/index');

    }

    public function ok()
    {
        $id = $_GET['id'];
    }
}
