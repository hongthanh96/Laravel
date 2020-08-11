<?php

namespace App\Http\Controllers;

// use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUser(){
        $users = $this->userRepository->all();
        return response()->json($users);
    }

    public function index()
    {
        return view('admin.customer');
    }


    public function showUser($id){
        $user = $this->userRepository->findById($id);
        return response()->json($user);
    }

    public function changeAdmin(Request $request, $id){
        $requestAD = $request->all();
        $isAdmin = $this->userRepository->findAdmin($id,$requestAD);
        return response()->json($isAdmin);
    }

    public function changeRole(Request $request, $id){
        $requests = $request->all();
        $role = $this->userRepository->findRole($id,$requests);
        return response()->json($role);
    }

    public function changeBlock(Request $request, $id){
        $requests = $request->all();
        $lock = $this->userRepository->findBlock($id,$requests);
        return response()->json($lock);
    }

    public function create()
    {
        //
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
