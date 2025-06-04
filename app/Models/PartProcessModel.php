<?php

namespace App\Models;

use CodeIgniter\Model;

class PartProcessModel extends Model
{
    protected $table      = 'TB_R_PART_PROCESS';
    protected $primaryKey = 'PROCESSID';

    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'PROCESSID',
        'MPARTID',
        'MNOREG',
        'RECEIVINGDATE',
        'RECEIVING_QTY_PLAN',
        'RECEIVING_QTY_ACTUAL',
        'SORTINGDATE',
        'SORTING_QTY_PLAN',
        'SORTING_QTY_ACTUAL',
        'BINNING_DATE',
        'BINNING_QTY_PLAN',
        'BINNING_QTY_ACTUAL',
        'PICKING_DATE',
        'PICKING_QTY_PLAN',
        'PICKING_QTY_ACTUAL',
        'PACKING_DATE',
        'PACKING_QTY_PLAN',
        'PACKING_QTY_ACTUAL',
        'VANNING_DATE',
        'VANNING_QTY_PLAN',
        'VANNING_QTY_ACTUAL',
        'CREATEDATE',
        'CREATEBY',
    ];

    protected $useTimestamps = false;
}
