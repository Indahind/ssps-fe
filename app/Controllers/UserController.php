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
        $year = date('Y'); // Get the current year
        $lastRecord = $this->userModel->where('MNOREG LIKE', $year . '%')->orderBy('MNOREG', 'desc')->first();
        $sequence = 1;

        if ($lastRecord) {
            // Extract the last sequence number and increment it
            $lastSequence = substr($lastRecord['MNOREG'], 4);
            $sequence = intval($lastSequence) + 1;
        }

        // Format the sequence as a 4-digit number
        $MNOREG = $year . str_pad($sequence, 4, '0', STR_PAD_LEFT);

        // Pass the generated MNOREG to the view
        return view('user/create', ['MNOREG' => $MNOREG]);
    }


    public function store()
    {
        $data = $this->request->getPost();

        $year = date('Y');
        $lastRecord = $this->userModel->where('MNOREG LIKE', $year . '%')->orderBy('MNOREG', 'desc')->first();
        $sequence = 1;

        if ($lastRecord) {
            $lastSequence = substr($lastRecord['MNOREG'], 4);
            $sequence = intval($lastSequence) + 1;
        }

        $MNOREG = $year . str_pad($sequence, 4, '0', STR_PAD_LEFT);
        $data['MNOREG'] = $MNOREG;

        $existingUser = $this->userModel->where('MUSERNAME', $data['MUSERNAME'])->first();
        if ($existingUser) {
            session()->setFlashdata('error', 'Username already exists. Please choose a different username.');
            return redirect()->back()->withInput();
        }

        $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        $data['NSTATUS'] = 'ACTIVE';

        $data['CREATEDATE'] = date('Y-m-d H:i:s');
        $data['CREATEBY'] = session()->get('username');

        if (!$this->userModel->insert($data)) {
            $errors = $this->userModel->errors();
            session()->setFlashdata('errors', $errors);
            return redirect()->back()->withInput();
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

        // Check if the username already exists (excluding the current user)
        $existingUser = $this->userModel->where('MUSERNAME', $data['MUSERNAME'])
                                        ->where('MNOREG !=', $id) 
                                        ->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Username already exists. Please choose a different username.');
        }

        // If password is empty, leave it as it is
        if (empty($data['MPASWORD'])) {
            unset($data['MPASWORD']);
        } else {
            // Hash the password before updating
            $data['MPASWORD'] = password_hash($data['MPASWORD'], PASSWORD_DEFAULT);
        }

        // Update user
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
