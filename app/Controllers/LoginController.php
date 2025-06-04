<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        return view('login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $db = \Config\Database::connect();
        log_message('debug', "Login attempt by: $username");

        $user = $this->userModel->where('MUSERNAME', $username)->first();

        if ($user) {
            if ($password === $user['MPASWORD']) {
                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['MNOREG'],
                    'username'   => $user['MUSERNAME'],
                    'nama'       => $user['MNAMA'],
                ]);
                return redirect()->to('/dashboard');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Username atau Password salah');
    }

    public function testDb()
    {
        try {
            $db = \Config\Database::connect();
            echo "Koneksi berhasil ke database: " . $db->getDatabase();
        } catch (\Exception $e) {
            echo "Gagal koneksi database: " . $e->getMessage();
        }
    }
}
