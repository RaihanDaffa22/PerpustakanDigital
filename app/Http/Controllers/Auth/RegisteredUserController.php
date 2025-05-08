<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $this->cekEmail($request->email);
        if($user->role == 'anggota'){
            return redirect('register')->with('gagal', 'Hubungi Admin!.');        
        }
        $user->status = 'success';
        $user->save();

        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login')->with('sukses', 'Berhasil Register, Admin Akan Melakukan Verifikasi Akun Anda.');
    }

    private function cekEmail($email)
    {
        if(strpos($email, '@admin.com') !== false){
            return 'admin';
        }else{
            return 'anggota';
        }
    }
}
