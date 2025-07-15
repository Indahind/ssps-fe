<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'TB_M_SUPPLIER';
    protected $primaryKey = 'SUPPLIERCD'; 

    protected $useAutoIncrement = false; 
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'SUPPLIERCD',   
        'SUPPLIERNAME',    
        'FACTORYCD',  
        'SUPPLIER_ADDR1_ENG',  
        'SUPPLIER_LOCAL_NAME',   
        'SUPPLIER_LOCAL_ADD1',  
        'NSTATUS',     
        'CREATEDATE',  
        'CREATEBY',   
    ];

    protected $useTimestamps = false;
}
