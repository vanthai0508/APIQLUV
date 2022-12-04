<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ShoppingCartRepositoryInterface;
use App\Repositories\ShoppingCartDetailRepositoryInterface;
use App\Repositories\FruitRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

class ShoppingCartDetailService
{
    protected $shoppingCartRepository;
    protected $orderRepository;
    protected $shoppingCartDetailRepository;
    protected $fruitRepository;
    protected $shoppingCartService;

    public function __construct(
        ShoppingCartRepositoryInterface $shoppingCartRepository,
        ShoppingCartDetailRepositoryInterface $shoppingCartDetailRepository,
        OrderRepositoryInterface $orderRepository,
        FruitRepositoryInterface $fruitRepository,
        ShoppingCartService $shoppingCartService
    )
    {
        $this->shoppingCartDetailRepository = $shoppingCartDetailRepository;
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->orderRepository = $orderRepository;
        $this->fruitRepository = $fruitRepository;
        $this->shoppingCartService = $shoppingCartService;
    }

    public function addFruitCart($data)
    {
        try {
            
            $user = Auth::user();
            $listOrder = $user->Order;
            $result = null;
            foreach($listOrder as $order) {
                if($order['status'] == 2) {
                    $result = $order;
                }
            }
            if($result == null) {
                $shoppingCart = $this->shoppingCartService->create($data);
                $this->shoppingCartDetailRepository->create([
                'shopping_cart_id' => $shoppingCart['id'],
                'fruit_id' => $data['fruit_id'],
                'quantity' => $data['quantity']
                ]);
                $fruit = $this->fruitRepository->find($data['fruit_id']);
                $order = $this->orderRepository->find($shoppingCart->order_id);
                $total = $fruit->price * $data['quantity'];
                $result = $order->total_bill + $total;
                $this->orderRepository->update($order->id,[
                    'total_bill' => $result
                ]);
                return $shoppingCart->ShoppingCartDetail;
            } else {
                $shoppingCart = $result->shoppingCart;
                $this->shoppingCartDetailRepository->create([
                    'shopping_cart_id' => $shoppingCart['id'],
                    'fruit_id' => $data['fruit_id'],
                    'quantity' => $data['quantity']
                    ]);
                $fruit = $this->fruitRepository->find($data['fruit_id']);
                $order = $this->orderRepository->find($shoppingCart->order_id);
                $total = $fruit->price * $data['quantity'];
                $result = $order->total_bill + $total;
                $this->orderRepository->update($order->id,[
                    'total_bill' => $result
                ]);
                return $shoppingCart->ShoppingCartDetail;
            }
           
        } catch(Exception $e) {
            return null;
        }
    }
    
    public function updateFruitCart($data)
    {
        $cart = $this->shoppingCartRepository->find($data['id']);
        $listFruitOfCart = $cart->shoppingCartDetail;
        $result = null;
        foreach($listFruitOfCart as $shoppingCartDetail) {
            if($shoppingCartDetail['fruit_id'] == $data['fruit_id']) {
                $result = $shoppingCartDetail;
                $this->shoppingCartDetailRepository->update($shoppingCartDetail['id'], [
                    'quantity' => $data['quantity']
                ]);
                break;
            }
        }
        $fruit = $this->fruitRepository->find($data['fruit_id']);
        $order = $this->orderRepository->find($cart['order_id']);
        $total = $fruit->price * $data['quantity'];
        $effect = $result['quantity'] * $fruit->price;
        $bill = $order->total_bill + $total - $effect;
        return $this->orderRepository->update($order->id,[
                    'total_bill' => $bill
                ]);
    }
}