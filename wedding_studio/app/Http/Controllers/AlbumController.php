<?php

namespace App\Http\Controllers;

use App\Repositories\AlbumReponsitory;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    private $albumReponsitory;
    public function __construct(AlbumReponsitory $albumReponsitory)
    {
        $this->albumReponsitory = $albumReponsitory;
    }
    public function index()
    {
        $albums = $this->albumReponsitory->all();
        return view("admin.albums",compact('albums'));
    }

    public function create(Request $request)
    {
        $requests = $request->all();
        $album = $this->albumReponsitory->add($requests);
        return response()->json($album);
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
