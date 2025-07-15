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

        log_message('debug', "Login attempt by: $username");

        $user = $this->userModel
                     ->where('MUSERNAME', $username)
                     ->first();

        if ($user) {
            if ($user['NSTATUS'] !== 'ACTIVE') {
                return redirect()->to('/login')
                                 ->with('error', 'Your account is inactive. Please contact admin.');
            }

            if (password_verify($password, $user['MPASWORD'])) {
                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['MNOREG'],
                    'username'   => $user['MUSERNAME'],
                    'nama'       => $user['MNAMA'],
                ]);
                return redirect()->to('/dashboard');
            }

            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Username or Password is incorrect.');
        }

        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Username or Password is incorrect.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}