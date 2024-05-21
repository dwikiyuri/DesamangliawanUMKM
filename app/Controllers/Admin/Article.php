<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostsModel;
use App\Models\UMKMModel;
use App\Models\RequestUMKMModel;

class Article extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_posts = new PostsModel();
        $this->m_postsumkm = new UMKMModel();
        $this->m_postsrequestumkm = new RequestUMKMModel();
        helper("global_fungsi_helper");
        //konfigurasi
        $this->halaman_controller = "article";
        $this->halaman_label = "Article";
    }
    function index()
    {
        //**cek login */

       $data=[];
       $jumlaharticle = $this->m_posts->jumlahdata();
       $jumlahumkmterdaftar = $this->m_postsumkm->jumlahdata();
       $jumlahrequestumkm = $this->m_postsrequestumkm->jumlahdata();
       $data['jumlahrequest'] = $jumlahrequestumkm; 
       $data['jumlaharticle'] = $jumlaharticle; 
       $data['jumlahterdaftar'] = $jumlahumkmterdaftar; 
        //** header */
        echo view('admin/v_template_header', $data);
        echo view('admin/v_dashboard', $data);
        echo view('admin/v_template_footer', $data);
        //** footer */
    }
    function daftararticle()
    {
        //**cek login */       
       $data = [];
       if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('post_id')) {
           $dataPost = $this->m_posts->getPost($this->request->getVar('post_id'));
           if ($dataPost['post_id']) {
               @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail']);
               $aksi = $this->m_posts->deletePost($this->request->getVar('post_id'));
               if ($aksi == true) {
                   session()->setFlashdata('success', 'data berhasil dihapus');
               } else {
                   session()->setFlashdata('warning', ['gagal menghapus data']);
               }
               return redirect()->to("admin/article/daftararticle");
               // dd($dataPost);
           }
       }
       $data['templateJudul'] = "Halaman" . $this->halaman_label;

       $post_type = $this->halaman_controller;
       $jumlahBaris = 5;
       $katakunci = $this->request->getVar('katakunci');
       $group_dataset = "dt";

       $hasil = $this->m_posts->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);

       $data['record'] = $hasil['record'];
       $data['pager'] = $hasil['pager'];
       $data['katakunci'] = $katakunci;
       $currentPage = $this->request->getVar('page_dt');
       $data['nomor'] = nomor($currentPage, $jumlahBaris);
       
        //** header */
        echo view('admin/v_template_header', $data);
        echo view('admin/v_article', $data);
        echo view('admin/v_template_footer', $data);
        //** footer */
    }

    function tambah()
    {
        $post_type = $this->halaman_controller;
        
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar(); //semua yang diiputkan akan dikembalikan ke view
            $aturan = [
                'post_title' => [
                    'rules' => 'required|max_length[40]',
                    'errors' => [
                        'required' => 'judul harus diisi',
                        'max_length' => 'Maksimal panjang judul 40 karakter'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'content harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang harus di Upload'
                    ]
                ]
            ];
            $file = $this->request->getFile('post_thumbnail');
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = '';
                if ($file->getName()) {
                    $post_thumbnail = $file->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'post_title' => $this->request->getVar('post_title'),
                    'post_status' => $this->request->getVar('post_status'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_description' => $this->request->getVar('post_description'),
                    'post_content' => $this->request->getVar('post_content'),

                ];
                $post_type = $this->halaman_controller;
                $aksi = $this->m_posts->insertPost($record, $post_type);
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        $lokasi_direktori = LOKASI_UPLOAD; //diambil dari config/constants
                        $file->move($lokasi_direktori, $post_thumbnail);
                    }
                    session()->setFlashdata('success', 'data berhasil di masukkan');
                    return redirect()->to('admin/' . $this->halaman_controller .  '/edit/' . $page_id);
                } else {
                    session()->setFlashdata('warning', ['data tidak berhasil dimasukkan']);
                    return redirect()->to('admin/' . $this->halaman_controller . '/tambah');
                }
            }
        }
        
        $data['templateJudul'] = "Halaman Tambah" . $this->halaman_label;
        echo view('admin/v_template_header', $data);
        echo view('admin/v_article_tambah');
        echo view('admin/v_template_footer', $data);
    }
    function edit($post_id)
    {
        $data = [];
        $dataPost = $this->m_posts->getPost($post_id);
        // dd($dataPost);
        if (empty($dataPost)) {
            return redirect()->to('admin/' . $this->halaman_controller);
        }
        $data = $dataPost; //memunculkan isi data
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar(); //semua yang diiputkan akan dikembalikan ke view
            $aturan = [
                'post_title' => [
                    'rules' => 'required|max_length[40]',
                    'errors' => [
                        'required' => 'judul harus diisi',
                        'max_length' => 'Maksimal panjang judul 40 karakter'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'content harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang harus di Upload'
                    ]
                ]
            ];
            $file = $this->request->getFile('post_thumbnail');
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = $dataPost['post_thumbnail'];
                if ($file->getName()) {
                    $post_thumbnail = $file->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'post_title' => $this->request->getVar('post_title'),
                    'post_status' => $this->request->getVar('post_status'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_description' => $this->request->getVar('post_description'),
                    'post_content' => $this->request->getVar('post_content'),
                    'post_id' => $post_id //sebagai primary key untuk mengedit sebagai rpimary key
                ];
                $post_type = $this->halaman_controller;
                $aksi = $this->m_posts->insertPost($record, $post_type);
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        if ($dataPost['post_thumbnail']) {
                            @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail']);
                        }
                        $lokasi_direktori = LOKASI_UPLOAD; //diambil dari config/constants
                        $file->move($lokasi_direktori, $post_thumbnail);
                    }
                    session()->setFlashdata('success', 'data berhasil update');
                    return redirect()->to('admin/' . $this->halaman_controller . '/edit/' . $page_id);
                } else {
                    $page_id = $aksi;
                    session()->setFlashdata('warning', ['data tidak berhasil diupdate']);
                    return redirect()->to('admin/' . $this->halaman_controller . '/edit/' . $page_id);
                }
            }
        }
        // dd($dataPost);
        $data['templateJudul'] = "Halaman Edit" . $this->halaman_label;
        echo view('admin/v_template_header', $data);
        echo view('admin/v_article_tambah', $data);
        echo view('admin/v_template_footer', $data);
    }
}
