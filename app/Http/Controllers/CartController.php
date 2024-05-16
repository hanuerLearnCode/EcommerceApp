<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    const CART_SESSION = "CART";

    public function addToCart(Request $request, string $id)
    {
        // get the target product and the update quantity
        $productQuantity = $request['quantity'];
        $product = Product::where('id', $id)->get();

        // check if the session from the request has a cart
        // if yes
        if ($request->session()->get(self::CART_SESSION)) {
            // get that cart
            $cart = $request->session()->get(self::CART_SESSION);
            // a flag - if the product is in cart
            $isFound = false;
            // loop thr the cart to check if the target product is in cart
            for ($i = 0; $i < count($cart); $i++) {
                // look for the id
                if ($id == $cart[$i]['product'][$i]->id) {
                    $cart[$i]['quantity'] += 1;
                    $isFound = true;
                    break;
                }
            }
            // if not
            if (!$isFound) {
                // add to the cart
                array_push($cart, [
                    'product' => $product,
                    'quantity' => $productQuantity
                ]);
            }

            // update the session
            $request->session()->put(self::CART_SESSION, $cart);
        } // if no
        else {
            // initialize a empty cart
            $cart = [];
            array_push($cart, [
                'product' => $product,
                'quantity' => 1
            ]);
            $request->session()->put(self::CART_SESSION, $cart);
        }
        return response()->json(['msg' => 'Add item success', 'cart' => $cart], 200);
    }
}
