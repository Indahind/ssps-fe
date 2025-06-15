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

        log_message('debug', "Login attempt by: $username"); // Log username yang dimasukkan

        $user = $this->userModel->where('MUSERNAME', $username)->first();

        if ($user) {
            // Jangan print password di log demi keamanan
            log_message('debug', "User found with MNOREG: " . $user['MNOREG']);

            // Gunakan password_verify untuk cek hash
            if (password_verify($password, $user['MPASWORD'])) {
                log_message('debug', 'Password match.');

                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['MNOREG'],
                    'username'   => $user['MUSERNAME'],
                    'nama'       => $user['MNAMA'],
                ]);

                return redirect()->to('/dashboard');
            } else {
                log_message('debug', 'Password mismatch.');
            }
        } else {
            log_message('debug', 'User not found.');
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
