<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $cities = City::all();
        return view('customer.index', compact('customers', 'cities'));
    }

    public function filterByCity(Request $request)
    {

        $idCity = $request->input('city_id');

        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.index', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:2',
            'dob' => 'required',
            'email' => 'required|email',
            'city_id' => 'required',
        ]);
        Customer::create($data);
        Session::flash('success', 'Đã thêm khách hàng thành công!');
        return redirect()->route('customer.index');
    }
    public function edit(Customer $customer)
    {
        $cities = City::all();
        return view('customer.edit', compact('customer', 'cities'));
    }

    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required|min:2',
            'dob' => 'required',
            'email' => 'required|email',
            'city_id' => 'required',
        ]);
        $customer->update($data);
        Session::flash('success', 'Đã cập nhật khách hàng thành công!');
        return redirect()->route('customer.index');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if(!isset($keyword)){
            return redirect()->route('customer.index');
        }
        else{
            $customers = Customer::where('name','LIKE','%'.$keyword.'%');
            $cities = City::all();
            return view('customer.index',compact('customers','cities'));
        }
    }
}
