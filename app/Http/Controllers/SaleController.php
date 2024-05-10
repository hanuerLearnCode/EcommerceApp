<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller implements iCRUD
{
    //
    public function index()
    {
        // TODO: Implement index() method.
        $sales = Sale::all();
        return view('admin.sale.index')->with('sales', $sales);
    }

    public function add()
    {
        // TODO: Implement add() method.
        return view('admin.sale.add');
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        unset($request['_token']);
        try {
            Sale::create($request->all());
            $success = "New sale added!";
        } catch (\Exception $exception) {
            $error = "Failed to add new sale";
            return redirect()->back()->with('error', $error);
        }
        return redirect()->route('sales.index')->with('success', $success);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $sale = Sale::find($id);
        return view('admin.sale.edit')->with(['id' => $id, 'sale' => $sale]);
    }

    public function doEdit(Request $request, string $id)
    {
        // TODO: Implement doEdit() method.
        unset($request['_token']);
        try {
            Sale::where('id', '=', $id)->update($request->all());
            $success = "Update successfully!";
        } catch (\Exception $e) {
            $error = "Failed to update sale! Please try again";
            // log the $e to debug
            return redirect()->back()->with('error', $error);
        }
        return redirect()->route('sales.index')->with('success', $success);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Sale::find($id)->delete();
            $success = "Sale deleted!";
        } catch (\Exception $exception) {
            $error = "Failed to delete!";
            return redirect()->back()->with('error', $error);
        }
        return redirect()->route('sales.index')->with('success', $success);
    }
}
