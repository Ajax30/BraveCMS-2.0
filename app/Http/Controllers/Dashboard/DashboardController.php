<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;  
use App\Models\Article;
use App\Models\Comment;
use App\Models\Page;
use App\Models\User;

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
        $publishedToday = Article::whereDate('created_at', Carbon::today())->count();

        return view('dashboard.index', compact('articleCount', 'totalViews', 'publishedToday'));
    }
}
