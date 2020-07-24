<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
        $data = request()->all();
        City::create($data);
       return redirect()->route('cities.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(City $city)
    {
        return view('cities.edit',compact('city'));
    }

    public function update(City $city)
    {
        $data = request()->all();
        $city->update($data);
        return redirect()->route('cities.index');
    }
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
