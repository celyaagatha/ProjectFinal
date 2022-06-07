<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use Config\View;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }
    public function login()
    {
        helper('form');
        echo View('viewformtambah');
    }
    public function cekUser(){
        $iduser = $this->request->getPost('iduser');
        $user_password = $this->request->getPost('user_password');

        $validation = \Config\Services::validation();
        
        $valid = $this->validate([
            'iduser' => [
                'label' => "Username",
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'user_password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('user_password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login/index'));
        }else{
            $modelLogin = new ModelLogin();

            $cekUserLogin = $modelLogin->find($iduser);
            if($cekUserLogin == null){
                $sessError = [
                    'errIdUser' => 'Maaf Username Tidak Terdaftar',
                ];
    
                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login/index'));
            }else{
                $passwordUser = $cekUserLogin['user_password'];

                if(password_verify ($user_password,$passwordUser)){
                    //lanjut...
                    $idlevel = $cekUserLogin['userlevelid'];

                    $simpan_session = [
                        'iduser' => $iduser,
                        'user_nama' => $cekUserLogin['userlevelid'],
                        'idlevel' => $idlevel
                    ];
                    session()->set($simpan_session);
                    return redirect()->to('/data/index');
                } else{
                    $sessError = [
                        'errPassword' => 'Password Salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login/index'));
                }
            }
        }
    }
    public function keluar ()
    {
        session()->destroy();
        return redirect()->to('/login/index');
    }
}
