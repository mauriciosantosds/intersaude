<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect(base_url('login'));
		} else if ($this->session->userdata('userlogin') === "consultacadastro") {
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
	}
	public function index(){
		$this->list_cliente();
	}

	public function espec() {
		$data["page"] = "vespec";
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-espec');
		$this->load->view('dash/footer');
	}

	public function medico($alert = '') {
		if (!empty($alert)) {
			$data["alert"] = $alert;
		}
		$data["page"] = "vmedi";
		$this->load->model('interespe_model');
		$data["especs"] = $this->interespe_model->findAll()->result();
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-medico', $data);
		$this->load->view('dash/footer');
		$this->load->view('dash/form-medico-js.php');
	}

	public function cliente() {
		if (!empty($alert)) {
			$data["alert"] = $alert;
		}
		$data["page"] = "vcli";
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-cliente');
		$this->load->view('dash/footer');
		$this->load->view('dash/form-cliente-js');
	}

	public function register_cliente() {
		$this->load->model('interclien_model');
		$date = DateTime::createFromFormat('d/m/Y', $this->input->post('dtnasc'));
		$dtnasc = $date->format('Y-m-d');
		$cel = preg_replace("/[^0-9]/", "", $this->input->post("cel"));
		$tel = preg_replace("/[^0-9]/", "", $this->input->post("tel"));
		$id = $this->input->post('id');
		if (!empty($id)) {
			$data["id"] = $this->input->post('id');
		}
		$data['cliencpf'] = $this->input->post('cpf');
		$data['cliendtnasc'] = $dtnasc;
		$data['cliensexo'] = $this->input->post('sexo');
		$data['cliennome'] = $this->input->post('nome');
		$data['clienemail'] = $this->input->post('email');
		$data['cliencelu'] = $cel;
		$data['clientele'] = $tel;
		$data['cliencep'] = $this->input->post('cep');
		$data['clienende'] = $this->input->post('ende');
		$data['cliennume'] = $this->input->post('numero');
		$data['cliencomp'] = $this->input->post('comp');
		$data['clienbair'] = $this->input->post('bairro');
		$data['cliendepe'] = $this->input->post('deps');
		$data['clienstat'] = $this->input->post('status');
		$data['clienesta'] = $this->input->post('uf');
		$data['cliencida'] = $this->input->post('cidade');
		if ($this->interclien_model->save($data)) {
			$this->session->set_flashdata('alert','Cliente cadastrado / alterado.');
			if(!empty($id)) {
				$this->update_clien($data["id"]);
			} else {
				$this->cliente();
			}
		}
	}

	public function register_espe() {
		$this->load->model('interespe_model');
		$data = array(
			'espec' => $this->input->post('espe'),
			'id' => $this->input->post('id')
    	);
		if ($this->interespe_model->save($data)) {
			$data2["page"] = "vespec";
			$data2['alert'] = "Especialidade cadastrada / alterada!";
			$this->load->view('dash/principal', $data2);
			$this->load->view('dash/form-espec', $data2);
			$this->load->view('dash/footer');
		}
	}

	public function register_medi() {
		$this->load->model('intermedi_model');
		$this->load->model('interespemedi_model');
		$idespe = $this->input->post('idespe');
		reset ($_FILES);
		$temp = current($_FILES);
		if (is_uploaded_file($temp['tmp_name'])){
			$image = new CoffeeCode\Uploader\Image("assets/images", "uploads");
			$upload = $image->upload($temp, time());
			if (!empty($upload)) {
				$data = array(
					'medinome' => $this->input->post('medinome'),
					'medimaps' => $this->input->post('medimaps'),
					'mediuf'   => $this->input->post('mediuf'),
					'medicida' => $this->input->post('medicida'),
					'mediimg'  => $upload
				);
		
				$idintermedi = $this->intermedi_model->save($data);
				if ($idintermedi > 0) {
					$data = array(
						'interespe_id' => $idespe,
						'intermedi_id' => $idintermedi
					);
					$this->interespemedi_model->save($data);
					$this->medico("Medico cadastrado!");
				}
			}
		} else {
			var_dump($temp);
		}
	}

	public function list_espec() {
		$data["page"] = "vespec";
		$this->load->model('interespe_model');
		$especs = $this->interespe_model->findAll()->result();
		$data["especs"] = $especs;
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/table-espec', $data);
		$this->load->view('dash/footer');
		$this->load->view('dash/table-espec-js');
				
	}

	public function list_medi() {
		$data["page"] = "vmedi";
		$this->load->model('interespe_model');
		$this->load->model('intermedi_model');
		$data["cidades"] = $this->intermedi_model->cidades()->result();
		$especs = $this->interespe_model->findAll()->result();
		$data["especs"] = $especs;
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/table-medi', $data);
		$this->load->view('dash/footer');		
		$this->load->view('dash/table-medi-js');		
	}

	public function list_cliente() {
		$data["page"] = "vcli";
		$this->load->model('interclien_model');
		$this->load->library('formatphone');
		$pesquisa = $this->input->post('pesquisa');
		$pesquisacpf = $this->input->post('pesquisacpf');
		if (!empty($pesquisa) and empty($pesquisacpf)) {
			$data["clientes"] = $this->interclien_model->findAll(null,null,$pesquisa,"")->result();	
		} else if (empty($pesquisa) and !empty($pesquisacpf)) {
			$data["clientes"] = $this->interclien_model->findAll(null,null,"",$pesquisacpf)->result();
		} else if (!empty($pesquisa and !empty($pesquisacpf))) {
			$data["clientes"] = $this->interclien_model->findAll(null,null,$pesquisa,$pesquisacpf)->result();
		} else {
			$data["clientes"] = $this->interclien_model->findAll()->result();
		}
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/table-cliente', $data);
		$this->load->view('dash/footer');		
		$this->load->view('dash/table-cliente-js');		
	}

	public function list_medi_p_espec() {
		$data["page"] = "vmedi";
		$this->load->model('interespe_model');
		$this->load->model('interespemedi_model');
		$this->load->model('intermedi_model');
		$especs = $this->interespe_model->findAll()->result();
		$data["cidades"] = $this->intermedi_model->cidades()->result();
		$data["especs"] = $especs;
		$espec = $this->input->post("espec");
		$cidade = $this->input->post("cidade");
		$data["medicos"] = $this->interespemedi_model->findAll($cidade, $espec)->result();
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/table-medi', $data);
		$this->load->view('dash/footer');	
	}

	public function remove_espe($id) {
		$this->load->model('interespe_model');
		if ($this->interespe_model->delete($id)) {
			$this->session->set_flashdata('alert','Especialidade removida.');
			$this->list_espec();
		}
	}

	public function update_espe($id) {
		$this->load->model('interespe_model');
		$data["espec"] = $this->interespe_model->find($id)->result()[0];
		$data["page"] = "vespec";
		$data["id"] = $id;
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-espec', $data);
		$this->load->view('dash/footer');
	}

	public function update_medi($id) {
		$this->load->model('interespemedi_model');
		$this->load->model('interespe_model');
		$data["especs"] = $this->interespe_model->findAll()->result();
		$data["medico"] = $this->interespemedi_model->find($id)->result()[0];
		$data["page"] = "vmedi";
		$data["id"] = $id;
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-medico-up', $data);
		$this->load->view('dash/footer');
		$this->load->view('dash/form-medico-js.php');
	}

	public function update_medi_r() {
		$this->load->model('interespemedi_model');
		//$this->input->post('id');
		reset ($_FILES);
		$temp = current($_FILES);
		$data = array();
		$data["id"] = $this->input->post('id');
		$data['medinome'] = $this->input->post('medinome');
		$data['medimaps'] = $this->input->post('medimaps');
		$data['mediuf'] = $this->input->post('mediuf');
		$data['medicida'] = $this->input->post('medicida');
		if (is_uploaded_file($temp['tmp_name'])){
			$image = new CoffeeCode\Uploader\Image("assets/images", "uploads");
			$upload = $image->upload($temp, time());
			$data['mediimg'] = $upload;
		}
		$idespec = $this->input->post('idespe');
		if($this->interespemedi_model->update($data, $idespec)){
			$this->session->set_flashdata('alert','Médico cadastrado / alterado.');
			$this->update_medi($data["id"]);
		}
	}

	public function update_clien($id) {
		$this->load->model('interclien_model');
		$data["page"] = "vcli";
		$data["id"] = $id;
		$cliente = $this->interclien_model->find($id)->result()[0];
		$date = DateTime::createFromFormat('Y-m-d', $cliente->cliendtnasc);
		$dtnasc = $date->format('d/m/Y');
		$cliente->cliendtnasc = $dtnasc;
		$data["cliente"] = $cliente;
		$this->load->view('dash/principal', $data);
		$this->load->view('dash/form-cliente', $data);
		$this->load->view('dash/footer');
		$this->load->view('dash/form-cliente-js.php');
	}

	public function remove_medi($id) {
		$this->load->model('interespemedi_model');
		$this->load->model('intermedi_model');
		$img = $this->intermedi_model->find($id)->result()[0]->mediimg;
		@unlink($img);
		$this->interespemedi_model->delete($id);
		$this->session->set_flashdata('alert','Médico removido.');
		$this->list_medi();
	}

	public function remove_clien($id) {
		$this->load->model('interclien_model');
		if($this->interclien_model->delete($id)){
			$this->session->set_flashdata('alert','Cliente removido.');
			$this->list_cliente();
		}
	}

}
