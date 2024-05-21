<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\Config\Config;
use App\Filters\FilterInterface;

class Admin extends BaseController
{
    function __construct()
    {
        $this->m_admin = new AdminModel();
        $this->validate = \Config\Services::validation();
        helper("cookie");
        helper("global_fungsi_helper");
        $this->auth = \App\Filters\AuthFilter::class;
        $this->noauth = \App\Filters\NoAuthFilter::class;
    }
    public function login()
    {
        $data = [];
        if (get_cookie('cookie_username') && get_cookie('cookie_password')) {
            $username = get_cookie('cookie_username');
            $password = get_cookie('cookie_password');

            $dataAkun = $this->m_admin->getData($username);
            ;
            if ($password != $dataAkun['password']) {
                $err[] = "Akun yang kamu masukkan tidak sesuai";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);

                delete_cookie('cookie_username');
                delete_cookie('cookie_password');
                return redirect()->to('admin/login');
            }
            $akun = [
                'akun_username' => $username,
                'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
                'akun_email' => $dataAkun['email'],
            ];
            session()->set($akun);
            return redirect()->to('admin/sukses');
        }
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus di ISI brow'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'diisi passwordnya'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata("warning", $this->validate->getErrors());
                return redirect()->to("admin/login");
            }

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $remember_me = $this->request->getVar('remember_me');

            $dataAkun = $this->m_admin->getData($username);
            
            if (!password_verify($password, $dataAkun['password'])) {
                $err[] = "akun yang anda masukkan tidak sesuai.";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);
                return redirect()->to("admin/login");
            }

            if ($remember_me == 1) {
                set_cookie("cookie_username", $username, 3600 * 24 * 30);
                set_cookie("cookie_password", $dataAkun['password'], 3600 * 24 * 30);
            }


            $akun = [
                'akun_username' => $dataAkun['username'],
                'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
                'akun_email' => $dataAkun['email']
            ];
            session()->set($akun);
            return redirect()->to("admin/sukses")->withCookies();
        }
        echo view("admin/v_login", $data);
    }
    function sukses()
    {
        return redirect()->to('admin/article');
        // print_r(session()->get());
        // echo "isian cookie" . get_cookie("cookie_username") . "Dan password" . get_cookie("cookie_password");
    }
    function logout()
    {
        delete_cookie("cookie_username");
        delete_cookie("cookie_password");
        session()->destroy();
        if (session()->get('akun_username') != '') {
            session()->setFlashdata("success", "Anda berhasil logout");
        }
        
        return redirect()->to("admin/login");
    }
    function lupapassword()
    {
        $err = [];
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getVar('username');
            if ($username == '') {
                $err[] = "Silahkan masukkan email atau username yang anda punya";
            }
            if (empty($err)) {
                $data = $this->m_admin->getData($username);
                if (empty($data)) {
                    $err[] = "Akun tidak sesuai ";
                }
            }
            if (empty($err)) {
                $email = $data['email'];
                $token = md5(date('ymdhis'));

                $link = site_url("admin/resetpassword/?email=$email&token=$token");
                $attachment = "";
                $to = $email;
                $title = "Reset Password";
                $message = "Berikut Link Reset Password.";
                $message .= " Silahkan klik $link";

                kirim_email($attachment, $to, $title, $message);

                $dataUpdate = [

                    'email' => $email,
                    'token' => $token
                ];
                $this->m_admin->updateData($dataUpdate);
                session()->setFlashdata("success", "email recovery sudah dikirimkan");
                //error memanggil pewarnaan bagian succes cek pada saat success
                // memanggil id tidak sesuai dengan apa yang diyutub
            }
            if ($err) {
                session()->setFlashdata("username", $username);
                session()->setFlashdata("warning", $err);
            }
            return redirect()->to("admin/lupapassword");
        }
        echo view("admin/v_lupapassword");
    }
    function resetpassword()
    {
        $err = [];
        $id = $this->request->getVar('id');
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        
        if ($email != '' and $token != '') {
            $dataAkun = $this->m_admin->getData($email);
            
            if ($dataAkun['token'] != $token) {
                $err[] = "Token tidak valid";
            }
        } else {
            $err[] = "Parameter yang dikirimkan tidak valid";
        }
        
        if ($err) {
            session()->setFlashdata("warning", $err);
        }
        if ($this->request->getMethod() == 'post') {
            $aturan = [
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Password harus di isi',
                        'min_length' => 'Minimal panjang password 5 karakter'
                    ]
                ],
                'konfirmasi_password' => [
                    'rules' => 'required|min_length[5]|matches[password]',
                    'errors' => [
                        'required' => 'Password harus di isi',
                        'min_length' => 'Minimal panjang konfirmasi password 5 karakter',
                        'matches' => 'tidak sesuai dengan inputan password'
                    ]
                ],
            ];
            if (!$this->validate($aturan)) {
                session()->setFlashdata('warning', $this->validate->getErrors());
            } else {
                $dataUpdate = [
                    'id' => $id,
                    'email' => $email,
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token' => null
                ];
                $this->m_admin->updateData($dataUpdate);
                session()->getFlashdata('success', 'password telah direset silahkan login');
                delete_cookie('cookie_username');
                delete_cookie('cookie_password');
                return redirect()->to('admin/login')->withCookies();
            }
        }
        echo view("admin/v_resetpassword");
    }
}
