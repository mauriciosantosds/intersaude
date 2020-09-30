<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Intermedi_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function save($data){
        if ($this->db->insert('intermedi',$data)){
            return $this->db->insert_id();
        }
        return 0;
    }

    public function find($id) {
        $this->db->where('id', $id);
        return $this->db->get('intermedi');
    }

    public function findAll(){
        return $this->db->get('interespe');
    }

    public function cidades() {
        $this->db->select('medicida');
        $this->db->group_by("medicida");
        $this->db->order_by("medicida", "ASC");
        return $this->db->get('intermedi');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('interespe');
    }

    public function listar_produtos_categoria($id){
        $dados['detalhes'] = $this->detalhes_categoria($id);
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->join('produtos_categorias','produtos_categorias.produto = produtos.id AND produtos_categorias.categoria = '.$id);
        $dados['produtos'] = $this->db->get()->result();
        return $dados;
    }
}