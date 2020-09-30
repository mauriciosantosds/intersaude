<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Planos extends CI_Controller {
    
    public function index(){

        $this->load->view('html-header');
        $this->load->view('planos/css');
        $page["page"] = "planos";
        $this->load->view('menu', $page);
        $this->load->view('planos/planos');
        $this->load->view('planos/js');
        $this->load->view('footer');
    }
}
