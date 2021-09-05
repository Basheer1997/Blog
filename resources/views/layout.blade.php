<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('home.css') }}">




</head>
<body>
    <div id="body">
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">

            <ul class="sidebar-nav">
                <img src="https://i1.wp.com/anamusafer.com/wp-content/uploads/2021/01/%D9%85%D8%A7-%D9%87%D9%88-%D8%B9%D9%84%D9%85-%D8%AF%D9%88%D9%84%D8%A9-%D9%81%D9%84%D8%B3%D8%B7%D9%8A%D9%86.jpg?fit=963%2C705&ssl=1" alt="">

             {{--    <li class="sidebar-brand">
                    <a href="#">
                        Start Blog
                    </a>
                </li> --}}
                @guest


                <li>
                    <a href="{{route('login')}}" style="font-size:20px;font-family:  initial">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" style="font-size:20px;font-family:  initial">Register</a>
                </li>
                @endguest
                @auth


                <li>
                    <a href="{{route('index')}}" style="font-size:20px;font-family:  initial">Dashboard</a>
                </li>
                @if(Auth::user()->is_admin)
                <li>
                    <a href="/admin/posts" style="font-size:20px;font-family:  initial">Posts</a>
                </li>
                @endif
                @if(!Auth::user()->is_admin)
                <li>
                    <a href="/user/posts" style="font-size:20px;font-family:  initial">Posts</a>
                </li>
                @endif
                <li>
                    <a href="{{route('category.index')}}" style="font-size:20px;font-family:  initial">Categories</a>
                </li>

                <li>
                    <a href="{{route('tag.index')}}" style="font-size:20px;font-family:  initial">Tags</a>
                </li>
             {{--    <li>
                    <a href="#">Comments</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li> --}}
              {{--   <li>
                    <a href="#">Contact us</a>
                </li> --}}
                <li>
                    <a href="{{route('loggingout')}}" style="font-size:20px;font-family:  initial">Logout</a>


                </li>
                @endauth
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        @yield('content')

    </div>
    <!-- /#wrapper -->



</body>
</html>
