<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.profile.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',

        ],[
            'required' => ':attribute harus terisi.'
        ]);
        try {
            $editProfile = User::find($id);
            $editProfile->name = $request->nama;
            $editProfile->email = $request->email;
            $editProfile->no_hp = $request->no_hp;
            $editProfile->instagram = $request->instagram;
            $editProfile->facebook = $request->facebook;
            $editProfile->twitter = $request->twitter;
            $editProfile->update();

            return redirect()->back()->withStatus('Berhasil edit profile');

        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }
    // update password
    public function UpdatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmed' => 'required|same:password',
        ]);
        try {
            $updatePassword = User::find($id);
            $updatePassword->password = Hash::make($request->password_confirmed);
            $updatePassword->update();
            return redirect()->back()->withStatus('Berhasil mengganti password');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Terdapat kesalahan.');
        } catch (QueryException $e){
            return redirect()->back()->withError('Terdapat kesalahan.');
        }
    }
}
