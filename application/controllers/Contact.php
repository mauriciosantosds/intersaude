<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller {
    
    public function index(){
        $this->load->model('blog_model','modelblog');
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('html-header');
        $this->load->view('contact/css');
        $page["page"] = "contact";
        $this->load->view('menu', $page);
        $this->load->view('contact/contact');
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('contact/js');
    }

    public function enviar_email() {
        $nome = $this->input->post("nome");
        $assunto = $this->input->post("assunto");
        $email = $this->input->post("email");
        $mensagem = $this->input->post("mensagem");
        $url = $this->input->post("url");
        if ($url === "https://") {
            $message = "<p> Nome: ".$nome."</p>";
            $message .= "<p> E-mail: ".$email."</p><br>";
            $message .= "<p> Mensagem: ".$mensagem."</p>";
            $this->load->library("email");
            $this->load->library("myconf");
            $this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->reply_to($email, $nome);
            $this->email->subject($assunto);
            $this->email->message($message);
            if($this->email->send()){
                echo "200";
            } else {
                log_message('error',$this->email->print_debugger());
            }
        }
    }
}
