<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

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
    $key = md5(get_class($this->model));
    $model = $this->model;
    return Cache::remember("$key", config('cache.expires'), function() use($model){
      return $model->get();
    });
  }

  public function find(int $id)
  {
    $key = md5(get_class($this->model)."_".$id);
    $model = $this->model;
    return Cache::remember($key, config('cache.expires'), function () use($model, $id){
      return $model->find($id);
    });
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