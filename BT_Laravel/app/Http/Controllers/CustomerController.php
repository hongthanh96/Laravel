<?php
    namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;
    class CustomerController extends Controller{
        public function index(){
            $customers = Customer::all();
            return view('customer.index',compact('customers'));
        }

        public function create(){
            $cities = City::all();
            return view('customer.create',compact('cities'));
        }

        public function store(){
            $data = request()->validate([
                'name' => 'required|min:2',
                'dob' => 'required',
                'email' => 'required|email',
                'city_id' =>'required',
            ]);
            Customer::create($data);
            $mess = "<script>alert('Đã thêm thành công!')</script>";
            return redirect()->route('customer.index')->with('status',$mess);
        }
        public function edit(Customer $customer){
            $cities = City::all();
            return view('customer.edit',compact('customer','cities'));
        }

        public function update(Customer $customer){
            $data = request()->validate([
                'name' => 'required|min:2',
                'dob' => 'required',
                'email' => 'required|email',
                'city_id' =>'required',
            ]);
            $customer->update($data);
            return redirect()->route('customer.index');
        }
        public function show(Customer $customer){
            return view('customer.show',compact('customer'));
        }
        public function destroy(Customer $customer){
            $customer->delete();
            return redirect()->route('customer.index');
        }
    }
?>
