<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return response()->json("Product Created");
    }

    public function show($id)
    {
        $product = Product::find($id);
        return new ProductResource($product);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->validated());
        return response()->json("Product Updated");
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json("Product Deleted");
    }
}
