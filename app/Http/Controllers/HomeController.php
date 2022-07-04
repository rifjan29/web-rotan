<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Kategori;
use App\Models\MasterHome;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterHome::all();
        return view('pages.master-beranda.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master-beranda.create');
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
            'title_header' => 'required',
            'desc_header' => 'required',
            'desc_about' => 'required',
            'desc_features' => 'required',
            'desc_contact' => 'required',
            'desc_teams' => 'required',
        ]);
        try {
            $addData = new MasterHome;
            $addData->title_header = $request->title_header;
            $addData->desc_header = $request->desc_header;
            $addData->desc_about = $request->desc_about;
            $addData->desc_features  = $request->desc_features;
            $addData->desc_product = $request->desc_product;
            $addData->desc_blog = $request->desc_blog;
            $addData->desc_contact = $request->desc_contact;
            $addData->desc_teams = $request->desc_teams;
            $addData->status = '0';
            $addData->save();

            return redirect()->route('master-beranda.index')->withStatus('Berhasil menambah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
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
        $data = MasterHome::findOrFail($id);
        return view('pages.master-beranda.edit',compact('data'));
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
            'title_header' => 'required',
            'desc_header' => 'required',
            'desc_about' => 'required',
            'desc_features' => 'required',
            'desc_product' => 'required',
            'desc_contact' => 'required',
            'desc_teams' => 'required',
        ]);
        try {
            $updateData = MasterHome::find($id);
            $updateData->title_header = $request->title_header;
            $updateData->desc_header = $request->desc_header;
            $updateData->desc_about = $request->desc_about;
            $updateData->desc_features  = $request->desc_features;
            $updateData->desc_product = $request->desc_product;
            $updateData->desc_blog = $request->desc_blog;
            $updateData->desc_contact = $request->desc_contact;
            $updateData->desc_teams = $request->desc_teams;
            $updateData->save();

            return redirect()->route('master-beranda.index')->withStatus('Berhasil menambah data.');

        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
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
        $deleteData = MasterHome::find($id);
        try {
            $deleteData->delete();
            return redirect()->route('master-beranda.index')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }

    // view Dashboard
    public function Dashboard()
    {
        $dataProduk = Product::count();
        $dataKategori = Kategori::count();
        $dataContact = Contact::count();
        return view('dashboard', compact('dataProduk','dataKategori','dataContact'));
    }
    public function Status($id)
    {
        $data = MasterHome::find($id);
        if ($data->status == '0') {
            $data->status = '1';
            $data->update();
        }else{
            $data->status = '0';
            $data->update();

        }
        return redirect()->route('master-beranda.index')->withStatus('Berhasil mengganti status.');
    }
}
