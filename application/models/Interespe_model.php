<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interespe_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function save($data){
        if(empty($data["id"])) {
            return $this->db->insert('interespe',$data);
        } else {
            $this->db->where('id', $data["id"]);
            return $this->db->update('interespe', $data);
        }
    }

    public function find($id) {
        $this->db->where("id",$id);
        return $this->db->get('interespe');
    }

    public function findAll($limit = null, $offset = null){
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by("espec", "ASC");
        return $this->db->get('interespe');
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