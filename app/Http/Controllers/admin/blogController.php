<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::all();
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('blog', 'public');
        Blog::create($data);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!empty($data['foto'])) {
            $data['foto'] = $request->file('foto')->store('blog', 'public');
        } else {
            unset($data['foto']);
        }
        Blog::findOrFail($id)->update($data);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return  redirect('/admin');
    }
}
