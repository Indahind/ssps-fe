<?php

namespace App\Models;

use CodeIgniter\Model;

class PartModel extends Model
{
    protected $table      = 'TB_M_PART';
    protected $primaryKey = 'MPARTNO'; 

    protected $useAutoIncrement = false; 
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'MPARTNO',   
        'MPARTNAME',    
        'NSUPPLIERPARTNAME',  
        'NSTATUS',     
        'CREATEDATE',  
        'CREATEBY',   
    ];

    protected $useTimestamps = false;
}
