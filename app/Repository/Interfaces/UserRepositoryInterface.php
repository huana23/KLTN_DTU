<?php

namespace App\Repository\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface UserRepositoryInterface
{
    public function getAllPaginate();
    public function create(array $payload = []);
    public function findById($id);
    public function update(int $id, array $payload);
    public function delete(int $id = 0) ;
    public function pagination(array $column = ['*'],array $condition = [],array $join = [],int $perpage =10);
}
