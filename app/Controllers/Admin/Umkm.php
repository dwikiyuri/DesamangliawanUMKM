<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostsModel;
use App\Models\UMKMModel;

class UMKM extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_posts = new PostsModel();
        $this->m_postsumkm = new UMKMModel();
        helper("global_fungsi_helper");
        //konfigurasi
        $this->halaman_request = "request";
        $this->halaman_controller = "Umkm";
        $this->halaman_label = "Umkm";
    }
    function index()
    {
        //**cek login */

       $data=[];
       $jumlah = $this->m_postsumkm->jumlahdata();
       $data['jumlah'] = $jumlah; 
        //** header */
        echo view('admin/v_template_header', $data);
        echo view('admin/v_dashboard', $data);
        echo view('admin/v_template_footer', $data);
        //** footer */
    }
    function daftarumkm()
    {
        //**cek login */       
       $data = [];
       if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('post_id')) {
           $dataPost = $this->m_postsumkm->getPost($this->request->getVar('post_id'));
           if ($dataPost['post_id']) {
               @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail']);
               @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail2']);
               $aksi = $this->m_postsumkm->deletePost($this->request->getVar('post_id'));
               if ($aksi == true) {
                   session()->setFlashdata('success', 'data berhasil dihapus');
               } else {
                   session()->setFlashdata('warning', ['gagal menghapus data']);
               }
               return redirect()->to("admin/Umkm/daftarumkm");
               // dd($dataPost);
           }
       }
       $data['templateJudul'] = "Halaman" . $this->halaman_label;

       $post_type = $this->halaman_controller;
       $jumlahBaris = 5;
       $katakunci = $this->request->getVar('katakunci');
       $group_dataset = "dt";

       $hasil = $this->m_postsumkm->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);

       $data['record'] = $hasil['record'];
       $data['pager'] = $hasil['pager'];
       $data['katakunci'] = $katakunci;
       $currentPage = $this->request->getVar('page_dt');
       $data['nomor'] = nomor($currentPage, $jumlahBaris);
       
       $jumlah = $this->m_postsumkm->jumlahdata();
       $data['jumlah'] = $jumlah; 
    //    dd($jumlah);
        //** header */
        echo view('admin/v_template_header', $data);
        echo view('admin/v_umkm', $data);
        echo view('admin/v_template_footer', $data);
        //** footer */
    }
    function tambah()
    {

        $data = [  ];
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar(); //semua yang diiputkan akan dikembalikan ke view
            $aturan = [
                'nama_toko' => [
                    'rules' => 'required|is_unique[umkm.nama_toko]',
                    'errors' => [
                        'required' => 'nama toko / usaha harus diisi',
                        'is_unique' => 'Nama toko sudah terdaftar'
                    ],
                ],
                'nama_pemilik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nama pemilik harus diisi'
                    ],
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'alamat toko harus diisi'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'deskripsi usaha harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang harus di Upload',
                        
                    ]
                ],
                'post_thumbnail2' => [
                    'rules' => 'is_image[post_thumbnail2]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang harus di Upload',
                        
                    ]
                ],
                'jenis_umkm' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis UMKM harus diisi'
                    ]
                ],

            ];
            
            $file = $this->request->getFile('post_thumbnail');
            $file2 = $this->request->getFile('post_thumbnail2');
           
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = '';
                $post_thumbnail2 = '';
                if ($file->getName()||$file2->getName()) {
                    $post_thumbnail = $file->getRandomName();
                    $post_thumbnail2 = $file2->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'nama_toko' => $this->request->getVar('nama_toko'),
                    'jenis_umkm' => $this->request->getVar('jenis_umkm'),
                    'nama_pemilik' => $this->request->getVar('nama_pemilik'),
                    'alamat' => $this->request->getVar('alamat'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_thumbnail2' => $post_thumbnail2,
                    'post_content' => $this->request->getVar('post_content'),
                    'nomor_telepon' => $this->request->getVar('nomor_telepon'),
                    'shopee' => $this->request->getVar('shopee'),
                    'tokopedia' => $this->request->getVar('tokopedia'),
                    'lazada' => $this->request->getVar('lazada'),

                ];
               
                $post_type = $this->halaman_controller;
                $aksi = $this->m_postsumkm->insertPost($record, $post_type);
              
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        $lokasi_direktori = LOKASI_UPLOAD; //diambil dari config/constants
                        $file->move($lokasi_direktori, $post_thumbnail);
                        
                    }
                    if($file2->getname()){
                        $lokasi_direktori = LOKASI_UPLOAD;
                        $file2->move($lokasi_direktori, $post_thumbnail2);
                    }
                    session()->setFlashdata('success', $this->request->getVar('nama_toko').' berhasil di masukkan');
                    return redirect()->to('admin/' . $this->halaman_controller .  '/edit/' . $page_id);
                } else {
                    session()->setFlashdata('warning', ['data tidak berhasil dimasukkan']);
                    return redirect()->to('admin/' . $this->halaman_controller . '/tambah');
                }
            }
        }
        $data['templateJudul'] = "Halaman Tambah" . $this->halaman_label;
        $data['validate'] = \Config\Services::validation();
        
        
        // dd($data);
        echo view('admin/v_template_header', $data);
        echo view('admin/v_umkm_tambah',$data);
        echo view('admin/v_template_footer', $data);
    }
    function edit($post_id)
    {
        $data = [];
        $dataPost = $this->m_postsumkm->getPost($post_id);
        // dd($dataPost);
        if (empty($dataPost)) {
            return redirect()->to('admin/' . $this->halaman_controller);
        }
        $data = $dataPost; //memunculkan isi data
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar(); //semua yang diiputkan akan dikembalikan ke view
            $aturan = [
                'nama_toko' => [
                    'rules' => 'required|is_unique[umkm.nama_toko]',
                    'errors' => [
                        'required' => 'nama toko / usaha harus diisi',
                        'is_unique' => 'Nama toko sudah terdaftar'
                    ],
                ],
                'nama_pemilik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nama pemilik harus diisi'
                    ],
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'alamat toko harus diisi'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'deskripsi usaha harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang harus di Upload'
                    ]
                ],
                'jenis_umkm' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis UMKM harus diisi'
                    ]
                ],

            ];
            

           
            $file = $this->request->getFile('post_thumbnail');
            $file2 = $this->request->getFile('post_thumbnail2');
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = $dataPost['post_thumbnail'];
                $post_thumbnail2 = $dataPost['post_thumbnail2'];
                if ($file->getName()) {
                    $post_thumbnail = $file->getRandomName();
                }
                if ($file2->getName()) {
                    $post_thumbnail2 = $file2->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'nama_toko' => $this->request->getVar('nama_toko'),
                    'jenis_umkm' => $this->request->getVar('jenis_umkm'),
                    'nama_pemilik' => $this->request->getVar('nama_pemilik'),
                    'alamat' => $this->request->getVar('alamat'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_thumbnail2' => $post_thumbnail2,
                    'post_content' => $this->request->getVar('post_content'),
                    'nomor_telepon' => $this->request->getVar('nomor_telepon'),
                    'shopee' => $this->request->getVar('shopee'),
                    'tokopedia' => $this->request->getVar('tokopedia'),
                    'lazada' => $this->request->getVar('lazada'),
                    'post_id' => $post_id //sebagai primary key untuk mengedit sebagai rpimary key
                ];
                $deleteThumbnail = $this->request->getVar('delete_thumbnail');
                $deleteThumbnail2 = $this->request->getVar('delete_thumbnail2');
                if ($deleteThumbnail) {
                    @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail']);
                    $record['post_thumbnail'] = '';
                }
                if ($deleteThumbnail2) {
                    @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail2']);
                    $record['post_thumbnail2'] = '';
                }
                $post_type = $this->halaman_controller;
                $aksi = $this->m_postsumkm->insertPost($record, $post_type);
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        if ($dataPost['post_thumbnail'] ) {
                            @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail']);
                        }
                        $lokasi_direktori = LOKASI_UPLOAD; //diambil dari config/constants
                        $file->move($lokasi_direktori, $post_thumbnail);
                    }
                    if ($file2->getName()) {
                        if ($dataPost['post_thumbnail2'] ) {
                            @unlink(LOKASI_UPLOAD . "/" . $dataPost['post_thumbnail2']);
                        }
                        $lokasi_direktori = LOKASI_UPLOAD; //diambil dari config/constants
                        $file2->move($lokasi_direktori, $post_thumbnail2);
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
        // dd($data);
        $post_type = $this->halaman_request;
        $data['templateJudul'] = "Halaman Edit" . $this->halaman_label;
        $data['validate'] = \Config\Services::validation();
        echo view('admin/v_template_header', $data);
        echo view('admin/v_umkm_tambah', $data);
        echo view('admin/v_template_footer', $data);
    }
    
    
}
