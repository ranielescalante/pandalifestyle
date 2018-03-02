@extends('template')

@section('title')
    Panda Lifestyle | Home
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/homestyle.css')}}">
<script type="text/javascript" src="{{asset ('js/homestyle.js')}}"></script>

<div class="center-align" id="headFont">
    <h1>Panda Lifestyle</h1>
</div>

<div id="mainDiv">
    <div class="carousel carousel-slider" data-indicators="true" style="max-height:400px"; >
        <a class="carousel-item responsive-img" href="#one!"><img src="img/home/car1.jpeg"></a>
        <a class="carousel-item responsive-img" href="#two!"><img src="img/home/car2.jpeg"></a>
        <a class="carousel-item responsive-img" href="#two!"><img src="img/home/car3.jpeg"></a>    
        <a class="carousel-item responsive-img" href="#two!"><img src="img/home/car4.jpeg"></a>    
    </div>

    <div class="row">
        <div class="col s12 m6 l8">
            <h2>About this Blog</h2>
            <div class="paraGraph">
                <p> lifestyle typically reflects an individual's attitudes, way of life, values, or world view. Therefore, a lifestyle is a means of forging a sense of self and to create cultural symbols that resonate with personal identity. Not all aspects of a lifestyle are voluntary. Surrounding social and technical systems can constrain the lifestyle choices available to the individual and the symbols we are able to project to others.</p>
                <br>
                <p>Urban culture is the defining theme in which presence of a great number of very different people in a very limited space - most of them are strangers to each other. This makes it possible to build up a vast array of subcultures close to each other, exposed to each other's influence, but without necessarily intruding into people's private lives.
                </p>
                <br>
                <p>This is a blog where in you can share your thoughts, opinions, hobbies and so much more. There is no limit on what you can share to world. This blog can also help other in the latest trends, travel destination and other topics regarding Urban Culture and Lifestyle.</p>
            </div>
            <br>
            <br>
            <hr class="style4">
            
        </div>

    <div class="col s12 m6 l4">
        <div class="row">
                <div class="sidebar widget">
                    <h3>Recent Post</h3>
                    @foreach($articles as $article)
                    <ul>
                        <li>
                            <div class="sidebar-thumb">
                                <img src="/{{ $article->image }}">
                            </div>

                            <div class="sidebar-content">
                                <h5 class="animated bounceInRight"><a href='{{url("articles/$article->id")}}'> {{ $article->title }} </a></h5>
                            </div>
                            <div class="sidebar-meta">
                                <span class="time" ><i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}</span>
                                <span class="comment"><i class="fa fa-comment"></i> {{$article->comment->count()}}</span>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>

                <div class="adsImage center-align">
                    <a target="_blank" href="http://goodlifecrewmanila.co"><img id="imgRand" src="img/ads/ads0.png"></a> 
                </div>
            </div>
        </div> 
    </div>

    <div class="finalCard">
        <h2 class="header center-align">Popular Posts</h2>
        <ul class="collection">
            @foreach($topviews as $topview)
            <li class="collection-item avatar">
                <div>
                    <a href='{{url("articles/$topview->id")}}'><img src="/{{ $topview->image }}" alt="image" class="border-tlr-radius"></a>
                </div>
                <br>
                <div>
                    <span class="title"><a href='{{url("articles/$topview->id")}}'> {{ $topview->title }} </a></span>
                    <br>
                    <span class="time" ><i class="fa fa-clock-o"></i> {{$topview->created_at->diffForHumans()}}</span>
                    <span class="comment"><i class="fa fa-comment"></i> {{$topview->comment->count()}}</span><br>

                    <p>{!! $topview->read_more() !!}</p>
                </div>
                
            </li>
            @endforeach
        </ul>
        {{$topviews->links()}}
    </div>
</div>

@endsection

