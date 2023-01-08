<?php

namespace App\Repositories;

class  BaseRepository implements BaseInterface
{

  protected $model;

  public function __construct($model)
  {
    $this->model = new $model;
  }

  public function all()
  {
    return $this->model->all();
  }

  public function get()
  {
    return $this->model->get();
  }

  public function find(int $id)
  {
    return $this->model->find($id);
  }

  public function create(array $data)
  {
    return $this->model->create($data);
  }

  public function update(int $id, array $data)
  {
    $obj = $this->model->find($id);
    return $obj->update($data) ?? false;
  }

  public function delete(int $id)
  {
    $obj = $this->model->find($id);
    return $obj->delete() ?? false;
  }
}