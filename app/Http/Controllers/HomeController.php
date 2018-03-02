<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use Input;
use Validator;
use Redirect;
use View;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth' );
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get()->take(5);
        $topviews = Article::orderBy('viewcounter', 'desc')->paginate(5);
        return view('home' , compact('articles' , 'topviews'));
    }

    public function showArticle()
    {
        $articles = Article::orderBy('created_at', 'desc')->get()->take(5);
        $topviews = Article::orderBy('viewcounter', 'desc')->paginate(5);
        return view('home' , compact('articles' , 'topviews'));
    }

}


