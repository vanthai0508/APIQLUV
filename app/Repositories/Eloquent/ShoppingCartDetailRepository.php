<?php 
namespace App\Repositories\Eloquent;

use App\Models\ShoppingCartDetail;
use App\Repositories\ShoppingCartDetailRepositoryInterface;

class ShoppingCartDetailRepository extends BaseRepository implements ShoppingCartDetailRepositoryInterface
{
    public function __construct(ShoppingCartDetail $model)
    {
        parent::__construct($model);
    }
}