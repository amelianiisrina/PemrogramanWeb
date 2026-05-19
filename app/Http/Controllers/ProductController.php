<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        Product::create([
            'name' => 'Keyboard',
            'price' => 250000,
            'description' => 'Keyboard mechanical'
        ]);
    }

    public function update($id)
    {
        $product = Product::find($id);
        $product->update([
            'price' => 300000
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}