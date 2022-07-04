<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\KategoriBlog;
use Exception;
use Illuminate\Http\Request;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::select('blog.id','blog.id_kategori_blog','blog.title','blog.photos','blog.desc','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori')
                    ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                    ->get();
        return view('pages.blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = KategoriBlog::all();
        return view('pages.blog.create',compact('data'));
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
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'id_kategori' => 'required',
            'title' => 'required|unique:blog,title',
            'deskripsi' => 'required'
        ],[
            'required' => ':attribute harus terisi.'
        ]);

        try {
            $slug = \Str::slug($request->title);
            $newBlog = new Blog;
            // $newBlog->photos =  $request->gambar;
            $newBlog->id_kategori_blog = $request->id_kategori;
            $newBlog->title = $request->title;
            $newBlog->slug = $slug;
            $newBlog->desc = $request->deskripsi;

            $gambar_blog = $request->file('gambar');
            $filename = date('His').'.'.$request->file('gambar')->extension();

            if ($gambar_blog->move('images/blog',$filename)) {
                $newBlog->photos = $filename;
            }

            $newBlog->save();


            return redirect()->route('blog.index')->withStatus('Berhasil menyimpan data.');
        }
        catch(\Exception $e){
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
        $data_kategori = KategoriBlog::all();
        $data = Blog::find($id);
        return view('pages.blog.edit',compact('data','data_kategori'));
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
            'gambar' => 'image|mimes:jpeg,jpg,png',
            'id_kategori' => 'required',
            'title' => 'required',
            'deskripsi' => 'required'
        ],[
            'required' => ':attribute harus terisi.'
        ]);

        try {
            $slug = \Str::slug($request->title);
            $updateData = Blog::find($id);
            // $updateData->photos =  $request->gambar;
            $updateData->id_kategori_blog = $request->id_kategori;
            $updateData->title = $request->title;
            $updateData->slug = $slug;
            $updateData->desc = $request->deskripsi;

            $gambar_blog = $request->file('gambar');
            if (isset($gambar_blog) ) {
                $last_path = public_path().'/images/blog/'.$updateData->photos;
                // return $last_path;
                unlink($last_path);
                $filename = date('His').'.'.$request->file('gambar')->extension();

                if ($gambar_blog->move('images/blog',$filename)) {
                    $updateData->photos = $filename;
                }
            }

            $updateData->save();


            return redirect()->route('blog.index')->withStatus('Berhasil menyimpan data.');
        }
        catch(\Exception $e){
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
        try {
            // return $id;
            $deleteBlog = Blog::find($id);

            $image_path = public_path().'/images/blog/'.$deleteBlog->photos;

            if (File::delete($image_path)) {
                $deleteBlog->delete();
            }

            return redirect()->route('blog.index')->withStatus('Berhasil menghapus data.');

        } catch (Exception $e ) {
            return redirect()->back()->withError('Terdapat kesalahan');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan');

        }
    }
}
