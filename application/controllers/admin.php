<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    private $_cookieName = 'admin';
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
            var_dump($_POST);die;
            ajaxReturn(['status'=>1,'info'=>'成功'],'json');
            set_cookie($this->_cookieName,1,time()+$this->_cookieTime);
            /*array(3) { ["email"]=> string(2) "11" ["pwd"]=> string(2) "11" ["op_type"]=> string(1) "1" }*/
        }


        if($_COOKIE[$this->_cookieName])
        {
            header('location:http://localhost/onechicken/index.php/admin/ok');exit;

        }



        $this->load->view('admin_login');
    }

    public function show()
    {
        $this->load->view('tixian');
    }
}
