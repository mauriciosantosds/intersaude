<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consultacadastro extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect(base_url('login'));
		}
    }
    
    public function index() {
			$data["page"] = "ccadastro";
			$this->load->view('dash/principal', $data);
			$this->load->view('dash/form-consulta');
			$this->load->view('dash/footer');
			$this->load->view('dash/consulta-js');
		}

		public function enviar_artigo() {
			$message = $this->input->post("art");
			$this->load->library("email");
			$this->load->library("myconf");
			$this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->subject('Sugestão artigo');
			$this->email->message($message);
			$arquivo = isset($_FILES["arqart"]) ? $_FILES["arqart"] : FALSE;
			$path = $arquivo["tmp_name"];
			$filetype = $arquivo["type"];
			$name = $arquivo["name"];
			if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){	
				$this->email->attach($path, 'attachment', $name);
			}
			if($this->email->send()){
				$this->session->set_flashdata('alert','Artigo enviado.');
				$this->index();
			} else {
				log_message('error',$this->email->print_debugger());
			}
		}
		public function enviar_duvida() {
			$message = $this->input->post("duvi");
			$this->load->library("email");
			$this->load->library("myconf");
			$this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->subject('Dúvidas, sugestões ou reclamações painel clínicas');
			$this->email->message($message);
			
			if($this->email->send()){
				$this->session->set_flashdata('alert','Dúvida enviada.');
				$this->index();
			} else {
				log_message('error',$this->email->print_debugger());
			}
		}

		public function consultar($id) {
			$this->load->model('interclien_model');
			$data["cliente"] = $this->interclien_model->find($id)->result()[0];
			$data["page"] = "ccadastro";
			$this->load->view('dash/principal', $data);
			$this->load->view('dash/form-consulta', $data);
			$this->load->view('dash/footer');
			$this->load->view('dash/consulta-js.php');
		}

		public function pesqclien() {
			$this->load->model('interclien_model');
			$pesquisa = $this->input->post('clien');
			if ($this->interclien_model->findAll(null,null,$pesquisa,"")->num_rows() >= 1){
				$data["clientes"] = $this->interclien_model->findAll(null,null,$pesquisa,"")->result();	
			} else {
				$data["clientes"] = $this->interclien_model->findAll(null,null,"",$pesquisa)->result();
			}
			if(!empty($data["clientes"])){
				$clientes = $data["clientes"];
					foreach($clientes as $c) {
						echo "<a href='".base_url('consultacadastro/consultar/'.$c->id)."'>". $c->cliennome ."</a><br>";
					}
			}  else {
					echo "vazio";
				}
		}

		public function pesqcpf() {
			$this->load->model('interclien_model');
			$pesquisa = $this->input->post('cpf');
			$data["clientes"] = $this->interclien_model->findAll(null,null,"",$pesquisa)->result();	
			if(!empty($data["clientes"])){
				$clientes = $data["clientes"];
					foreach($clientes as $c) {
						echo "<a href='".base_url('consultacadastro/consultar/'.$c->id)."'>". $c->cliennome ."</a><br>";
					}
			}  else {
					echo "vazio";
				}
		}
}