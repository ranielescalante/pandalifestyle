@extends('template')

@section('title')
    Panda Lifestyle | Articles
@endsection

@section('main_content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/list.css')}}">
<div class="container">
   
    <h3>List of Articles</h3>
    <a href="{{ url('articles/create') }}"><button class="btn">Create a new Article</button></a>
    <div class="row">
    	<div class="col s12 m6 l8">
            <select name="category" id="select_cat">
                <option value="0">All</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach 
                
            </select>

		    <ul class="collection"></ul>
            
    	</div>

	<div class="col s12 m6 l4">
        <div class="row">
            <div class="sidebar widget">
                <a href='{{url("profile")}}'><h4>Your Posts</h4></a>
                @foreach($articles as $article)
                @if (Auth::user()->id == $article->user_id)
                <ul>
                    <li>
                        <div class="sidebar-thumb">
                            <img src="/{{ $article->image }}">
                        </div>

                        <div class="sidebar-content">
                            <h5 class="animated bounceInRight"><a href='{{url("articles/$article->id")}}'> {{ $article->title }} </a></h5>
                        </div>
                        <div class="sidebar-meta">
                        	<span>{{$article->user->name}}</span><br>
                            <span class="time" ><i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}</span>
                            <span class="comment"><i class="fa fa-comment"></i> {{$article->comment->count()}}</span>
                        </div>
                    </li>
                </ul>
                @endif
              @endforeach
            </div>

            <div class="adsImage center-align">
                <a target="_blank" href="http://goodlifecrewmanila.co"><img id="imgRand" src="img/ads/ads0.png"></a> 
            </div>
        </div>
    </div>

    <div class="adsImage2 center-align">
        <a target="_blank" href="http://goodlifecrewmanila.co"><img id="imgRand2" src="img/ads/ads20.png"></a> 
    </div>

    <script type="text/javascript">
         $(document).ready(function(){
            function getAll(){
                var id = $(this).find(":selected").val();
                $.ajax({
                    
                    type: 'POST',
                    url: '/articles/'+id+'/show',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id : id
                    },
                     success: function(response){
                        $('.collection > li').remove();
                       response.forEach(function(data){
                        if(data.currentUser == data.userId){
                                $('.collection').append('<li class="collection-item avatar"><div class="sidebar-thumb"><img src="'+data.image+'" alt="" class="circle"></div><span class="title"><a href="/articles/'+data.id+'"> '+data.title+'</a></span><br><div class="divContent"><span>'+data.name+'</span><br><span>'+data.categoryName+'</span><br><span>'+data.created_at+'</span><br></div><div id="trashBtn"><a href="/articles/'+data.id+'/delete"><i class="small material-icons">delete_forever</i></a></div></li>');
                            }else{
                                $('.collection').append('<li class="collection-item avatar"><div class="sidebar-thumb"><img src="'+data.image+'" alt="" class="circle"></div><span class="title"><a href="/articles/'+data.id+'"> '+data.title+'</a></span><br><div class="divContent"><span>'+data.name+'</span><br><span>'+data.categoryName+'</span><br><span>'+data.created_at+'</span></div></li>');
                            }
                        }) 
                    }   
                });
            }
            getAll();
            $('#select_cat').change(function(){
                var id = $(this).find(":selected").val();
                $.ajax({
                    type: 'POST',
                    url: '/articles/'+id+'/show',
                    data: {
                    _token: "{{ csrf_token() }}",
                    id : id
                    },
                     success: function(response){
                        $('.collection > li').remove();
                       response.forEach(function(data){
                            if(data.currentUser == data.userId){
                                $('.collection').append('<li class="collection-item avatar"><div class="sidebar-thumb"><img src="'+data.image+'" alt="" class="circle"></div><span class="title"><a href="/articles/'+data.id+'"> '+data.title+'</a></span><br><div class="divContent"><span>'+data.name+'</span><br><span>'+data.categoryName+'</span><br><span>'+data.created_at+'</span><br></div><div id="trashBtn"><a href="/articles/'+data.id+'/delete"><i class="small material-icons">delete_forever</i></a></div></li>');
                            }else{
                                $('.collection').append('<li class="collection-item avatar"><div class="sidebar-thumb"><img src="'+data.image+'" alt="" class="circle"></div><span class="title"><a href="/articles/'+data.id+'"> '+data.title+'</a></span><br><span>'+data.name+'</span><span>'+data.categoryName+'</span><span>'+data.created_at+'</span></li>');
                            }
                        }) 
                    }   
                });
            });
        });

        var numRand = Math.floor(Math.random()*4)+1;
        document.getElementById("imgRand").src = "img/ads/ads"+numRand+".png";
        document.getElementById("imgRand2").src = "img/ads/ads2"+numRand+".png";
        
    </script>

@endsection
