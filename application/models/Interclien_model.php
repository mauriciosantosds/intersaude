<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interclien_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function save($data){
        if(empty($data["id"])) {
            return $this->db->insert('interclien',$data);
        } else {
            $this->db->where('id', $data["id"]);
            return $this->db->update('interclien', $data);
        }
    }

    public function find($id) {
        $this->db->where("id",$id);
        return $this->db->get('interclien');
    }

    public function findAll($limit = null, $offset = null, $nome = "", $cpf = ""){
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        if (!empty($nome) and empty($cpf)) {
            $this->db->like('cliennome', $nome,'after');
        } else if (!empty($cpf) and empty($nome)) {
            $this->db->like('cliencpf', $cpf,'after');
        } else if (!empty($cpf) and !empty($nome)) {
            $this->db->like('cliencpf', $cpf,'after');
            $this->db->like('cliennome', $nome,'after');
        }
        $this->db->order_by("cliennome", "ASC");
        return $this->db->get('interclien');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('interclien');
    }
}