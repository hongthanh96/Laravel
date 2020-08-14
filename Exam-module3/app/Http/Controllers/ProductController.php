<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::with('category:id,title')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        return view('ProductManager.index',compact('products','categories'));
    }

    public function active(){

        $products = Product::with('category:id,title')->where('active', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        $categories = Category::all();

        return view('ProductManager.index',compact('products','categories'));
    }

    public function inActive(){

        $products = Product::with('category:id,title')->where('active', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        $categories = Category::all();

        return view('ProductManager.index',compact('products','categories'));
    }

    public function create(ProductRequest $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->active = $request->active;
        $product->id_categories = $request->id_categories;
        $product->save();

        return redirect('/product');
    }

    public function get($id){

        $products = Product::find($id);
        $categories = Category::all();

        return view('ProductManager.editproduct',compact('products','categories'));
    }

    public function edit(ProductRequest $request){
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->active = $request->active;
        $product->id_categories = $request->id_categories;
        $product->update();

        return redirect('/product');
    }

}
