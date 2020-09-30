<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('blog_model','modelblog');
    }
    public function index(){
        $page['page'] = "home";
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('html-header');
        $this->load->view('home/css');
        $this->load->view('menu',$page);
        $this->load->view('home/home',$data_body);
        $this->load->view('footer',$data_body);
        $this->load->view('modal-access');
        $this->load->view('home/js');
    }

    public function cadastro_associado() {
        $nome = $this->input->post("nome");
        $snome = $this->input->post("snome");
        $sexo = $this->input->post("sexo");
        $tel = $this->input->post("tel");
        $obs = $this->input->post("obs");
        $email = $this->input->post("email");
        $url = $this->input->post("url");
        if ($url === "https://") {
            $message = "<p> Nome: ".$nome." ".$snome."</p><br>";
            $message .= "<p> Sexo: ".$sexo."</p><br>";
            $message .= "<p> Telefone: ".$tel."</p><br>";
            $message .= "<p> Observação: ".$obs."</p>";
            $message .= "<p> E-mail: ".$email."</p>";
            $this->load->library("email");
            $this->load->library("myconf");
            $this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->reply_to($email, $nome);
            $this->email->subject('Pré-cadastro associado');
            $this->email->message($message);
            if($this->email->send()){
                $page['page'] = "home";
                $data_body['posts'] = $this->modelblog->post_list_3last();
                $data_body['alert'] = "Recebemos sua solicitação.";
                $this->load->view('html-header');
                $this->load->view('home/css');
                $this->load->view('menu',$page);
                $this->load->view('home/home',$data_body);
                $this->load->view('footer',$data_body);
                $this->load->view('modal-access');
                $this->load->view('home/js');
            } else {
                log_message('error',$this->email->print_debugger());
            }
        }
    }

    public function newsletter() {
        $email = $this->input->post("email");
        $url = $this->input->post("url");
        if ($url === "https://") {
            $message = "<p>O visitantente com E-mail: ".$email." demonstrou interesse na newsletter.</p>";
            $this->load->library("email");
            $this->load->library("myconf");
            $this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->reply_to($email, $email);
            $this->email->subject('Newssletter site');
            $this->email->message($message);
            if($this->email->send()){
                echo 200;
            } else {
                log_message('error',$this->email->print_debugger());
            }
        }
    }
}
