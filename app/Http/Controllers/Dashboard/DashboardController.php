<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;  
use App\Models\Article;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articleCount = Article::count();
        $totalViews = Article::sum('views');
        $publishedToday = Article::whereDate('published_at', Carbon::today())->count();

        return view('dashboard.index', compact('articleCount', 'totalViews', 'publishedToday'));
    }
}
