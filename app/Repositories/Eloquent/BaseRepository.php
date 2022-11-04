<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\AppException;
use App\Exceptions;
use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * @return mixed
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     *
     * @throws AppException
     */
    public function create(array $attributes = []): ?Model
    {
        try {
            return $this->model->create($attributes);
        } catch (\Exception $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @param array $attributes
     *
     * @return mixed
     *
     * @throws AppException
     */
    public function update(int $id, array $attributes = []): ?Model
    {
        try {
            $result = $this->model->find($id);
            if ($result) {
                $result->update($attributes);
                return $result;
            }
        } catch (\Exception $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws AppException
     */
    public function delete(int $id): bool
    {
        try {
            $result = $this->find($id);
            $result->delete();
            return true;
        } catch (\Exception $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param array $attributes
     * @param array $value
     * @return mixed|void
     */
    public function updateOrCreate(array $attributes = [], array $value = [])
    {
        try {
            return $this->model->updateOrCreate($attributes, $value);
        } catch (QueryException $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param array $data
     *
     * @return mixed
     *
     * @throws AppException
     */
    public function insert(array $data)
    {
        try {
            return $this->model->insert($data);
        } catch (\Exception $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param array $data
     *
     * @return mixed
     *
     * @throws AppException
     */
    public function upsert(array $data)
    {
        try {
            return $this->model->upsert($data, 'id');
        } catch (\Exception $exception) {
            throw new AppException($exception->getMessage());
        }
    }

    /**
     * @param array $relations
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(array $relations = [], int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->model->orderByDesc('id');
        if (!empty($relations)) {
            $query->with($relations);
        }

        return $query->paginate($perPage)->withQueryString();
    }
}