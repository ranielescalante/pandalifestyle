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

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   function showArticles() {
      // $articles = Article::user()->articles;
    $articles = Article::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();

    $categories = Category::all();

   	return view('articles/articles_list_home', compact('articles', 'categories'));
   }

   function showArticleLinks() {
    $links = Article::orderBy('created_at', 'desc')->take(15)->paginate(5);
    return view('articles/articles_list_home', compact('links'));
   }

   function showCategory(Request $request, $id) {

    if($id == 0) {
      $articles = Article::orderBy('created_at', 'desc')->get()->take(15);
    }
    else{
      $articles = Article::where('category_id', $id)->get();
    }

    foreach ($articles as $article) {
      $currentUser = Auth::user()->id;
      $date = $article->created_at->diffForHumans();
      $data[] = ['title' => $article->title, 'image' => $article->image, 'created_at' => $date, 'name' => $article->user->name, 'categoryName' => $article->category->category_name,'id' => $article->id, 'userId' => $article->user_id, 'currentUser' => $currentUser]; 
    }

    return response()->json($data);

  }

   function createForm() {
   $categories = Category::all();
   return view('articles/articles_create', compact('categories'));
   }

   function show($id) {
   	$article = Article::find($id);
    $article->viewcounter +=1;
    $article->save();
   	return view('articles/single_article', compact('article'));
   }

   function store(Request $request) {
   	$new_article = new Article();
   	$new_article->title = $request->title;
   	$new_article->content = $request->content;
    $new_article->user_id = Auth::user()->id;
    $new_article->category_id = $request->category;
    $file = $request->file('image');
    $file->move('storage/', $file->getClientOriginalName());
    $new_article->image='storage/'.$file->getClientOriginalName();
   	$new_article->save();

   	return redirect('/articles');
   }

   function delete($id) {
   $article = Article::find($id);
   $article->delete();

   // return redirect('/articles');
   return redirect()->back();
   }

   function editForm($id) {
   	$article = Article::find($id);
    $categories = Category::all();
   	return view('articles/articles_edit', compact('article','categories'));
   }

   function update(Request $request, $id) {
   	$article = Article::find($id);
   	$article->title = $request->title;
   	$article->content = $request->content;
    $article->category_id = $request->category;;
    $file = $request->file('image');
    $file->move('storage/', $file->getClientOriginalName());
    $article->image='storage/'.$file->getClientOriginalName();
   	$article->save();

   	return redirect("/articles/$id");
   }

}
