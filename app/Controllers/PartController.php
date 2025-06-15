<?php

namespace App\Controllers;

use App\Models\PartModel;
use CodeIgniter\Controller;

class PartController extends BaseController
{
    protected $partModel;

    public function __construct()
    {
        $this->partModel = new PartModel();
    }

    public function index()
    {
        $data['parts'] = $this->partModel
            ->where('NSTATUS', 'ACTIVE')
            ->findAll();

        return view('part/index', $data);
    }


    public function show($id)
    {
        $data['part'] = $this->partModel->find($id);
        if (!$data['part']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Part not found');
        }

        return view('part/detail', $data);
    }


    public function create()
    {
        return view('part/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['NSTATUS'] = 'ACTIVE';

        if (!$this->partModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->partModel->errors());
        }

        return redirect()->to('/part')->with('success', 'Part berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data['part'] = $this->partModel->find($id);
        if (!$data['part']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Part not found');
        }

        return view('part/update', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        if (!$this->partModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->partModel->errors());
        }

        return redirect()->to('/part')->with('success', 'Part berhasil diupdate.');
    }

    public function delete($id)
    {
        $part = $this->partModel->find($id);
        if (!$part) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Part not found');
        }

        $this->partModel->update($id, ['NSTATUS' => 'INACTIVE']);

        return redirect()->to('/part')->with('success', 'Part berhasil dinonaktifkan.');
    }
}
