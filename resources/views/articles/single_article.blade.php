@extends('template')

@section('title')
	Panda Lifestyle | {{$article->title}}
@endsection


@section('content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/single.css')}}">
<link href="https://fonts.googleapis.com/css?family=Reenie+Beanie|Loved+by+the+King" rel="stylesheet" type="text/css">

<div class="row">
	<div class="col s6 m6 l6">
		<a href='{{url($_SERVER['HTTP_REFERER'])}}'><i class="large material-icons">backspace</i></a>Back
	</div>

	<div class="col s6 m6 l6 right-align">
		@if (Auth::user()->id == $article->user_id)
			Edit<a href='{{url("articles/$article->id/edit")}}'><i class="large material-icons">create</i></a>
		@endif
	</div>
</div>

<div style="text-align: center;">
	<h4>{{$article->title}}</h4>
	<h5>{{$article->category->category_name}}</h5>
	<img src="/{{$article->image}}">
</div>
<br>
<div class="artContent">
	<p>{!!$article->content!!}</p>
</div>

<br>

<hr class="style4">

<br>
<div class="container">
	<div class="commentDiv">
		@foreach($article->comment as $comments)
			<div class="panel panel-default row">
				<ul class="collection">
				<li class="collection-item">
				<div class="panel-heading col-sm-12">
				
					<strong><b style="color: #546e7a;">{{$comments->user->name}}</b></strong>
					
					<span class="pull-right">{{$comments->user->updated_at->diffForHumans()}}</span>
						

				</div>
						
				<div class="panel-body">
					{{$comments->comment}}

					@if (Auth::user()->id == $comments->user_id)
					<span class="pull-right"><a href="{{url("/articles/$comments->id/$article->id/deleteComment")}}">Delete</a></span>
					@endif

				</div>
				</li>
			</div>
		
		@endforeach
	</div>
</div>

<div class="row">
	<form class="col s12" method="POST" >
		<div class="row">
			<div class="input-field col s12">
				{{ csrf_field() }}
				<textarea id="textarea1" value="Comments" name="comment"></textarea>
				<label for="textarea1">Comment</label>
				<div class="commentBtn right-align">
					<input type="submit" name="Submit" class="btn btn-success" value="comment">
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

