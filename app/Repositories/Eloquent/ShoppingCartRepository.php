<?php 
namespace App\Repositories\Eloquent;

use App\Models\ShoppingCart;
use App\Repositories\ShoppingCartRepositoryInterface;

class ShoppingCartRepository extends BaseRepository implements ShoppingCartRepositoryInterface
{
    public function __construct(ShoppingCart $model)
    {
        parent::__construct($model);
    } 
}