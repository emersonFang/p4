<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->



    <title>@yield('title')</title>


    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="/css/yolo.css" type='text/css' rel='stylesheet'>
    <!-- per-page styles -->
    @yield('styles')


</head>

<body>
    <header>
        <img
                class="title"
                src="/images/p4_logo.png"
                alt='Yolo App logo'>
    </header>

    <br>

    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <nav>
        <ul>
            @if(Auth::check())
                <li><a href='/'>Home (View Your Landmarks)</a></li>
                <li><a href='/landmarks/all'>View all users' landmarks</a></li>
                <li><a href='/landmarks/create'>Add a landmark</a></li>
                <li><a href='/logout'>Log out {{ $user->name }}</a></li>
            @else
                <li><a href='/'>Home</a></li>
                <li><a href='/landmarks/all'>View all landmarks</a></li>
                <li><a href='/login'>Log in</a></li>
                <li><a href='/register'>Register</a></li>
            @endif
        </ul>
    </nav>

    <section>

    @yield('content')

    </section>


    <footer>
        &copy; {{ date('Y') }}
        {!!" by Emerson Fang"!!}
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>


</html>