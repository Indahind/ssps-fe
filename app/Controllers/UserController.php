<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel
            ->where('status', 'ACTIVE')
            ->findAll();

        return view('user/index', $data);
    }

    public function show($id)
    {
        $data['user'] = $this->userModel->find($id);
        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('user/detail', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Hash password sebelum simpan
        $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        $data['NSTATUS'] = 'ACTIVE';

        if (!$this->userModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('user/update', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        // Kalau password kosong, jangan update password
        if (empty($data['MPASWORD'])) {
            unset($data['MPASWORD']);
        } else {
            // Hash password baru
            $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        }

        if (!$this->userModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        return redirect()->to('/users')->with('success', 'User berhasil diupdate.');
    }



    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        $this->userModel->update($id, ['status' => 'INACTIVE']);
        return redirect()->to('/users')->with('success', 'User berhasil dinonaktifkan.');
    }
}
