<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atribute = $request->all();
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $fileName);
            $atribute['image'] = $fileName;
        } else {
            $atribute['image'] = "none.jpg";
        }

        Blog::create($atribute);

        return redirect()->route("blog.index");
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog )
    {
        return view('blog.edit',compact('blog'));
    }

    public function update(Blog $blog ,Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('imagess')) {
            $fileName = time() . '.' . $request->imagess->getClientOriginalExtension();
            $request->imagess->move(public_path('upload'), $fileName);
            $data['image'] = $fileName;
        }else{
            $data['image'] = $blog->image ;
        }
        $blog->update($data);
        return redirect()->route('blog.index');


    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
