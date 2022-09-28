<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        if (Auth::check()) {

            $categories = Category::all();

            return view('dashboard', compact('categories'));
        } else {
            return redirect()->route('login');
        }
    }

    public function connect(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
            return redirect()->route('Admin');
        }
        else {
            return back()->with('refused', 'Identifiant ou mot de passe incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('posts.index');
    }
}
