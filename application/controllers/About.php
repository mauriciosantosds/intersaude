<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller {
    
    public function index(){
        $this->load->model('blog_model','modelblog');
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('html-header');
        $this->load->view('about/css');
        $page["page"] = "about";
        $this->load->view('menu', $page);
        $this->load->view('about/about');
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('about/js');
    }
}
