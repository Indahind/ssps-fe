<?php

namespace App\Controllers;

use App\Models\PartProcessModel;
use CodeIgniter\RESTful\ResourceController;

class PartProcessController extends ResourceController
{
    protected $modelName = 'App\Models\PartProcessModel';
    protected $format    = 'json';

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond($data);
    }
}
