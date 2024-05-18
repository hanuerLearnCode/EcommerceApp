<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    const CART_SESSION = 'CART';

    public function buy(string $product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('home.order.place')->with(['product' => $product]);
    }

    public function completeCheckout(Request $request, string $productId)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::beginTransaction();

        // update user address
        $user = Auth::user();
        if (isset($data['address'])) {
            $user->address = $data['address'];
            $user->save();
        }

        // update product quantity
        $product = Product::findOrFail($productId);
        if ($product->quantity >= $data['product_quantity']) {
            $product->quantity = $product->quantity - $data['product_quantity'];
            $product->save();
        }

        // create order and orderItem
        try {

            $order = new Order();
            $order->user_id = $user->id;
            $order->total_price = $data['total_price'];
            $order->save();

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->product_quantity = $data['product_quantity'];
            $orderItem->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()]);
        }

        return response()->json(['done' => "done", 'order' => $order, 'orderItem' => $orderItem]);
    }

    //
    public function makeOrder(Request $request)
    {
        $user = Auth::user();
        $cart = $request->session()->get(self::CART_SESSION);
        dd($cart);
    }

}
