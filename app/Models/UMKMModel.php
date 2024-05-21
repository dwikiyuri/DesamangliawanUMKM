<?php

namespace App\Models;

use CodeIgniter\Model;

class UMKMModel extends Model
{
    protected $table = "umkm";
    protected $primaryKey = "post_id";
    protected $allowedFields = ['post_title_seo', 'post_type', 'nama_pemilik', 'username', 'nama_toko', 'jenis_umkm', 'post_thumbnail','post_thumbnail2', 'post_content', 'post_time', 'nomor_telepon', 'alamat','lazada','tokopedia','shopee'];

    public function setTitleSeo($title)
    {
        $builder = $this->table($this->table);
        $url = strip_tags($title); //menghilangkan tag html
        $url = preg_replace('/[^A-Za-z0-9]/', " ", $url);
        $url = trim($url);
        $url = preg_replace('/[^A-Za-z0-9]/', "-", $url);
        $url = strtolower($url);

        $builder->where('nama_toko', $title);
        $jumlah = $builder->countAllResults();
        if ($jumlah > 0) {
            $jumlah = $jumlah + 1;
            return $url . "-" . $jumlah;
        }
        return $url;
    }

    public function setNomorHp($nomor_telepon)
    {

        // kadang ada penulisan no hp 0811 239 345
        $nomor_telepon = str_replace(" ", "", $nomor_telepon);
        // kadang ada penulisan no hp (0274) 778787
        $nomor_telepon = str_replace("(", "", $nomor_telepon);
        // kadang ada penulisan no hp (0274) 778787
        $nomor_telepon = str_replace(")", "", $nomor_telepon);
        // kadang ada penulisan no hp 0811.239.345
        $nomor_telepon = str_replace(".", "", $nomor_telepon);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nomor_telepon))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nomor_telepon), 0, 3) == '+62') {
                $hp = trim($nomor_telepon);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nomor_telepon), 0, 1) == '0') {
                $hp = '+62' . substr(trim($nomor_telepon), 1);
            }
        }
        return $hp;
    }


    // untuk ambil data
    public function insertPost($data, $post_type)
    {
        helper("global_fungsi_helper");
        $builder = $this->table($this->table);
        $data['post_type'] = $post_type;
        // $data['nomor_telepon'] = $this->setNomorHp($data['nomor_telepon']);

        if (isset($data['post_id'])) {
            $aksi = $builder->save($data);
            $id = $data['post_id'];
        } else {
            $data['post_title_seo'] = $this->setTitleSeo($data['nama_toko']);
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
            $builder->orLike('nama_toko', $arr_katakunci[$x]);
            $builder->orLike('alamat', $arr_katakunci[$x]);
            $builder->orLike('post_content', $arr_katakunci[$x]);
            $builder->orLike('jenis_umkm', $arr_katakunci[$x]);
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
    function getPostdepan($nama_toko)
    {
        $builder = $this->table($this->table);
        helper("global_fungsi_helper");
        $builder->where('nama_toko', $nama_toko);
        $query = $builder->get();
        return $query->getRowArray();
    }
    function jumlahdata() //menghitung jumlah 
    {
        $builder = $this->table($this->table);
        $builder->like('post_type', 'umkm');
        $query = $builder->countAllResults();
        return $query;
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
}
