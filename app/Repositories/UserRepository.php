<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    /**
     * List
     */
    public function list($search = [])
    {
        $perPage = !empty($search['perPage']) ? $search['perPage'] : 10;

        $query = $this->model->query();

        if (!empty($search['search_field']) && !empty($search['search_text'])) {
            $query->where($search['search_field'], 'LIKE', '%'.$search['search_text'].'%');
        }

        $sortField = !empty($search['sortField']) ? $search['sortField'] : 'id';
        $sortType = !empty($search['sortType']) ? $search['sortType'] : 'desc';
        $query->orderBy($sortField, $sortType);

        return $query->paginate($perPage, $columns = ['*']);
    }

    /**
     * Get
     */
    public function findById(int $id): User
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * Update
     */
    public function update(int $id, array $data): bool
    {
        $model = $this->findById($id);
        return $model->update($data);
    }

    /**
     * Delete
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}