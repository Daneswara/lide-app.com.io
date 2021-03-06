<?php
/**
 * This <lide-app.com.io> project created by :
 * Name         : syafiq
 * Date / Time  : 11 November 2016, 10:54 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Wscontent extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        // Your own constructor code
    }

    public function index()
    {
        if (isset($_SESSION['user']))
        {
            echo json_encode(array('code' => 200, 'message' => 'Access Granted'));
        }
        else
        {
            echo json_encode(array('code' => 200, 'message' => 'Access Denied'));
        }
    }

    public function add()
    {
        if (isset($_SESSION['user']))
        {
            log_message('ERROR', var_export($_POST, true));
            $this->load->model('Mcontent', 'mcontent');
            echo json_encode(array('code' => 200, 'message' => $this->mcontent->add($_POST['add'])));
        }
        else
        {
            echo json_encode(array('code' => 200, 'message' => 'Access Denied'));
        }
    }
}