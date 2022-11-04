<?php 
namespace App\Repositories\Eloquent;

use App\Repositories\FruitRepositoryInterface;
use App\Models\Fruit;

class FruitRepository extends BaseRepository implements FruitRepositoryInterface
{
    public function __construct(Fruit $model)
    {
        parent::__construct($model);
    }
}