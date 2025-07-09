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
            ->where('NSTATUS', 'ACTIVE')
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

        $existingUser = $this->userModel->where('MUSERNAME', $data['MUSERNAME'])->first();
        
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username already exists. Please choose a different username.');
        }

        $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        $data['NSTATUS'] = 'ACTIVE';

        if (!$this->userModel->insert($data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        return redirect()->to('/users')->with('success', 'User successfully added.');
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

        $existingUser = $this->userModel->where('MUSERNAME', $data['MUSERNAME'])
                                        ->where('MNOREG !=', $id)  // Exclude the current user being updated
                                        ->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username already exists. Please choose a different username.');
        }

        if (empty($data['MPASWORD'])) {
            unset($data['MPASWORD']);
        } else {
            $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        }

        if (!$this->userModel->update($id, $data)) {
            $errors = $this->userModel->errors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        return redirect()->to('/users')->with('success', 'User successfully updated.');
    }


    public function delete($MNOREG)
    {
        $user = $this->userModel->where('MNOREG', $MNOREG)->first();

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found.');
        }

        $data = ['NSTATUS' => 'INACTIVE'];

        $updateResult = $this->userModel->update($MNOREG, $data);

        if (!$updateResult) {
            return redirect()->to('/users')->with('errors', 'Failed to deactivate user.');
        }

        return redirect()->to('/users')->with('success', 'User successfully deactivated.');
    }

}
