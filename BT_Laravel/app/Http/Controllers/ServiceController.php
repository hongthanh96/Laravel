<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Services;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();

        return view('services.index',compact('services'));
    }
    public function store(){
        $data = request()->validate([
            'title' => 'required|min:3'
        ]);
        // Service::create($data);
        $service = new Service();
        $service->title = request('title');
        $service->save();

        return redirect()->back();
    }
}
