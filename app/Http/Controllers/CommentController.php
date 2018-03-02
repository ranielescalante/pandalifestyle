<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function comment(Request $request, $id) {
   	$new_comment = new Comment();
   	$new_comment->comment = $request->comment;
   	$new_comment->article_id = $id;
    $new_comment->user_id = Auth::user()->id;

   	$new_comment->save();

   	return redirect("/articles/$id");
   }

   function deleteComment($id, $a_id) {
   $article = Comment::find($id);
   $article->delete();

   return redirect("/articles/$a_id");
   }

}
