<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Survey</title>
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{url('css/media.css')}}" />
    <link rel="stylesheet" type="text/css" href="{!! url('Validation/validation.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('alerts/notiflix-2.4.0.min.css')!!}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet" />

    <style>
        p {
            text-align: center;
        }



        @keyframes bugfix {
            from {
                padding: 0;
            }

            to {
                padding: 0;
            }
        }

        @-webkit-keyframes bugfix {
            from {
                padding: 0;
            }

            to {
                padding: 0;
            }
        }

        .sidepanel {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #02162b;
            overflow-x: hidden;
            padding-top: 80px;
            transition: 0.5s;
        }

        /* The sidepanel links */
        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 14px;
            color: #ffffff;
            border-bottom: 1px dashed;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidepanel a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style the button that is used to open the sidepanel */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #012954;
            color: white;
            padding: 10px 15px;
            border: none;
            position: absolute;
            top: -44px;
            right: 0px;
        }

        .openbtn:hover {
            background-color: #012954;
            border: 0px !important;
            outline: 0px;
        }

        .border-bottom-none {
            border-bottom: none !important;
        }

        .positionmobile {
            position: absolute;
            top: 18px;
            width: 100%;
            left: 20px;
        }

        .sidepanel a i {
            font-size: 12px;
            margin-right: 12px;
        }
    </style>
    <!--Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script type="text/javascript" src="{!!url('alerts/notiflix-2.4.0.min.js')!!}"></script>
    <script type="text/javascript" src="{!!url('alerts/confirm.js')!!}"></script>
    <script type="text/javascript" src="{!!url('js/keyvalidation.js')!!}"></script>
    <script type="text/javascript" src="{!!url('js/master.js')!!}"></script>
    <script type="text/javascript" src="{!!url('js/jquery-3.5.1.min.js')!!}"></script>
</head>

<body>
    <div class="row w-100 headerlogo">
        <div id="" class="col-sm-10 ">
            <div class="logosection">

                <span class="logosection">{{isset($mainTitle)?$mainTitle:'Survey'}}</span>
                <!-- <img src="{{url('img/logo.png')}}" alt="" /> -->
            </div>
        </div>

        <div class="col-sm-2 drpdwn desc-menu">
            @if(Auth::guard('admin')->check() || Auth::check())
            <button class="openbtn" onclick="openNav()">&#9776;</button>
            @endif
            <!--
              <div id="mySidepanel" class="sidepanel"> -->
            <ul class="menu d-none">
                <li>
                    <!-- First Tier Drop Down -->
                    <label for="drop-1" class="toggle"></label>
                    <a href="javascript:void(0);"><i class="fas fa-ellipsis-h"></i></a>
                    <input type="checkbox" id="drop-1">
                    <ul class="ul-mobile">
                        @if(Auth::guard('admin')->check())
                        <li><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'surveyor' )
                        <li><a href="{{route('surveyor.store.data')}}"><i class="fas fa-plus"></i> Add Survey </a>
                        </li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'agent' )
                        <li><a href="{{route('agent.store.data')}}"><i class="fas fa-plus"></i> Add Booth Data</a></li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'parshad' )
                        <li><a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @endif
                    </ul>
                </li>
                <li>
            </ul>
            <!-- </div> -->
        </div>
    </div>
    <div id="mySidepanel" class="sidepanel">

        <span class="logosection positionmobile">Election Survey</span>
        <a href="javascript:void(0)" class="closebtn border-bottom-none" onclick="closeNav()">&times;</a>
        <!-- <ul class="ul-mobile"> -->
        @if(Auth::guard('admin')->check())
        <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        @elseif(Auth::check() && Auth::user()->type == 'surveyor' )
        <a href="{{route('surveyor.store.data')}}"><i class="fas fa-plus"></i> Add Survey </a>

        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        @elseif(Auth::check() && Auth::user()->type == 'agent' )
        <a href="{{route('agent.store.data')}}"><i class="fas fa-plus"></i> Add Booth Data</a>
        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        @elseif(Auth::check() && Auth::user()->type == 'parshad' )
        <a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        @endif
        <!-- </ul> -->
    </div>
    <section>
        @yield('content')
    </section>
    <script>
        Notiflix.Loading.Circle();
        $(document).ready(function(){
            Notiflix.Loading.Remove();
        });
        function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
    </script>
    <script type="text/javascript" src="{!!url('Validation/validation.js')!!}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        Notiflix.Notify.Init({
            width: '350px',
            fontSize: '15px',
            timeout: 8000,
            position:'center-bottom',
        });
        @if(session()-> has('error'))
        Notiflix.Notify.Failure("{{ session()->get('error')}}");
        @endif
        @if(session()-> has('info'))
        Notiflix.Notify.Info("{{ session()->get('info')}}");
        @endif
        @if(session()-> has('success'))
        Notiflix.Notify.Success("{{ session()->get('success')}}");
        @endif
        @if(session()-> has('warning'))
        Notiflix.Notify.Warning("{{ session()->get('warning')}}");
        @endif
        @if($errors-> any())
        @foreach($errors-> all() as $error)
        Notiflix.Notify.Failure("{{ $error }}");
        @endforeach
        @endif
    });
    </script>
</body>
<!-- <div class="col-sm-2 drpdwn desc-menu">
        <button class="openbtn" onclick="openNav()">&#9776; Toggle Sidepanel</button>
            <ul class="menu">
                <li>

                    <label for="drop-1" class="toggle"></label>
                    <a href="javascript:void(0);"><i class="fas fa-ellipsis-h"></i></a>
                    <input type="checkbox" id="drop-1">
                    <ul class="ul-mobile">
                        @if(Auth::guard('admin')->check())
                        <li><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'surveyor' )
                        <li><a href="{{route('surveyor.store.data')}}"><i class="fas fa-plus"></i> Add Survey </a>
                        </li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'agent' )
                        <li><a href="{{route('agent.store.data')}}"><i class="fas fa-plus"></i> Add Booth Data</a></li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @elseif(Auth::check() && Auth::user()->type == 'parshad' )
                        <li><a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        @endif
                    </ul>
                </li>
                <li>
            </ul>
        </div> -->

</html>
