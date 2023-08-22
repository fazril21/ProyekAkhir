<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $ModelLogin = new \App\Models\MLogin();
        $login = $this->request->getPOst('login');
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username == '' or $password == '') {
                $err = "Silahkan Masukan Username dan Password";
            }
            if (empty($err)){
                $dataAkun = $ModelLogin->where("username",$username)->first();
                if ($dataAkun['password'] != md5($password)
                ) {
                    $err = "Password Salah";
                }
            }
            if (empty($err)){
                $dataSesi = [
                    'id' => $dataAkun['id'],
                    'username' => $dataAkun['username'],
                    'password' => $dataAkun['password'],
                ];
                session()->set($dataSesi);
                return redirect()->to('Apps');
            }
            if ($err) {
                session()->setFlashdata('username',$username);
                session()->setFlashdata('error',$err);
                return redirect()->to("login");
            }
        }
        return view('Login_view');
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
}
