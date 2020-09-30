<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Department extends CI_Controller {
    
    public function index(){
        $this->load->model('interespemedi_model');
        $this->load->model('intermedi_model');
        $this->load->model('interespe_model');
        $this->load->library('pagination');
        $page["page"] = "department";
        $numrows = $this->interespemedi_model->allMediEspe();
        $config = array(
            "base_url" =>  base_url('dep/d'),
            "per_page" => 4,
            "num_links" => 4,
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
        $data["especs"] = $this->interespemedi_model->allMediEspe($config["per_page"], $offset)->result(); 
        $data["pagination"] = $this->pagination->create_links();
        $this->load->model('blog_model','modelblog');
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $data["cidades"] = $this->intermedi_model->cidades()->result();
        $data["especscombo"] = $this->interespe_model->findAll()->result();
        $this->load->view('html-header');
        $this->load->view('department/css');
        $this->load->view('menu', $page);
        $this->load->view('department/department', $data);
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('department/js');
    }

    public function search() {
        $cidade = "";
        $espec = "";
        if (!empty($this->input->post("cidade"))) {
            $cidade = $this->input->post("cidade");
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION['cidade'] = $cidade;
        } else {
            if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
                session_start();
            }
            $cidade = $_SESSION['cidade'];
        }

        if (!empty($this->input->post("espec"))) {
            $espec = $this->input->post("espec");
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION["espec"] = $espec;
        } else {
            if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
                session_start();
            }
            $espec = $_SESSION["espec"];
        }
        $this->load->model('interespemedi_model');
        $this->load->model('intermedi_model');
        $this->load->model('interespe_model');
        $this->load->library('pagination');
        $page["page"] = "department";
        $numrows = $this->interespemedi_model->findAll($cidade, $espec)->num_rows();
        $config = array(
            "base_url" =>  base_url('deps/d'),
            "per_page" => 4,
            "num_links" => 4,
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
        $data["especs"] = $this->interespemedi_model->findAll($cidade, $espec, $config["per_page"], $offset)->result();
        $data["pagination"] = $this->pagination->create_links();
        $this->load->model('blog_model','modelblog');
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $data["cidades"] = $this->intermedi_model->cidades()->result();
        $data["especscombo"] = $this->interespe_model->findAll()->result();
        $this->load->view('html-header');
        $this->load->view('department/css');
        $this->load->view('menu', $page);
        $this->load->view('department/department', $data);
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('department/js');
    }
}
