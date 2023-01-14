<?php


namespace App\Repositories\BookStore;


interface BookStoreRepositoryInterface
{
    public function all(array $columns = ['*']);
    public function byId($id, array $columns = ['*']);
    public function findByField(string $field, $value, array $columns = ['*']);
    public function orderBy(string $column, string $direction = 'asc');
    public function delete($id);
    public function create(array $data);
    public function update($id, array $data);
}
