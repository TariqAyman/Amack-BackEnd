<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /** @var Model */
    protected $model;

    public function __construct()
    {
        if (!app($this->getModel()) instanceof Model) {
            throw new \RuntimeException('model not found');
        }
        $this->model = app($this->getModel());
    }

    abstract public function getModel();

    public function findAll($columns = ['*']): Collection
    {
        return $this->model::query()->select($columns)->get();
    }

    public function insert(array $data): Model
    {
        return $this->model::query()->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $object = $this->find($id);
        $object->update($data);
        return $object->fresh();
    }

    public function find(int $id, $columns = ['*']): Model
    {
        return $this->model::query()->findOrFail($id, $columns);
    }

    public function delete(int $id): ?bool
    {
        $object = $this->find($id);
        return $object->delete();
    }

    public function findBy(array $data, array $columns = ['*']): Collection
    {
        $query = $this->model::query();
        foreach ($data as $column => $condition) {
            $query->where($column, '=', $condition);
        }
        return $query->select($columns)->get();
    }

    public function findOneBy(array $data, array $columns = ['*']): Model
    {
        $query = $this->model::query();
        foreach ($data as $column => $condition) {
            $query->where($column, '=', $condition);
        }
        return $query->select($columns)->firstOrFail();
    }

    abstract public function getDatatable();
}
