<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Akun extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_admin = new AdminModel();
        helper("global_fungsi_helper");
        //konfigurasi
        $this->halaman_controller = "akun";
        $this->halaman_label = "Akun";
    }
    function index()
    {
        //**cek login */

        $data = [];
        if ($this->request->getMethod() == 'post') {
            //kominasi antara value
            $data = $this->request->getVar();

            $nama_lengkap = $this->request->getVar('nama_lengkap');
            $password_lama = $this->request->getVar('password_lama');
            $password_baru = $this->request->getVar('password_baru');
            $password_baru_konfirmasi = $this->request->getVar('password_baru_konfirmasi');

            $aturan = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama lengkap harus diisi'
                    ]
                ]
            ];
            if ($password_baru != '') {
                $aturan = [
                    'password_lama' => [
                        'rules' => 'required|check_old_password[password_lama]',
                        'errors' => [
                            'required' => 'password lama harus diisi ',
                            'check_old_password' => 'Password lama tidak sesuai'
                        ]
                    ],
                    'password_baru' => [
                        'rules' => 'min_length[5]|alpha_numeric',
                        'errors' => [
                            'min_length' => 'Minimum password adalah 5 karakter',
                            'alpha_numeric' => 'hanya angka dan huruf yang diperbolehkan'
                        ]
                    ],
                    'password_baru_konfirmasi' => [
                        'rules' => 'matches[password_baru]',
                        'errors' => [
                            'matches' => 'password tidak sesuai'
                        ]
                    ]
                ];
            }
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $dataUpdate = [
                    'email' => session()->get('akun_email'),
                    'nama_lengkap' => $nama_lengkap
                ];
                $this->m_admin->updateData($dataUpdate);

                $sesi = [
                    'akun_nama_lengkap' => $nama_lengkap
                ];
                session()->set($sesi);

                if ($password_baru != '') {
                    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
                    $dataUpdate = [
                        'email' => session()->get('akun_email'),
                        'password' => $password_baru
                    ];
                    $this->m_admin->updateData($dataUpdate);

                    helper('cookie');
                    if (get_cookie('cookie_password')) {
                        set_cookie("cookie_username", session()->get('akun_username'), 3600 * 24 * 30);
                        set_cookie("cookie_password", $password_baru, 3600 * 24 * 30);
                    }
                }
                session()->setFlashdata('success', 'Data berhasil Update');
            }
            return redirect()->to('admin/' . $this->halaman_controller);
        }
        $username = session()->get('akun_username');
        $data = $this->m_admin->getData($username);
        // dd($data);

        // dd($currentPage);
        //** header */
        $data['templateJudul'] = "Halaman " . $this->halaman_label;
        echo view('admin/v_template_header', $data);
        echo view('admin/v_akun', $data);
        echo view('admin/v_template_footer', $data);
        //** footer */
    }
}
