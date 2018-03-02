<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Auth;
use Input;
use Validator;
use Redirect;
use View;
use App\User;

class ProfileController extends Controller
{
    function showProfile() {
  
   	return view('profile');
   }

   public function showIndex()
    {
        $articles = Article::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('profile' , compact('articles'));
    }

   function delete($id) {
   $article = Article::find($id);
   $article->delete();

   return redirect()->back();
   }

   function createForm() {
   $categories = Category::all();
   return view('articles/articles_create', compact('categories'));
   }

}
