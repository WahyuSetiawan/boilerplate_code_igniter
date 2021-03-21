<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function index()
    {

        $this->blade->view("index");
    }
}

/* End of file Controllername.php */
