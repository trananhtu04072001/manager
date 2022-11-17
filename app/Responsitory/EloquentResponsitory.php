<?php

namespace App\Responsitory;

abstract class EloquentResponsitory
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */

    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel() {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll() {
        return $this->model->all();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function create(array $attribute) {
        return $this->model->create($attribute);
    }

    public function update($id, array $attribute) {
        $result = $this->find($id);
        if ($result) {
            $result->update($attribute);
            return $result;
        }
        return false;
    }

    public function delete($id) {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
