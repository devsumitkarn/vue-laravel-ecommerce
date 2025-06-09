<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        Product::create($data);
        return redirect()->route('products.index')->with('status', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $product->update($data);
        return redirect()->route('products.index')->with('status', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product deleted successfully!');
    }

    public function statusChecked(Request $request)
    {
        $product = Product::find($request->product);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $status = filter_var($request->input('status'), FILTER_VALIDATE_BOOLEAN);
        $product->status = !$status;
        $product->save();

        return response()->json(['status' => $product->status]);
    }
}
