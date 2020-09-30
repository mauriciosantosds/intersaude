<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->db = $this->load->database('wp', TRUE);
    }
    public function post_list($limit = null, $offset = null) {
        if ($limit) {
            $this->db->limit($limit, $offset);
            $this->db->select('p.id, p.post_date, p.post_content, p.post_title, u.display_name')->from('wp_posts as p');
            $this->db->join('wp_users as u','u.id = p.post_author');
            $this->db->where('p.post_type', "post");
            $this->db->where('p.post_status', "publish");
            $pdata = $this->db->get()->result();
            $posts = Array();        
            foreach ($pdata as $pd) {
                $data = new stdClass;
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data->id = $pd->id;
                $data->day = strftime('%d', strtotime($pd->post_date));
                $data->month = ucfirst(strftime('%B', strtotime($pd->post_date)));
                $data->year = strftime('%G', strtotime($pd->post_date));
                $data->post_content = $pd->post_content;
                $data->post_title = $pd->post_title;
                $data->display_name = $pd->display_name;
                $data->abstract = $this->abstract($pd->post_content, 100);
                //echo $pd->id;
                if ($this->find_thumb($pd->id)) {
                    $data->thumb = $this->find_thumb($pd->id);
                } else {
                    $data->thumb = "";
                }
                array_push($posts, $data);
            }
            return $posts;
        }
    }

    public function post_list_3last($limit = 3) {
        if ($limit) {
            $this->db->limit($limit);
            $this->db->select('p.id, p.post_date, p.post_content, p.post_title, u.display_name')->from('wp_posts as p');
            $this->db->join('wp_users as u','u.id = p.post_author');
            $this->db->where('p.post_type', "post");
            $this->db->where('p.post_status', "publish");
            $this->db->order_by("post_date","DESC");
            $pdata = $this->db->get()->result();
            $posts = Array();        
            foreach ($pdata as $pd) {
                $data = new stdClass;
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data->id = $pd->id;
                $data->day = strftime('%d', strtotime($pd->post_date));
                $data->month = ucfirst(strftime('%B', strtotime($pd->post_date)));
                $data->year = strftime('%G', strtotime($pd->post_date));
                $data->post_content = $pd->post_content;
                $data->post_title = $pd->post_title;
                $data->display_name = $pd->display_name;
                $data->abstract = $this->abstract($pd->post_content, 100);
                //echo $pd->id;
                if ($this->find_thumb($pd->id)) {
                    $data->thumb = $this->find_thumb($pd->id);
                } else {
                    $data->thumb = "";
                }
                array_push($posts, $data);
            }
            return $posts;
        }
    }

    public function post_list_single($id) {
            $this->db->select('p.id, p.post_date, p.post_content, p.post_title, u.display_name, u.id as userid')->from('wp_posts as p');
            $this->db->join('wp_users as u','u.id = p.post_author');
            $this->db->where('p.post_type', "post");
            $this->db->where('p.post_status', "publish");
            $this->db->where('p.id', $id);
            $pdata = $this->db->get()->result();
            $posts = Array();        
            foreach ($pdata as $pd) {
                $data = new stdClass;
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $data->day = strftime('%d', strtotime($pd->post_date));
                $data->month = ucfirst(strftime('%B', strtotime($pd->post_date)));
                $data->year = strftime('%G', strtotime($pd->post_date));
                $data->post_content = $pd->post_content;
                $data->post_title = $pd->post_title;
                $data->display_name = $pd->display_name;
                $data->abstract = $this->abstract($pd->post_content, 100);
                if($this->find_terms($id)) {
                    $data->terms = $this->find_terms($id);
                }
                if ($this->find_thumb($pd->id)) {
                    $data->thumb = $this->find_thumb($pd->id);
                } else {
                    $data->thumb = "";
                }
                if ($this->find_bio($pd->userid)) {
                    $data->user_desc = $this->find_bio($pd->userid);
                }
                array_push($posts, $data);
            }
            return $posts;
    }

    public function countAll() {
        $this->db->select('p.id, p.post_date, p.post_content, p.post_title, u.display_name')->from('wp_posts as p');
        $this->db->join('wp_users as u','u.id = p.post_author');
        $this->db->where('p.post_type', "post");
        $this->db->where('p.post_status', "publish");
        $pdata = $this->db->get()->result();
        return count($pdata);
    }

    public function find_thumb($id){
        $this->db->select('meta_value')->from("wp_postmeta");
        $this->db->where('meta_key',"_thumbnail_id");
        $this->db->where('post_id',$id);
        $query = $this->db->get();
        if($this->db->count_all_results() > 0) {
            $idthumb = $query->row_array()['meta_value'];
            $this->db->select('guid')->from('wp_posts');
            $this->db->where('id', $idthumb);
            $query = $this->db->get();
            return $query->row_array()['guid'];
        }

        return false;
        
    }

    public function find_bio($id) {
        $this->db->select('um.meta_value')->from("wp_users as u");
        $this->db->join('wp_usermeta as um', "um.user_id = u.id");
        $this->db->where('um.meta_key','description');
        $this->db->where('u.id',$id);
        $query = $this->db->get();
        if($this->db->count_all_results() > 0) {
            return $query->row_array()['meta_value'];
        }

        return false;
    }

    public function find_terms($id) {
        $this->db->select("wt.name")->from("wp_term_relationships as tr");
        $this->db->join("wp_terms as wt","wt.term_id = tr.term_taxonomy_id");
        $this->db->where("tr.object_id", $id);
        $this->db->group_by("wt.name");
        $query = $this->db->get();
        if($this->db->count_all_results() > 0) {
           return $query->result();
        }
    }

    public function autor($id){
        $this->db->select('*');
        $this->db->from('produtos');
        
        $dados['produtos'] = $this->db->get()->result();
        return $dados;
    }

    private function abstract($string,$chars) { 
        $string = strip_tags($string); 
        if (strlen($string) > $chars) { 
        while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))) { 
            $chars++; }; 
        }; 
        return substr($string,0,$chars) . '...'; 
    }
}