<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\MasterHome;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::select('blog.id','blog.id_kategori_blog','blog.title','blog.slug','blog.photos','blog.desc','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori','kategori_blog.slug_kategori')
                    ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                    ->get();
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();

        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();

        $blogLain = Blog::select('blog.id as id_blog','blog.id_kategori_blog','blog.title','blog.slug','blog.photos','blog.desc','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori','kategori_blog.slug_kategori')
                        ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                        ->orderBy('blog.id','DESC')
                        ->get();
        $dataKategori = Kategori::all();
        // $dataGroup = $blogLain->groupBy('id_kategori_blog');
        // return $blogLain;
        return view('blog.index',compact('data','masterBeranda','dataUser', 'blogLain','dataKategori'));
    }
    public function detail($slug)
    {
        $blogLain = Blog::select('blog.id','blog.id_kategori_blog','blog.title','blog.slug','blog.photos','blog.desc','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori','kategori_blog.slug_kategori')
                        ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                        ->orderBy('id','DESC')
                        ->get();
        $data = Blog::select('blog.id','blog.id_kategori_blog','blog.title','blog.slug','blog.photos','blog.desc','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori','kategori_blog.slug_kategori')
                    ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                    ->where('blog.slug',$slug)
                    ->first();
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();
        $dataKategori = Kategori::all();
        return view('blog.detail',compact('data','masterBeranda','blogLain','dataUser','dataKategori'));
    }
}
