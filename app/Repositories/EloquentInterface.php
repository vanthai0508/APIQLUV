<?php
namespace App\Repositories;

interface EloquentInterface
{
    public function list();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function find($id);
}
?>