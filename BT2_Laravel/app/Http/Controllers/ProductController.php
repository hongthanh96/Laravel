<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($product)
    {
        $productKey = 'product_' . $product;
        if (!Session::has($productKey)) {
            Product::where('id', $product)->increment('view_count');
            Session::push($productKey, 1);
        }
        $product = Product::find($product);
        return view('products.show', compact('product'));
    }
}
