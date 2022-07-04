<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Kategori;
use App\Models\MasterHome;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterBeranda = MasterHome::select('*')->orderBy('id','DESC')->where('status','1')->first();
        $dataUser = User::select('users.email','users.no_hp','users.instagram','users.facebook','users.twitter')->first();
        $dataKategori = Kategori::all();
        return view('contact.index',compact('dataUser','masterBeranda','dataKategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:contact',
            'no_hp' => 'required|max:12',
            'subject' => 'required',
            'message' => 'required',
            'check' => 'required',
        ]);
        try {
            $addData = new Contact;
            $addData->firstname = $request->firstname;
            $addData->lastname = $request->lastname;
            $addData->email = $request->email;
            $addData->no_hp = $request->no_hp;
            $addData->subject = $request->subject;
            $addData->message = $request->message;
            $addData->save();
            return redirect()->back()->withStatus('Success send data.');
        } catch(\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Contact::find($id);
        try {
            $deleteData->delete();
            return redirect()->route('data.contact')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }

    // data contact
    public function DataContact()
    {
        $data = Contact::all();
        return view('pages.contact.index',compact('data'));
    }
}
