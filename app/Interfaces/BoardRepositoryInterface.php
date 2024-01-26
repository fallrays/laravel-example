<?php
namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;

interface BoardRepositoryInterface
{
    public function list($perPage);
    public function findById(int $id): Model;
    public function create(array $data): Model;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}