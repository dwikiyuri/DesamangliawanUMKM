<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RequestUMKMModel;
use App\Models\UMKMModel;
class Home extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_postsumkm = new RequestUMKMModel();
        $this->m_daftarumkm = new UMKMModel();
        helper("global_fungsi_helper");
        //konfigurasi
        $this->halaman_request = "Request";
        $this->halaman_controller = "Umkm";
        $this->halaman_label = "Umkm";
        $this->signumkm="byrequest";

    }
    public function index()
    {    
       $data = [];
       $data['templateJudul'] = "Halaman" . $this->halaman_label;

       $post_type = $this->halaman_controller;
       $jumlahBaris = 6;
       $katakunci = $this->request->getVar('katakunci');
       $group_dataset = "dt";

       $hasil = $this->m_daftarumkm->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);

       $data['record'] = $hasil['record'];
       $data['pager'] = $hasil['pager'];
       $data['katakunci'] = $katakunci;
       $currentPage = $this->request->getVar('page_dt');
       $data['nomor'] = nomor($currentPage, $jumlahBaris);
       
       $jumlah = $this->m_postsumkm->jumlahdata();
       $data['jumlah'] = $jumlah; 
    //    dd($jumlah);
        //** header */
        echo view('depan/home', $data);
        //** footer */
    }
    public function pendaftaran()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar(); //semua yang diiputkan akan dikembalikan ke view
            $aturan = [
                'nama_toko' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nama toko / usaha harus diisi',
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
                    'username' => $this->halaman_request ,
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
                 $namatoko=$this->request->getVar('nama_toko');
                $post_type = $this->signumkm;
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
                    session()->setFlashdata('success', $namatoko . 'berhasil di masukkan',);
                    // session()->set('success_data', $record);
                    return redirect()->to('Home');
                } else {
                    session()->setFlashdata('warning', ['data tidak berhasil dimasukkan']);
                    return redirect()->to('Home');
                }
            }
        }
        $data['templateJudul'] = "Halaman Tambah" . $this->halaman_label;
        $data['validate'] = \Config\Services::validation();
       
        echo view('depan/pendaftaran');
       
    }
    public function detail($nama_toko)
    {
        $data = [];
        $dataPost = $this->m_daftarumkm->getPostdepan($nama_toko);
        $data = $dataPost;
        // dd($dataPost);
        // dd($data);
        echo view('depan/detail', $data);
       
    }
    public function contact()
    {
        $data = [];

    // Retrieve the submitted data from the session
        
        
        echo view('depan/contact',$data);
       
    }
}
