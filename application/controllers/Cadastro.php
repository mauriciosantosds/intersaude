<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadastro extends CI_Controller {
    private $categorias;
    public function __construct(){
        parent::__construct();
        $this->load->model('categorias_model','modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }
    public function index(){
        $data_header['categorias'] = $this->categorias;
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('novo_cadastro');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }

    public function adicionar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Nome','required|min_length[5]');
        $this->form_validation->set_rules('sobrenome','Sobrenome','required|min_length[5]');
        $this->form_validation->set_rules('rg','Rg','required|min_length[8]');
        $this->form_validation->set_rules('cpf','CPF','required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('data_nascimento','Data de nascimento','required|min_length[10]');
        $this->form_validation->set_rules('sexo','Sexo','required|min_length[1]|max_length[1]');
        $this->form_validation->set_rules('cep','CEP','required|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[clientes.email]');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }  else {
            $dados['nome'] = $this->input->post('nome');
            $dados['sobrenome'] = $this->input->post('sobrenome');
            $dados['rg'] = $this->input->post('rg');
            $dados['cpf'] = $this->input->post('cpf');
            $dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
            $dados['sexo'] = $this->input->post('sexo');
            $dados['cep'] = $this->input->post('cep');
            $dados['rua'] = $this->input->post('rua');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['numero'] = $this->input->post('numero');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['celular'] = $this->input->post('celular');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = password_hash($this->input->post('senha'),PASSWORD_DEFAULT);
            if($this->db->insert('clientes',$dados)){
                $this->enviar_email_confirmacao($dados);
            } else {
                echo "Houve um erro ao processar seu cadastro";
            } 
        }
    }

    public function enviar_email_confirmacao($dados){
        $mensagem = $this->load->view('emails/confirmar_cadastro.php',$dados,TRUE);
        $this->load->library('email');
        $this->email->from("loja@TheGroceryStoreBrazil","The Grocery Store Brazil");
        $this->email->to($dados['email']);
        $this->email->subject('The Grocery Store Brazil - Confirmação de cadastro');
        $this->email->message($mensagem);
        if($this->email->send()){
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header',$data_header);
            $this->load->view('cadastro_enviado');
            $this->load->view('footer');
            $this->load->view('html-footer');
        } else {
            print_r($this->email->print_debugger());
        }
    }

    public function confirmar($hashEmail){
        $dados['status'] = 1;
        $this->db->where('md5(email)',$hashEmail);
        if($this->db->update('clientes',$dados)) {
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header',$data_header);
            $this->load->view('cadastro_liberado');
            $this->load->view('footer');
            $this->load->view('html-footer');
        } else {
            echo "Houve um erro ao confirmar seu cadastro";
        }
    }

    public function form_login(){
        $data_header['categorias'] = $this->categorias;
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('login');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','E-mail','required|valid_email');
        $this->form_validation->set_rules('senha','Senha','required|min_length[5]');
        if($this->form_validation->run() == FALSE){
            $this->form_login();
        } else {
            $this->db->where('email',$this->input->post('email'));
            $this->db->where('status',1);
            $cliente = $this->db->get('clientes')->result();
            if(password_verify($this->input->post('senha'),$cliente[0]->senha)){
                $dadosSessao['cliente'] = $cliente[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                var_dump($dadosSessao);
                redirect(base_url("produtos"));
            } else {
                $dadosSessao['cliente'] = NULL;
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url("login"));
            }
        }
    }

    public function logout() {
        $dadosSessao['cliente'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url("login"));
	}
	
	public function esqueci_minha_senha(){
		$data_header['categorias'] = $this->categorias;
		$this->load->view('html-header');
		$this->load->view('header',$data_header);
		$this->load->view('form_recupera_login');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}

	public function recuperar_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','E-mail','required|valid_email');
		$this->form_validation->set_rules('cpf','Senha','required|min_length[5]');
		if($this->form_validation->run() == FALSE){
			$this->esqueci_minha_senha();
		} else {
			$this->db->where('email',$this->input->post('email'));
			$this->db->where('cpf',$this->input->post('cpf'));
			$this->db->where('status',1);
			$cliente = $this->db->get('clientes')->result();
			if(count($cliente)==1){
				//gera novo hash com senha 12345678
				$senhaHash = password_hash("123456789", PASSWORD_DEFAULT);
				$senha = array('senha'=>$senhaHash);
				$this->db->where('id',$cliente[0]->id);
				$this->db->update('clientes', $senha);
				$this->db->where('email',$this->input->post('email'));
				$this->db->where('cpf',$this->input->post('cpf'));
				$this->db->where('status',1);
				$cliente = $this->db->get('clientes')->result();
				$cliente[0]->senha = "123456789";
				$dados = $cliente[0];
				$mensagem = $this->load->view('emails/recuperar_senha.php',$dados,TRUE);
				$this->load->library('email');
				$this->email->from("loja@TheGroceryStoreBrazil","The Grocery Store Brazil");
				$this->email->to($dados->email);
				$this->email->subject('The Grocery Store Brazil - Recuperação de cadastro');
				$this->email->message($mensagem);
				if($this->email->send()){
					$data_header['categorias'] = $this->categorias;
					$this->load->view('html-header');
					$this->load->view('header',$data_header);
					$this->load->view('senha_enviada');
					$this->load->view('footer');
					$this->load->view('html-footer');
				} else {
					print_r($this->email->print_debugger());
				} 
			} else {
				redirect(base_url("esqueci-minha-senha"));
			}
		}
	}

	public function alterar_cadastro($id) {
		if(null != $this->session->userdata('logado')){
			$this->db->where('md5(id)',$id);
			$this->db->where('id', $this->session->userdata('cliente')->id);
			echo $this->session->userdata('cliente')->cpf;
			//$this->db->where('cpf', $this->session->userdata('cliente')->cpf);
			$this->db->where('status',1);
			$data_body['cliente'] = $this->db->get('clientes')->result();
			if(count($data_body['cliente'])==1){
				$data_header['categorias'] = $this->categorias;
				$this->load->view('html-header');
				$this->load->view('header',$data_header);
				$this->load->view('alterar_cadastro',$data_body);
				$this->load->view('footer');
				$this->load->view('html-footer');
			} else {
				redirect(base_url("login"));
			}
		}else {
			redirect(base_url("login"));
		}
	}
}
