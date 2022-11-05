<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ShoppingCartRepositoryInterface;
use App\Repositories\ShoppingCartDetailRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ShoppingCartService
{
    protected $shoppingCartRepository;
    protected $orderRepository;
    protected $shoppingCartDetailRepository;

    public function __construct(
        ShoppingCartRepositoryInterface $shoppingCartRepository,
        ShoppingCartDetailRepositoryInterface $shoppingCartDetailRepository,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->shoppingCartDetailRepository = $shoppingCartDetailRepository;
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->orderRepository = $orderRepository;
    }

    public function create(array $data)
    {

        $order = $this->orderRepository->create([
            'user_id' => Auth::user()->id,
            'date' => date('y-m-d h:i:s'),
            'address' => $data['address'],
            'total_bill' => 0
        ]);
        $shoppingCart = $this->shoppingCartRepository->create([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id
        ]);
        return $shoppingCart;
        
    }
}