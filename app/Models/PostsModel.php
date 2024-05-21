<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = "posts";
    protected $primaryKey = "post_id";
    protected $allowedFields = ['username', 'post_title', 'post_title_seo', 'post_type', 'post_status', 'post_thumbnail', 'post_description', 'post_content', 'post_time'];

    public function setTitleSeo($title)
    {
        $builder = $this->table($this->table);
        $url = strip_tags($title); //menghilangkan tag html
        $url = preg_replace('/[^A-Za-z0-9]/', " ", $url);
        $url = trim($url);
        $url = preg_replace('/[^A-Za-z0-9]/', "-", $url);
        $url = strtolower($url);

        $builder->where('post_title', $title);
        $jumlah = $builder->countAllResults();
        if ($jumlah > 0) {
            $jumlah = $jumlah + 1;
            return $url . "-" . $jumlah;
        }
        return $url;
    }


    // untuk ambil data
    public function insertPost($data, $post_type)
    {
        helper("global_fungsi_helper");
        $builder = $this->table($this->table);
        $data['post_type'] = $post_type;

        foreach ($data as $key => $value) {
            $data[$key] = purify($value);
        }
        if (isset($data['post_id'])) {
            $aksi = $builder->save($data);
            $id = $data['post_id'];
        } else {
            $data['post_title_seo'] = $this->setTitleSeo($data['post_title']);
            $aksi = $builder->save($data);
            $id = $builder->getInsertID();
        }

        if ($aksi) {
            return $id;
        } else {
            return false;
        }
    }
    // untuk update / simpan data jika data tidak ada
    public function listPost($post_type, $jumlahBaris, $katakunci = null, $group_dataset = null)
    {
        $builder = $this->table($this->table);
        //untuk kata kunci
        $arr_katakunci = explode(" ", (string)$katakunci);
        //menambahkan string tidak sama dengan divideo
        //
        $builder->groupStart();
        for ($x = 0; $x < count($arr_katakunci); $x++) {
            $builder->orLike('post_title', $arr_katakunci[$x]);
            $builder->orLike('post_description', $arr_katakunci[$x]);
            $builder->orLike('post_content', $arr_katakunci[$x]);
        }
        $builder->groupEnd();

        $builder->where('post_type', $post_type);
        $builder->orderBy('post_time', 'desc');

        $data['record'] = $builder->paginate($jumlahBaris, $group_dataset);
        $data['pager'] = $builder->pager;

        return $data;
    }

    function getPost($post_id)
    {
        $builder = $this->table($this->table);
        helper("global_fungsi_helper");
        $builder->where('post_id', $post_id);
        $query = $builder->get();
        return $query->getRowArray();
    }


    function deletePost($post_id)
    {
        $builder = $this->table($this->table);
        $builder->where('post_id', $post_id);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }

    function getPostBySeo($post_title_seo)
    {
        $builder = $this->table($this->table);
        $builder->where('post_title_seo', $post_title_seo);
        $query = $builder->get();
        return $query->getRowArray();
    }
    function jumlahdata() //menghitung jumlah 
    {
        $builder = $this->table($this->table);
        $builder->like('post_type', 'article');
        $query = $builder->countAllResults();
        return $query;
    }
}

