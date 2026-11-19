<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalArticles = Article::count();

        $myArticles = Article::where('user_id', $user->id)->count();

        $latestArticles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('pages.dashboard', [
            'user' => $user,
            'totalArticles' => $totalArticles,
            'myArticles' => $myArticles,
            'latestArticles' => $latestArticles,
        ]);
    }
}
