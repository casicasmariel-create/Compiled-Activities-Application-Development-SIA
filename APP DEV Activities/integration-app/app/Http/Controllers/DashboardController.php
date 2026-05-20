<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
      $posts = Cache::remember('posts', 60, function () {

        $response = Http::get('https://dummyjson.com/quotes');

            if ($response->failed()) {
                return [];
            }

            return $response->json()['quotes'];
        });

        // Local users
        $users = User::where('name', 'like', '%' . request('search') . '%')->get();

        return view('dashboard', compact('posts', 'users'));
    }
}