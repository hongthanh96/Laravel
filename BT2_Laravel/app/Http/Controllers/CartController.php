<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AjaxaddCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
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
        return response()->json('Thêm vào giỏ hàng thành công!');
        // return view('products.cart', compact('ListProductCart'));
        // return response()->json($ListProductCart);
    }

    public function DisplayCart()
    {
        $ListProductCart = Session::get('cart');
        return view('products.cart', compact('ListProductCart'));
    }

    public function delCart(Request $request)
    {
        $id = $request->id;
        $ListProductCart = $request->session()->get('cart');
        foreach ($ListProductCart as $key => $value) {
            if ($id == $value->id) {
                $request->session()->forget('cart.' . $key);
            }
        }
        return response()->json('Xóa sp thành công!');
    }

    public function updateCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $product = Product::find($id);
        $ListProductCart = Session::get('cart');
        $sumTotal = 0;
        foreach ($ListProductCart as $value) {
            if ($product['id'] == $value['id']) {
                // $ListProductCart[$key]->qty = $qty;
                $value['qty'] = $qty;
                $total = $value['price'] * $qty;
            }
        }
        $ListProductCart = Session::get('cart');
        foreach ($ListProductCart  as $val) {
            $sumTotal += $val['qty'] * $val["price"];
        }


        return response()->json([$qty, $total, $sumTotal]);
    }
}
