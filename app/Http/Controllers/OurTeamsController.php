<?php

namespace App\Http\Controllers;

use App\Models\OurtTeams;
use Exception;
use Illuminate\Http\Request;
use File;
class OurTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OurtTeams::all();
        return view('pages.our-teams.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.our-teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'nama' => 'required',
            'title' => 'required',
            'motivasi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg'
        ]);
        try {

            $newData = new OurtTeams;
            $newData->name = $request->nama;
            $newData->title = $request->title;
            $newData->desc = $request->motivasi;

            $gambar_profile = $request->file('gambar');
            $filename = date('His').'.'.$request->file('gambar')->extension();

            if ($gambar_profile->move('images/our-teams',$filename)) {
                $newData->photos = $filename;
            }

            $newData->save();
            return redirect()->route('our-teams.index')->withStatus('Berhasil menyimpan data.');

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
        $data = OurtTeams::findOrFail($id);
        return view('pages.our-teams.edit',compact('data'));
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
            'title' => 'required',
            'motivasi' => 'required',
            'gambar' => 'image|mimes:png,jpg'
        ]);
        try {

            $updateData = OurtTeams::find($id);
            $updateData->name = $request->nama;
            $updateData->title = $request->title;
            $updateData->desc = $request->motivasi;

            $gambar_profile = $request->file('gambar');
            if (isset($gambar_profile) ) {
                $last_path = public_path().'/images/our-teams/'.$updateData->photos;
                // return $last_path;
                unlink($last_path);
                $filename = date('His').'.'.$request->file('gambar')->extension();

                if ($gambar_profile->move('images/our-teams',$filename)) {
                    $updateData->photos = $filename;
                }
            }

            $updateData->save();
            return redirect()->route('our-teams.index')->withStatus('Berhasil menyimpan data.');

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
            $deleteTeams = OurtTeams::find($id);

            $image_path = public_path().'/images/our-teams/'.$deleteTeams->photos;

            if (File::delete($image_path)) {
                $deleteTeams->delete();
            }

            return redirect()->route('our-teams.index')->withStatus('Berhasil menghapus data.');

        } catch (Exception $e ) {
            return redirect()->back()->withError('Terdapat kesalahan');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan');

        }
    }
}
