<?php


namespace App\Repositories\BookStore;


use App\Models\BookStore;

class BookStoreRepository implements BookStoreRepositoryInterface
{
    public function __construct(private BookStore $model)
    {
    }

    public function all(array $columns = ['*'])
    {
        return $this->model::query()->get($columns);
    }

    public function byId($id, array $columns = ['*'])
    {
        return $this->model::query()->findOrFail($id, $columns);
    }

    public function findByField(string $field, $value, array $columns = ['*'])
    {
        return $this->model::query()->where($field, '=', $value)->get($columns);
    }

    public function orderBy(string $column, string $direction = 'asc')
    {
        return $this->model::query()->orderBy($column, $direction)->get();
    }

    public function delete($id)
    {
        return $this->model::query()->findOrFail($id)->delete();
    }

    public function create(array $data)
    {
        return $this->model::query()->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model::query()->findOrFail($id)->update($data);
    }
}
