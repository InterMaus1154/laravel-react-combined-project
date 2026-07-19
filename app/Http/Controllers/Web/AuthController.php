<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function renderLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = Validator::make($request->only(['username', 'password']), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ])
            ->validated();

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->to('/');
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(['auth' => 'Invalid credentials']);
    }

    public function renderRegister(): View
    {
        return '';
    }

}
