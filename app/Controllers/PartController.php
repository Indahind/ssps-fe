<?php

namespace App\Controllers;

use App\Models\PartModel;
use CodeIgniter\RESTful\ResourceController;

class PartController extends ResourceController
{
    protected $modelName = 'App\Models\PartModel';
    protected $format    = 'json';

    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond($data);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Part not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Part deleted']);
    }
}
