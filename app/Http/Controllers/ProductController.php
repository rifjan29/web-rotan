<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use File;
use App\Models\Product;
use App\Models\Kategori;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        $this->param['data'] = Product::all();
       return view('pages.produk.index',$this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['data'] = Kategori::all();
        return view('pages.produk.create',$this->param);
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
                'nama' => 'required|unique:product,name',
                'deskripsi' => 'required'
            ],[
                'required' => ':attribute harus terisi.'
            ]);

        try {
            $slug = \Str::slug($request->nama);
            $newProduct = new Product;
            // $newProduct->photos =  $request->gambar;
            $newProduct->id_kategori_product = $request->id_kategori;
            $newProduct->name = $request->nama;
            $newProduct->slug = $slug;
            $newProduct->desc = $request->deskripsi;

            $gambar_product = $request->file('gambar');
            $filename = date('His').'.'.$request->file('gambar')->extension();

            if ($gambar_product->move('images/product',$filename)) {
                $newProduct->photos = $filename;
            }

            $newProduct->save();


            return redirect()->route('produk.index')->withStatus('Berhasil menyimpan data.');
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
        $data = Product::findOrFail($id);
        $dataKategori = Kategori::all();
        return view('pages.produk.edit',compact('data','dataKategori'));

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
            'nama' => 'required',
            'deskripsi' => 'required'
        ],[
            'required' => ':attribute harus terisi.'
        ]);
        // return $request;

        try {
            $updateData = Product::find($id);
            // $updateData->photos =  $request->gambar;
            $updateData->id_kategori_product = $request->id_kategori;
            $updateData->name = $request->nama;
            $updateData->desc = $request->deskripsi;

            $gambar_product = $request->file('gambar');
            if (isset($gambar_product) ) {
                $last_path = public_path().'/images/product/'.$updateData->photos;
                // return $last_path;
                unlink($last_path);
                $filename = date('His').'.'.$request->file('gambar')->extension();

                if ($gambar_product->move('images/product',$filename)) {
                    $updateData->photos = $filename;
                }
            }
            $updateData->save();

            // return $updateData;

            return redirect()->route('produk.index')->withStatus('Berhasil menyimpan data.');
        }
        catch(\Exception $e){
            // return $e;
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan');
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
            $deleteProduct = Product::find($id);

            $image_path = public_path().'/images/product/'.$deleteProduct->photos;

            if (File::delete($image_path)) {
                $deleteProduct->delete();
            }

            return redirect()->route('produk.index')->withStatus('Berhasil menghapus data.');

        } catch (Exception $e ) {
            return redirect()->back()->withError('Terdapat kesalahan');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan');

        }
    }
}
