<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        // get all the categories from the db
        $categories = Category::all();
        // return -> with
        return view('admin.category.main')->with('categories', $categories);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit')->with(['category'=> $category, 'categories' => $categories]);
    }
}
