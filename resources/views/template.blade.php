<style type="text/css">
  body {
       display: flex;
       min-height: 100vh;
       flex-direction: column;
   }
   main {
       flex: 1 0 auto;
   }

</style>

<!DOCTYPE html>
<html>
<head>

<link rel="icon" href="{{asset ('img/home/panda2.png')}}">

@include('partials.header')

	<title> @yield('title') </title>

</head>
<body>
@include('partials.navigation')

<main>
	<div>
		@yield('main_content')
		@yield('content')
	</div>
</main>

@include('partials.footer')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.articleckeditor').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
</body>
</html>