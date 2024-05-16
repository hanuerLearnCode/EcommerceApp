<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    const CART_SESSION = "CART";

    public function showCart(Request $request)
    {
        $cart = $request->session()->get(self::CART_SESSION);
        return view('home.cart')->with([
            'cart' => $cart,
        ]);
    }

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
                if ($id == $cart[$i]['product'][0]->id) {
                    $cart[$i]['quantity'] += $productQuantity;
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
                'quantity' => $productQuantity
            ]);
            $request->session()->put(self::CART_SESSION, $cart);
        }
        $success = 'Add item to cart successfully!';
        return redirect('/redirect')->with(['cart' => $cart, 'success' => $success]);
    }

    public function increase(Request $request, string $id)
    {
        $cart = $request->session()->get(self::CART_SESSION);
        for ($i = 0; $i < count($cart); $i++) {
            // look for the id
            if ($id == $cart[$i]['product'][0]->id) {
                $cart[$i]['quantity'] += 1;
                break;
            }
        }
        $request->session()->put(self::CART_SESSION, $cart);
        return redirect()->back()->with(['success' => 'Item increased']);
    }

    public function decrease(Request $request, string $id)
    {
        $cart = $request->session()->get(self::CART_SESSION, []);
        $cartItemIndex = null;
        foreach ($cart as $index => $item) {
            if ($item['product'][0]['id'] == $id) {
                $cartItemIndex = $index;
                break;
            }
        }
        if ($cartItemIndex !== null) {
            if ($cart[$cartItemIndex]['quantity'] > 1) {
                $cart[$cartItemIndex]['quantity']--;
            } else {
                unset($cart[$cartItemIndex]);
            }
        }
        $request->session()->put(self::CART_SESSION, array_values($cart));
        return redirect()->back()->with(['success' => 'Item decreased', 'cart' => $cart]);
    }

    public function deleteFromCart(Request $request, string $id)
    {
        $cart = $request->session()->get(self::CART_SESSION);
        $cartClc = collect($cart);
        $cart = $cartClc->filter(function ($item) use ($id) {
            return $item['product'][0]->id != $id || $item['quantity'] > 0;
        });
        $cart = collect($cart->values());
        $request->session()->put(self::CART_SESSION, $cart->toArray());
        $success = 'Delete item successfully!';
        return redirect()->back()->with(['cart' => $cart, 'success' => $success]);
    }
}
