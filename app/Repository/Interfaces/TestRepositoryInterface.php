<?php

namespace App\Repository\Interfaces;

/**
 * Interface TestRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface TestRepositoryInterface
{
    public function pagination(array $columns, $perPage = 5);
    public function findById($id) ;
    public function create(array $payload = []);
    // public function update(int $id, array $payload);
    // public function delete(int $id = 0) ;
}