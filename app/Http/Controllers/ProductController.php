<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller implements iCRUD
{
    //

    public function index()
    {
        // TODO: Implement index() method.
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    public function add()
    {
        // TODO: Implement add() method.
        $categories = Category::all();
        $sales = Sale::all();
        return view('admin.product.add')->with(['categories' => $categories, 'sales' => $sales]);
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
//        dd($request->all());
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['_token']);

            // get the images
            $images = $data['image'];

            // unset the img from the data
            unset($data['image']);

            // create new product with the data
            $product = Product::create($data);

            // add image to storage and db
            foreach ($images as $image) {
                $imageName = time() . $image->getClientOriginalName();
                $image->storeAs('/product', $imageName, 'public');
                $img = new Image();
                $img->path = '/storage/product/' . $imageName;
                $img->imageable_id = $product->id;
                $img->imageable_type = Product::class;
                $img->save();
            }

            $success = "Product added";
            $products = Product::all();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }
        return view('admin.product.index')->with(['success' => $success, 'products' => $products]);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $categories = Category::all();
        $sales = Sale::all();
        $product = Product::find($id);
        return view('admin.product.edit')->with(['categories' => $categories, 'sales' => $sales, 'product' => $product]);
    }

    public function doEdit(Request $request, string $id)
    {
        // TODO: Implement doEdit() method.
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['_token']);
            $product = Product::find($id);
            if (isset($data['image'])) {
                // get the images
                $images = $data['image'];
                // unset the img from the data
                unset($data['image']);
                foreach ($images as $image) {
                    $imageName = time() . $image->getClientOriginalName();
                    $image->storeAs('/product', $imageName, 'public');
                    $img = new Image();
                    $img->path = '/storage/product/' . $imageName;
                    $img->imageable_id = $product->id;
                    $img->imageable_type = Product::class;
                    $img->save();
                }
            }
            $product->update($data);
            $success = "Product updated";
            $products = Product::all();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = $e->getMessage();
            return redirect()->back()->with('error', $error);
        }
        return redirect('/products')->with([
            'success' => $success, 'products' => $products,
        ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->delete();
            DB::commit();
        } catch (\Exception $e) {
            $error = $e->getMessage();
            DB::rollBack();
            return redirect()->back()->with('error', $error);
        }
        return redirect('/products')->with('success', "Product deleted");
    }

    public function showProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $category_id = $product->category_id;
        $category = Category::find($category_id);
        $sale = Sale::find($product->sale_id);
        return view('home.product-details')->with([
            'product' => $product,
            'category' => $category,
            'sale' => $sale,
        ]);
    }
}
