<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    // return the welcome user page
    public function index()
    {
        //
        $products = Product::paginate(3);
        return view('home.index')->with([
            'products' => $products,
        ]);
    }

    // navigate user to different views based on their usertype
    public function redirect()
    {

        if (!Auth::user()) {
            return route('login');
        }
        $usertype = Auth::user()->usertype;
        $products = Product::paginate(3);
        if ($usertype == 1) {
            return view('admin.home');
        } else
            return view('home.index')->with('products', $products);
    }
}
