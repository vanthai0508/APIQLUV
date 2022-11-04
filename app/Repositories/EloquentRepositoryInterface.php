<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function getAll(): Collection;

    /**
     * Get one
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id): ?Model;

    /**
     * Create
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []): ?Model;

    /**
     * Update
     *
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes = []): ?Model;

    /**
     * Delete
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): bool;

    /**
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes = [], array $values = []);

    /**
     * @param array $relations
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(array $relations = [], int $perPage = 10): LengthAwarePaginator;
}