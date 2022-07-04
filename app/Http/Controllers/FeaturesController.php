<?php

namespace App\Http\Controllers;

use App\Models\MasterFeatures;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterFeatures::all();
        return view('pages.master-features.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master-features.create');
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
            'title_features' => 'required',
            'desc' => 'required',
        ],[
            'required' => ':attribute harus terisi.'
        ]);
        try {
            $addData = new MasterFeatures;
            $addData->title = $request->title_features;
            $addData->desc = $request->desc;
            $addData->save();
            return redirect()->route('master-features.index')->withStatus('Berhasil menambah data.');
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
        $data =  MasterFeatures::findOrFail($id);
        return view('pages.master-features.edit',compact('data'));
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
            'title_features' => 'required',
            'desc' => 'required',
        ],[
            'required' => ':attribute harus terisi.'
        ]);
        try {
            $addData = MasterFeatures::find($id);
            $addData->title = $request->title_features;
            $addData->desc = $request->desc;
            $addData->save();
            return redirect()->route('master-features.index')->withStatus('Berhasil menambah data.');
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
        $deletData = MasterFeatures::find($id);
        try {
            $deletData->delete();
            return redirect()->route('master-features.index')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }
}
