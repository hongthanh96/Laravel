<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Repositories\ServiceReponsitory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceReponsitory;
    public function __construct(ServiceReponsitory $serviceReponsitory)
    {
        $this->serviceReponsitory = $serviceReponsitory;
    }
    public function index()
    {
        // $services = $this->serviceReponsitory->all();
        return view('admin.services');
    }

    public function create(Request $request)
    {
        $service = New Service;
        $service->id = $request->id;
        $service->name = $request->name;
        $this->serviceReponsitory->create($service);
        return response()->json($service);
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $service = $this->serviceReponsitory->findById($id);
        return response()->json($service);

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $service = $this->serviceReponsitory->findById($id);
        $service->name = $request->nameService;
        $service->save();
        return response()->json($service);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $service = $this->serviceReponsitory->delete($id);
        $service->delete();
        return response()->json('đã xóa thành công!');
    }
}
