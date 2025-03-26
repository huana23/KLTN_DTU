<?php

namespace App\Repository\Interfaces;

/**
 * Interface SubjectRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface SubjectRepositoryInterface
{
    public function getAllPaginate();
    public function create(array $payload = []);
    public function findById($id);
}
