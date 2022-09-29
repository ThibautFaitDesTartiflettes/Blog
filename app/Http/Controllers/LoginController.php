<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function dashboard(Request $request)
    {
        if (Auth::check()) {

            $posts = Post::orderBy('created_at', 'desc')->get();
            $categories = Category::all();

            if ($request->query('id') != null) {
                $selectedPost = Post::find($request->query('id'));
            } else {
                $selectedPost = $posts->first();
            }

            return view('dashboard', compact('categories', 'posts', 'selectedPost'));
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
