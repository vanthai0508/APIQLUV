<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ShoppingCartRepositoryInterface;
use App\Repositories\ShoppingCartDetailRepositoryInterface;
use App\Repositories\FruitRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

class ShoppingCartService
{
    protected $shoppingCartRepository;
    protected $orderRepository;
    protected $shoppingCartDetailRepository;
    protected $fruitRepository;

    public function __construct(
        FruitRepositoryInterface $fruitRepository,
        ShoppingCartRepositoryInterface $shoppingCartRepository,
        ShoppingCartDetailRepositoryInterface $shoppingCartDetailRepository,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->fruitRepository = $fruitRepository;
        $this->shoppingCartDetailRepository = $shoppingCartDetailRepository;
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->orderRepository = $orderRepository;
    }

    public function create(array $data)
    {
        try {
            $order = $this->orderRepository->create([
                'user_id' => Auth::user()->id,
                'date' => date('y-m-d h:i:s'),
                'address' => null,
                'total_bill' => 0,
                'status' => 2
            ]);
            $shoppingCart = $this->shoppingCartRepository->create([
                'user_id' => Auth::user()->id,
                'order_id' => $order->id
            ]);
            return $shoppingCart;
        } catch(Exception $e) {
            return null;
        }
    }

    public function listFruitOfCart()
    {
        try {
            $user = Auth::user();
            $listOrder = $user->order;
            foreach($listOrder as $order) {
                if($order['status']==2) {
                    $listFruit = $order->ShoppingCart->ShoppingCartDetail;
                    foreach($listFruit as $fruit) {
                        $result = $this->fruitRepository->find($fruit['fruit_id']);
                        $fruit['image_url'] = $result['image_url'];
                        $fruit['price'] = $result['price'];
                        $fruit['fruit_name'] = $result['fruit_name'];
                   }
                    return $listFruit;
                }
            }
            return null;
        } catch(Exception $e) {
            return null;
        }
        
        
    }

}