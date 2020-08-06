<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        return view("admin.albums");
    }
    public function getAlbums()
    {
        $albums = $this->albumReponsitory->all();
        return response()->json($albums);
    }

    public function create(Request $request)
    {
        $requests = $request->all();
        $result = $this->albumReponsitory->add($requests);
        return response()->json($result , 200);
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
