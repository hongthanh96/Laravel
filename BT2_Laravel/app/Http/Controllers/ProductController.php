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
        $ListProductCart = Session::get('cart');
        return view('products.index', compact('products', 'ListProductCart'));
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
    public function productAdmin()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    public function create(Request $request)
    {   $product = new Product;
        $product->id = $request->id;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return response()->json($product);
    }

    public function store(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function destroy(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Đã xóa sản phẩm $product->name");
    }

    public function edit(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->id = $request->id;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return response()->json($product);


    }
}
