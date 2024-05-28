<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.login.index');
    }

    public function proccess(Request $request)
    {
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            return back()->with('error', 'Periksa kembali Email dan Password Anda!');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Periksa kembali Email dan Password Anda!');
        }


        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($user->akses == 1) {
                return redirect()->to('/admin/dashboard')->with('success', 'Anda Berhasil Login. Selamat Datang, ' . Auth::user()->nama);
            } elseif ($user->akses == 2) {
                return redirect('/management/dashboard')->with('success', 'Anda Berhasil Login. Selamat Datang, ' . Auth::user()->nama);
            } elseif ($user->akses == 3) {
                return redirect('/user/dashboard')->with('success', 'Anda Berhasil Login. Selamat Datang, ' . Auth::user()->nama);
            }
        }
        return back()->with('error', 'Gagal melakukan autentikasi');
    }
}
