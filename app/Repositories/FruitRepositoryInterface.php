<?php
namespace App\Repositories;

use PhpParser\Builder\Interface_;

interface FruitRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchFruit(string $data);
}