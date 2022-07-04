<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\MasterHome;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();
        $data = Product::select('product.name','product.id as id_product','product.id_kategori_product','product.photos','product.slug','product.desc','kategori_product.name as name_kategori','kategori_product.slug as slug_kategori','kategori_product.desc','kategori_product.id')
                        ->join('kategori_product','product.id_kategori_product', 'kategori_product.id')
                        ->orderBy('product.id','DESC')
                        ->where('kategori_product.slug',$slug)
                        ->get();
        $dataKategori = Kategori::all();
        return view('product.product',compact('dataUser','masterBeranda','data','dataKategori'));

    }
    public function detail($slug)
    {
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();

        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();

        $detailProduk = Product::select('product.name','product.id as id_product','product.id_kategori_product','product.photos','product.slug','product.desc','kategori_product.name as name_kategori','kategori_product.slug','kategori_product.desc as detail_kategori','kategori_product.id')
                                ->join('kategori_product','product.id_kategori_product', 'kategori_product.id')
                                ->where('product.slug', $slug)
                                ->first();
        $data = Product::select('product.name','product.id as id_product','product.id_kategori_product','product.photos','product.slug','product.desc','kategori_product.name as name_kategori','kategori_product.slug as slug_kategori','kategori_product.desc','kategori_product.id')
                                ->join('kategori_product','product.id_kategori_product', 'kategori_product.id')
                                ->orderBy('product.id','DESC')
                                ->limit(3)
                                ->get();
        $dataKategori = Kategori::all();
                                // return $detailProduk;
        return view('product.detail',compact('detailProduk','data','dataUser','masterBeranda','dataKategori'));
    }
}
