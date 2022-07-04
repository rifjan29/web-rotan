<?php

namespace App\Http\Controllers;

use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class KategoriBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  KategoriBlog::all();
        return view('pages.kategori-blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategori-blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_kategori' => 'required|unique:kategori_blog,kategori_blog',
        ]);
        try {
            $slug = \Str::slug($request->name_kategori);
            $addData = new KategoriBlog;
            $addData->kategori_blog = $request->name_kategori;
            $addData->slug_kategori = $slug;
            $addData->save();
            return redirect()->route('kategori-blog.index')->withStatus('Berhasil menambah data');
        }  catch(\Exception $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
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
        $data = KategoriBlog::findOrFail($id);
        return view('pages.kategori-blog.edit',compact('data'));
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
        $request->validate([
            'name_kategori' => 'required',
        ]);
        try {
            $slug = \Str::slug($request->name_kategori);
            $addData = KategoriBlog::find($id);
            $addData->kategori_blog = $request->name_kategori;
            $addData->slug_kategori = $slug;
            $addData->save();
            return redirect()->route('kategori-blog.index')->withStatus('Berhasil menambah data');
        }  catch(\Exception $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = KategoriBlog::find($id);
        try{
            $deleteData->delete();
            return redirect()->route('kategori-blog.index')->withStatus('Berhasil menghapus data.');

        }  catch(\Exception $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }
}
