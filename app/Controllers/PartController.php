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
        $last = $this->partModel
                    ->select('MPARTNO')
                    ->orderBy('MPARTNO', 'DESC') 
                    ->first();

        if ($last) {
            $lastPartNumber = substr($last['MPARTNO'], -3);  
            $nextPartNumber = str_pad(intval($lastPartNumber) + 1, 3, '0', STR_PAD_LEFT);  
            $prefix = substr($last['MPARTNO'], 0, strlen($last['MPARTNO']) - 3); 
            $nextMPARTNO = $prefix . $nextPartNumber; 
        } else {
            $nextMPARTNO = '091410B001'; 
        }

        return view('part/create', [
            'nextMPARTNO' => $nextMPARTNO 
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['NSTATUS'] = 'ACTIVE';
        $data['CREATEDATE'] = date('Y-m-d');
        $data['CREATEBY'] = session()->get('MUSERNAME'); 


        if (!$this->partModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->partModel->errors());
        }

        return redirect()->to('/part')->with('success', 'Part successfully added.');
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

        return redirect()->to('/part')->with('success', 'Part successfully updated.');
    }

    public function delete($id)
    {
        $part = $this->partModel->find($id);
        if (!$part) {
            return redirect()->to('/part')->with('errors', 'Failed to deactivate part.');
        }

        $this->partModel->update($id, ['NSTATUS' => 'INACTIVE']);

        return redirect()->to('/part')->with('success', 'Part berhasil dinonaktifkan.');
    }
}
