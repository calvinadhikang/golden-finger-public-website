<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\HeaderInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm = $request->input('confirm');

        $isRegistered = Customer::where('email', $email)->get();
        if (count($isRegistered) > 0) {
            return back()->withErrors([
                'msg' => 'Email sudah digunakan !'
            ]);
        }else{

            if ($password != $confirm) {
                return back()->withErrors([
                    'msg' => 'Confirm Password dan Password harus sama !'
                ]);
            }

            $new = Customer::create([
                'nama' => $name,
                'alamat' => "",
                'telp' => '',
                'email' => $email,
                'password' => $password,
                'kota' => '',
                'NPWP' => ''
            ]);

            return redirect('/');
        }
    }

    public function login(Request $request){
        Session::flush();
        $email = $request->input('email');

        $found = Customer::withTrashed()->where('email', '=', $email)->first();
        if ($found == null) {
            return back()->withErrors([
                'msg' => 'User tidak ditemukan!'
            ]);
        }
        else{
            Session::put('auth', $found);
            if ($found->password == null) {
                return redirect('/login/setup');
            }else{
                return redirect('/login/password');
            }
        }
    }

    public function loginSetup(Request $request){
        $user = Session::get('auth', null);
        $password = $request->input('password');
        $confirm = $request->input('confirm');

        if ($password != $confirm) {
            return back()->withErrors([
                'msg' => 'Password dan Konfirmasi Password harus sama!'
            ]);
        }else{
            if (strlen($password) < 8) {
                return back()->withErrors([
                    'msg' => 'Password minimal 8 kata'
                ]);
            }else{
                $target = Customer::withTrashed()->where('email', '=', $user->email)->first();
                $target->password = Hash::make($password);
                $target->save();

                Session::flush();
                Session::put('user', $target);

                // count user unpaid_invoice
                $seminggu = Carbon::now()->addDays(7);
                $hasUnpaid = HeaderInvoice::where('customer_id', $target->id)
                    ->whereNull('paid_at')
                    ->whereNotNull('confirmed_by')
                    ->where('jatuh_tempo', '<=', $seminggu)
                    ->count();

                if ($hasUnpaid) {
                    return redirect('/invoice')->withErrors([
                        'msg' => 'Anda memiliki tagihan yang belum dibayar!',
                        'title' => 'Tagihan Belum Dibayar!',
                    ]);
                }

                return redirect('/');
            }
        }
    }

    public function loginPassword(Request $request){
        $user = Session::get('auth', null);
        $password = $request->input('password');

        $target = Customer::withTrashed()->where('email', '=', $user->email)->first();
        if (Hash::check($password, $target->password)) {
            Session::flush();
            Session::put('user', $target);

            // count user unpaid_invoice
            $seminggu = Carbon::now()->addDays(7);
            $hasUnpaid = HeaderInvoice::where('customer_id', $target->id)
                ->whereNull('paid_at')
                ->whereNotNull('confirmed_by')
                ->where('jatuh_tempo', '<=', $seminggu)
                ->count();

            if ($hasUnpaid) {
                return redirect('/invoice')->withErrors([
                    'msg' => 'Anda memiliki tagihan yang belum dibayar!',
                    'title' => 'Tagihan Belum Dibayar!',
                ]);
            }

            return redirect('/');
        }else{
            return back()->withErrors([
                'msg' => 'Password salah!'
            ]);
        }
    }
}
