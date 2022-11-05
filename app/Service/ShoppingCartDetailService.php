<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ShoppingCartRepositoryInterface;
use App\Repositories\ShoppingCartDetailRepositoryInterface;
use App\Repositories\FruitRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ShoppingCartDetailService
{
    protected $shoppingCartRepository;
    protected $orderRepository;
    protected $shoppingCartDetailRepository;
    protected $fruitRepository;

    public function __construct(
        ShoppingCartRepositoryInterface $shoppingCartRepository,
        ShoppingCartDetailRepositoryInterface $shoppingCartDetailRepository,
        OrderRepositoryInterface $orderRepository,
        FruitRepositoryInterface $fruitRepository
    )
    {
        $this->shoppingCartDetailRepository = $shoppingCartDetailRepository;
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->orderRepository = $orderRepository;
        $this->fruitRepository = $fruitRepository;
    }

    public function addFruitCart($data)
    {
        $this->shoppingCartDetailRepository->create([
            'shopping_cart_id' => $data['shopping_cart_id'],
            'fruit_id' => $data['fruit_id'],
            'quantity' => $data['quantity']
        ]);
        $fruit = $this->fruitRepository->find($data['fruit_id']);
        $shoppingCart = $this->shoppingCartRepository->find($data['shopping_cart_id']);
        $order = $this->orderRepository->find($shoppingCart->order_id);
        $total = $fruit->price * $data['quantity'];
        $result = $order->total_bill + $total;
        $this->orderRepository->update($order->id,[
            'total_bill' => $result
        ]);
        return $shoppingCart->ShoppingCartDetail;
    }
}