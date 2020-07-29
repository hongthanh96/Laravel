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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function AjaxaddCart(Product $product)
    {
        if (!Session::has('cart')) {
            $product->qty = 1;
            Session::put('cart');
            Session::push('cart', $product);
            Session::flash('success', 'Đã thêm vào giỏ hàng thành công!');
        } else {
            $ListProductCart = Session::get('cart');
            $check = true;
            foreach ($ListProductCart as $key => $value) {
                if ($product->id == $value->id) {
                    $ListProductCart[$key]->qty++;
                    Session::put('cart', $ListProductCart);
                    $check = false;
                    break;
                }
            }
            if ($check) {
                $product->qty = 1;
                Session::push('cart', $product);
            }
        }
        $ListProductCart = Session::get('cart');
        // return view('products.cart', compact('ListProductCart'));
        // return response()->json($ListProductCart);
    }

    public function DisplayCart()
    {
        $ListProductCart = Session::get('cart');
        // dd($ListProductCart);
        return view('products.cart', compact('ListProductCart'));
        // return response()->json($ListProductCart);
    }

    public function delCart(Product $product)
    {
        $ListProductCart = Session::get('cart');
        foreach ($ListProductCart as $key => $value) {
            if ($product->id == $value->id) {
                unset($ListProductCart[$key]);
                Session::put('cart', $ListProductCart);
                break;
            }
        }
        return view('products.cart', compact('ListProductCart'));
    }

    public function updateCart(Product $product)
    {
        $ListProductCart = Session::get('cart');
        $qty = request()->qty;
        if ($qty == 0) {
            foreach ($ListProductCart as $key => $value) {
                if ($product->id == $value->id) {
                    unset($ListProductCart[$key]);
                    Session::put('cart', $ListProductCart);
                    break;
                }
            }
        } else {
            foreach ($ListProductCart as $key => $value) {
                if ($product->id == $value->id) {
                    $ListProductCart[$key]->qty = $qty;
                    Session::put('cart', $ListProductCart);
                }
            }
        }

        return view('products.cart', compact('ListProductCart'));
    }
}
