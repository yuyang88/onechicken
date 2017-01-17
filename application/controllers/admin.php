<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


    private $_cookieName = 'aid';
    private $_cookieTime = 7200;
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
                setcookie('email',$userInfo['email'],time()+$this->_cookieTime);
                header('location:http://localhost/onechicken/index.php/admin/ok');
            }
        }


        if($_COOKIE[$this->_cookieName])
        {
            header('location:http://localhost/onechicken/index.php/admin/ok?cookie='.$_COOKIE[$this->_cookieName]);exit;

        }



        $this->load->view('admin_login');
    }

    public function show()
    {
        $this->load->view('tixian');
        $this->load->view('admin_login');
    }

    public function user()
    {
        $data['list'] = [];
        $this->load->view('admin_user');
    }

    public function tixian()
    {
        $data['list'] = [];
        $this->load->view('tixian');
    }

    public function ok()
    {
        echo 22;die;
    }
}
