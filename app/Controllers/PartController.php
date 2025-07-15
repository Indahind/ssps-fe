<?php

namespace App\Controllers;

use App\Models\PartModel;
use App\Models\SupplierModel;
use CodeIgniter\Controller;

class PartController extends BaseController
{
    protected $partModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->partModel = new PartModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data['parts'] = $this->partModel
            ->select('TB_M_PART.MPARTNO, TB_M_PART.MPARTNAME, TB_M_PART.SUPPLIERCD, TB_M_PART.NSTATUS, TB_M_PART.CREATEDATE, TB_M_PART.CREATEBY, TB_M_SUPPLIER.SUPPLIERNAME') // Ensure SUPPLIERNAME is selected
            ->join('TB_M_SUPPLIER', 'TB_M_PART.SUPPLIERCD = TB_M_SUPPLIER.SUPPLIERCD', 'left')  // Join with TB_M_SUPPLIER table
            ->findAll();

        return view('part/index', $data);
    }

    public function show($id)
    {
        $data['part'] = $this->partModel
            ->select('TB_M_PART.MPARTNO, TB_M_PART.MPARTNAME, TB_M_PART.SUPPLIERCD, TB_M_PART.NSTATUS, TB_M_PART.CREATEDATE, TB_M_PART.CREATEBY, TB_M_SUPPLIER.SUPPLIERNAME')
            ->join('TB_M_SUPPLIER', 'TB_M_PART.SUPPLIERCD = TB_M_SUPPLIER.SUPPLIERCD', 'left')  // Ensure join is working
            ->where('MPARTNO', $id)
            ->first();  

        if (!$data['part']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Part not found');
        }

        return view('part/detail', $data);
    }


    public function create()
    {
        $supplierModel = new SupplierModel(); 
        $data['suppliers'] = $supplierModel->findAll();

        $last = $this->partModel->select('MPARTNO')->orderBy('MPARTNO', 'DESC')->first();

        if ($last) {
            $lastPartNumber = substr($last['MPARTNO'], -3);
            $nextPartNumber = str_pad(intval($lastPartNumber) + 1, 3, '0', STR_PAD_LEFT);
            $prefix = substr($last['MPARTNO'], 0, strlen($last['MPARTNO']) - 3);
            $nextMPARTNO = $prefix . $nextPartNumber;
        } else {
            $nextMPARTNO = '091410B001';
        }

        return view('part/create', [
            'nextMPARTNO' => $nextMPARTNO,
            'suppliers' => $data['suppliers'], 
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['NSTATUS'] = 'ACTIVE';
        $data['CREATEDATE'] = date('Y-m-d');
        //$data['CREATEBY'] = session()->get('MUSERNAME'); 
        $data['CREATEBY'] = "superadmin";

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
        $supplierModel = new SupplierModel(); 
        $data['suppliers'] = $supplierModel->findAll(); 

        $data['part'] = $this->partModel->find($id);
        if (!$data['part']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Part not found');
        }

        return view('part/update', $data);
    }

    public function delete($id)
    {
        $part = $this->partModel->find($id);
        if (!$part) {
            return redirect()->to('/part')->with('errors', 'Part not found.');
        }

        // Toggle status based on current status
        $newStatus = ($part['NSTATUS'] == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';

        // Update the part status
        $this->partModel->update($id, ['NSTATUS' => $newStatus]);

        // Provide success message and redirect
        return redirect()->to('/part')->with('success', 'Part status successfully updated.');
    }

}
