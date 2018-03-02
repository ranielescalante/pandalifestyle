@extends('template')

@section('title')
    Panda Lifestyle | Create Article
@endsection

@section('main_content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/create.css')}}">
<div class="container">
   <h1 class="center-align">New Article</h1>
	<form method="POST" enctype="multipart/form-data">
		<input type="hidden" value="{{ csrf_token() }}" name="_token">
		<input type="file" name="image" id="file" required>max of 2mb
	    <select name="category">
			@foreach($categories as $category)
		      <option value="{{$category->id}}">{{$category->category_name}}</option>
		    @endforeach 
	    </select>
	
		Title: <input type="text" name="title"><br>
		Content: <textarea name="content" class="articleckeditor"></textarea><br>
		<div class="PostBtn center-align">
			<input type="submit" name="Submit" class="btn" value="Post">
		</div>
	</form>

@endsection