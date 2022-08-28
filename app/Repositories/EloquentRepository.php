<?php
namespace App\Repositories;

abstract class EloquentRepository implements EloquentInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model=app()->make($this->getModel());
    }

    abstract public function getModel();

    public function list()
    {
        return $this->model->all();
    }

    public function create(array $request)
    {
        return $this->model->create($request);
    }

    // public function update($data, $id)
    // {
    //     return $this->model->update($data)->where('id', $id);
    // }

    public function delete($id)
    {
       return $this->model->destroy($id);
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }
    
}


?>