<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'TB_M_USER';
    protected $primaryKey = 'MNOREG';

    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'MNOREG',
        'MUSERNAME',
        'MNAMA',
        'MPASWORD',
        'NSTATUS',
        'CREATEDATE',
        'RCEATEBY',
    ];

    protected $useTimestamps = false;
}
