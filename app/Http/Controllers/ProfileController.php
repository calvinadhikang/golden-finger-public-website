<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function view(){
        $user = Session::get('user', null);
        return view('profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request){
        $user = Session::get('user', null);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $telp = $request->input('telp');

        $target = Customer::where('email', '=', $user->email)->first();
        $target->nama = $nama;
        $target->alamat = $alamat;
        $target->telp = $telp;
        $target->save();

        Session::put('user', $target);

        return back()->with([
            'title' => 'Update Berhasil',
            'msg' => 'Berhasil update profile!'
        ]);
    }

    public function updateNPWP(Request $request) {
        $user = Session::get('user', null);

        $target = Customer::where('email', '=', $user->email)->first();
        $target->npwp = $request->input('npwp');
        $target->save();

        // Harus dua kali karena problem
        $target = Customer::where('email', '=', $user->email)->first();
        Session::put('user', $target);

        return back()->with([
            'title' => 'Update Berhasil',
            'msg' => 'Berhasil update NPWP!'
        ]);
    }

    public function updatePassword(Request $request){
        $old = $request->input('old');
        $new = $request->input('new');
        $user = Session::get('user');

        if (Hash::check($old, $user->password)) {

            if (strlen($new) < 8) {
                return back()->withErrors([
                    'msg' => 'Password baru minimal 8 karakter!'
                ]);
            }

            $target = Customer::find($user->id);
            $target->password = Hash::make($new);
            $target->save();

            Session::put('user', $target);

            return back()->with([
                'title' => "Ubah Password Berhasil!",
                'msg' => 'Berhasil mengubah password!'
            ]);
        }else{
            return back()->withErrors([
                'msg' => 'Password lama salah!'
            ]);
        }
    }
}
