@extends('template')

@section('title')
	Panda Lifestyle | Edit Article
@endsection


@section('main_content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/edit.css')}}">

<div class="container center-align">
	<h1>Edit Article</h1>
	<form method="POST" enctype="multipart/form-data">
		<input type="hidden" value="{{ csrf_token() }}" name="_token">
		<input type="file" name="image" id="file" required>

		<select name="category">
			@foreach($categories as $category)
		      <option value="{{$category->id}}">{{$category->category_name}}</option>
		    @endforeach 
	    </select>

		Title: <input type="text" name="title" value="{{$article->title}}"><br>
		Content: <textarea name="content" class="articleckeditor">{{$article->content}}</textarea><br>
		
		<div class="EditBtn center-align">
			<input type="submit" name="Submit" class="btn" value="Edit Post">
		</div>
	</form>
</div>
	
@endsection