<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Repositories\ServiceReponsitory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class ServiceController extends Controller
{
    private $serviceReponsitory;
    public function __construct(ServiceReponsitory $serviceReponsitory)
    {
        $this->serviceReponsitory = $serviceReponsitory;
    }
    public function index()
    {
        $services = $this->serviceReponsitory->all();
        return view('admin.services',compact('services'));
    }

    public function create(Request $request)
    {
        $service = New Service;
        $service->id = $request->id;
        $service->name = $request->name;
        $service->save();
        return response()->json($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
