@extends('template')

@section('title')
    Panda Lifestyle | Your Posts
@endsection

@section('main_content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/profile.css')}}">

<div class="adsImage center-align">
    <a target="_blank" href="http://goodlifecrewmanila.co"><img id="imgRand" src="img/ads/ads30.png"></a> 
</div>

<h2 class="center-align">Your Posts</h2>

<div class="right-align">
  <b><a href="{{url('articles/create')}}">Create New Post  <i class="medium material-icons">border_color</i></a></b>
</div>

<div class="row">
    @foreach($articles as $article)
    @if (Auth::user()->id == $article->user_id)
    <ul class="center-align">
        <li>
          <div class="col s12 m6 l6">
            <div class="card">
              <div class="card-image">
                <img class="artImage" src="/{{ $article->image }}">
                
              </div>

              <div class="card-content sidebar-meta">
                <span class="card-title"><h5 class="animated bounceInRight"><a href='{{url("articles/$article->id")}}'> {{ $article->title }} </a></h5></span>
                <span class="time" ><i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}</span>  
                <span class="comment"><i class="fa fa-comment"></i> {{$article->comment->count()}}</span>
              </div>

              <div class="card-action center-align">
                <a href='{{url("profile/$article->id/delete")}}'><i class="small material-icons">delete_forever</i></a>

                <a href='{{url("articles/$article->id/edit")}}'><i class="small material-icons">create</i></a>
              </div>
            </div>
          </div>
        </li>
        
    </ul>
    @endif
  @endforeach
  {{$articles->links()}}
</div>

<script type="text/javascript">
  
  var numRand = Math.floor(Math.random()*4)+1;
  document.getElementById("imgRand").src = "img/ads/ads3"+numRand+".png";

</script>

@endsection	

