<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\MasterFeatures;
use App\Models\MasterHome;
use App\Models\OurtTeams;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();
        $masterFeatures = MasterFeatures::select('*') ->orderBy('id','DESC')->limit(3)->get();
        $dataProduk = Product::select('product.name','product.photos','product.photos','product.slug','product.desc')
                      ->orderBy('id','DESC')
                      ->limit(3)
                      ->get();
        $data = Blog::select('blog.id','blog.id_kategori_blog','blog.title','blog.slug','blog.photos','blog.desc','blog.created_at','kategori_blog.id as id_kategori','kategori_blog.kategori_blog as name_kategori','kategori_blog.slug_kategori')
                      ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                      ->limit(3)
                      ->get();
        $dataKategori = Kategori::all();
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();
        return view('welcome',compact('masterBeranda','masterFeatures','dataProduk','dataUser','data','dataKategori'));
    }
    public function ourTeams()
    {
        $data = OurtTeams::all();
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();
        $dataKategori = Kategori::all();
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();

        return view('our-teams.index',compact('data','masterBeranda','dataKategori','dataUser'));
    }
}
