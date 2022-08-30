<?php
namespace App\Repositories;

interface EloquentInterface
{
    public function list();

    public function create(array $data);

    public function done($id);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}
?>