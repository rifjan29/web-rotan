<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        // return view('pages.kategori.index');
        try {
            $this->param['kategori'] = Kategori::all();

            return view('pages.kategori.index',$this->param);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategori.create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ],[
            'required' => ':attribute harus terisi.'
        ]);

        try {
            $slug = \Str::slug($request->nama);
            $newKategori = new Kategori;
            $newKategori->name = $request->nama;
            $newKategori->slug = $slug;
            $newKategori->desc = $request->deskripsi;
            $newKategori->save();

            return redirect()->route('kategori.index')->withStatus('Berhasil menyimpan data.');
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
        $data = Kategori::findOrFail($id);
        return view('pages.kategori.edit',compact('data'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        try {
            $slug = \Str::slug($request->nama);

            $updateData = Kategori::find($id);
            $updateData->name = $request->nama;
            $updateData->slug = $slug;
            $updateData->desc = $request->deskripsi;
            $updateData->save();

            return redirect()->route('kategori.index')->withStatus('Berhasil menyimpan data.');
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

            $deleteProduct = Kategori::find($id);
            $deleteProduct->delete();


            return redirect()->route('kategori.index')->withStatus('Berhasil menghapus data.');
        } catch (Exception $e ) {
            return redirect()->back()->withErrors('Terdapat kesalahan.');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Terdapat kesalahan.');

        }
    }
}
