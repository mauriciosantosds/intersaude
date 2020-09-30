<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('blog_model','modelblog');
    }
    
    public function index(){
        $dataview["page"] = "blog";
        $this->load->library('pagination');
        $numrows = $this->modelblog->countAll();
        $config = array(
            "base_url" =>  base_url('posts/p'),
            "per_page" => 6,
            "num_links" => 6,
            "total_rows" => $numrows,
            "full_tag_open" => "<ul>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => '<i class="ion-ios-arrow-back"></i>',
            "prev_tag_open" => '<li></a>',
			"prev_tag_close" => "</li>",
            "next_link" => '<i class="ion-ios-arrow-forward"></i>',
            "next_tag_open" => '<li>',
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $offset = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
        $dataview["post"] = $this->modelblog->post_list($config["per_page"], $offset);
        $dataview["numrows"] = $numrows;
        $dataview["pagination"] = $this->pagination->create_links();
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('html-header');
        $this->load->view('blog/css');
        $this->load->view('menu', $dataview);
        $this->load->view('blog/blog',$dataview);
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('blog/js');
    }

    public function read_post($id) {
        $dataview["page"] = "blog";
        $this->load->view('html-header');
        $this->load->view('blog/css');
        $this->load->view('menu', $dataview);
        $dataview["post"] = $this->modelblog->post_list_single($id)[0];
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('blog/blog-single', $dataview);
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('blog/js');
    }
}
