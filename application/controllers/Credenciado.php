<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Credenciado extends CI_Controller {
    
    public function index(){
        $this->load->model('blog_model','modelblog');
        $data_body['posts'] = $this->modelblog->post_list_3last();
        $this->load->view('html-header');
        $this->load->view('credenciado/css');
        $page["page"] = "credenciado";
        $this->load->view('menu', $page);
        $this->load->view('credenciado/credenciado');
        $this->load->view('footer', $data_body);
        $this->load->view('modal-access');
        $this->load->view('credenciado/js');
    }

    public function email() {
        $cpf = $this->input->post('cpf');
        $cnpj = $this->input->post('cnpj');
        $nome = $this->input->post('nome');
        $rsocial = $this->input->post('rsocial');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $cel = $this->input->post('cel');
        $cep = $this->input->post('cep');
        $logradouro = $this->input->post('logradouro');
        $numero = $this->input->post('numero');
        $complemento = $this->input->post('complemento');
        $bairro = $this->input->post('bairro');
        $cidade = $this->input->post('cidade');
        $estado = $this->input->post('estado');
        $obs = $this->input->post('obs');
        $url = $this->input->post('url');
        //var_dump($this->input->post());
        if ($url === "http://") {
            $message = "<p> Nome: ".$nome."</p><br>";
            $message .= "<p> Razão social: ".$rsocial."</p><br>";
            $message .= "<p> CPF: ".$cpf."</p><br>";
            $message .= "<p> CNPJ: ".$cnpj."</p><br>";
            $message .= "<p> E-mail: ".$email."</p><br>";
            $message .= "<p> Telefone: ".$tel."</p><br>";
            $message .= "<p> Celular: ".$cel."</p><br>";
            $message .= "<p> Cep: ".$cep."</p><br>";
            $message .= "<p> Logradouro: ".$logradouro."</p><br>";
            $message .= "<p> Numero: ".$numero."</p>";
            $message .= "<p> Complemento: ".$complemento."</p><br>";
            $message .= "<p> Bairro: ".$bairro."</p><br>";
            $message .= "<p> Cidade: ".$cidade."</p><br>";
            $message .= "<p> Estado: ".$estado."</p><br>";
            $message .= "<p> Observações: ".$obs."</p>";
            $this->load->library("email");
            $this->load->library("myconf");
            $this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
            $this->email->reply_to($email, $nome);
            $this->email->subject('Cadastro credenciado site');
            $this->email->message($message);
            $this->email->set_alt_message(strip_tags($message));
            if($this->email->send()){
                $this->load->model('blog_model','modelblog');
                $data_body['posts'] = $this->modelblog->post_list_3last();
                $this->load->view('html-header');
                $this->load->view('credenciado/css');
                $page["page"] = "credenciado";
                $data["alert"] = "E-mail enviado com sucesso";
                $this->load->view('menu', $page);
                $this->load->view('credenciado/credenciado', $data);
                $this->load->view('footer', $data_body);
                $this->load->view('modal-access');
                $this->load->view('credenciado/js');
            } else {
                log_message('error',$this->email->print_debugger());
            }
        } else {
            redirect(base_url('credenciado'));
        }
    }
}
