<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interespemedi_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function save($data){
        return $this->db->insert('interespemedi',$data);
    }

    public function find($id){
            $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
            medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
            mediform, mediemai, meditele, mediimg');
            $this->db->from('interespemedi AS iem');
            $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
            $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
            $this->db->where('intermedi_id', $id);
        return $this->db->get();
    }

    public function findAll($cidade, $espec, $limit = null, $offset = null){
        if ($limit) {
            if ($cidade==="T" and $espec==="T") {

            } else if ($cidade==="T" and $espec!="T") {

            } else if ($cidade!="T" and $espec==="T") {

            } else {
                $this->db->limit($limit, $offset);
                $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
                medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
                mediform, mediemai, meditele, mediimg');
                $this->db->from('interespemedi AS iem');
                $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
                $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
                $this->db->where('espec', $espec);
                $this->db->where('medicida', $cidade);
            }

        } else {
            if ($cidade==="T" and $espec==="T") {
                $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
                medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
                mediform, mediemai, meditele, mediimg');
                $this->db->from('interespemedi AS iem');
                $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
                $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
            } else if ($cidade==="T" and $espec!="T") {
                $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
                medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
                mediform, mediemai, meditele, mediimg');
                $this->db->from('interespemedi AS iem');
                $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
                $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
                $this->db->where('espec', $espec);

            } else if ($cidade!="T" and $espec==="T") {
                $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
                medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
                mediform, mediemai, meditele, mediimg');
                $this->db->from('interespemedi AS iem');
                $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
                $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
                $this->db->where('medicida', $cidade);
            } else {
                $this->db->select('interespe_id, intermedi_id, espec, medinome, medicrm, 
                medicep, medinume, mediuf, medicida, medimaps, medicli, medihora, 
                mediform, mediemai, meditele, mediimg');
                $this->db->from('interespemedi AS iem');
                $this->db->join('interespe AS e', 'iem.interespe_id = e.id');
                $this->db->join('intermedi AS im', 'im.id = iem.intermedi_id');
                $this->db->where('medicida', $cidade);
                $this->db->where('espec', $espec);
            }
        }
        return $this->db->get();
    }

    public function allMediEspe($limit = null, $offset = null) {
        if ($limit) {
            $this->db->limit($limit, $offset);
            $this->db->select('espec, medinome, mediimg, medimaps');
            $this->db->from('interespemedi as iem');
            $this->db->join('interespe as ie', 'ie.id = iem.interespe_id');
            $this->db->join('intermedi as im', 'im.id = iem.intermedi_id');
            return $this->db->get();
        } else {
            $this->db->select('espec, medinome, mediimg, medimaps');
            $this->db->from('interespemedi as iem');
            $this->db->join('interespe as ie', 'ie.id = iem.interespe_id');
            $this->db->join('intermedi as im', 'im.id = iem.intermedi_id');
            return count($this->db->get()->result());
        }
        return false;
    }

    public function update($data, $idespec){
        $this->db->where('id', $data["id"]);
        if ($this->db->update('intermedi', $data)){
            $this->db->where('intermedi_id', $data["id"]);
            $this->db->set('interespe_id', $idespec);
            return $this->db->update('interespemedi');
        }
    }

    public function delete($id) {
        $this->db->where('intermedi_id', $id);
        if ($this->db->delete('interespemedi')){
            $this->db->where('id', $id);
            return $this->db->delete('intermedi');
        }

    }

    public function findEspeMedi($id, $limit = null, $offset = null){
        if ($limit) {
            $this->db->limit($limit, $offset);
            $this->db->select('interespe_id, espec, medinome, medicrm, medicep, 
            mediende, medinume, mediuf, medicida, medimaps, medicli, medibair,
            mediform, medihora, mediemai, meditele');
            $this->db->from('interespemedi as iem');
            $this->db->join('interespe as ie', 'ie.id = iem.interespe_id');
            $this->db->join('intermedi as im', 'im.id = iem.intermedi_id');
            $this->db->where('ie.id', $id);
            return $this->db->get();
        } else {
            $this->db->select('interespe_id, espec, medinome, medicrm, medicep, 
            mediende, medinume, mediuf, medicida, medimaps, medicli, medibair,
            mediform, medihora, mediemai, meditele');
            $this->db->from('interespemedi as iem');
            $this->db->join('interespe as ie', 'ie.id = iem.interespe_id');
            $this->db->join('intermedi as im', 'im.id = iem.intermedi_id');
            $this->db->where('ie.id', $id);
            return $this->db->get();
        }
        return false;
    }
}