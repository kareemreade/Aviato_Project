<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>not-allowed</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;

        }
        .content{

            width: 60%;

        }
        .content img{
                width: 200px;
        }
        .content a {
            background:#000000;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 7px;
            margin-top: 10px;
            display:inline-block;
        }


    </style>
</head>
<body>

    <div class="content">
        <img src="{{asset('Adminasset/img/padlock.png')}}" alt="" srcset="">
        <h2> You dont have permission to access this page</h2>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Home') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</body>
</html>
