<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller implements iCRUD
{
    //
    public function index()
    {
        // get all the categories from the db
        $categories = Category::all();
        // return -> with
        return view('admin.category.main')->with('categories', $categories);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function doAdd(Request $request)
    {
        try {
            unset($request['_token']);
            $new_category = $request->all();
            Category::create($new_category);
            $categories = Category::all();
            $success = "New Category Created";
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }
        return redirect('/categories')->with([
            'categories' => $categories,
            'success' => $success,
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit')->with(['id' => $id, 'category' => $category, 'categories' => $categories]);
    }

    public function doEdit(Request $request, string $id)
    {
        unset($request['_token']);
        try {
            Category::where('id', '=', $id)->update($request->all());
            $success = "Category Updated";
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }
        return redirect('/categories')->with([
            'success' => $success,
        ]);
    }

    public function delete($id)
    {
        try {
            Category::find($id)->delete();
            $success = "Category Deleted";
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }
        return redirect('/categories')->with([
            'success' => $success,
        ]);
    }
}
