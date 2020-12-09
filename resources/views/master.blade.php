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

        #overlay-button {
            position: absolute;
            right: 2em;
            top: 3em;
            padding: 26px 11px;
            z-index: 5;
            cursor: pointer;
            user-select: none;

            span {
                height: 4px;
                width: 35px;
                border-radius: 2px;
                background-color: white;
                position: relative;
                display: block;
                transition: all .2s ease-in-out;

                &:before {
                    top: -10px;
                    visibility: visible;
                }

                &:after {
                    top: 10px;
                }

                &:before,
                &:after {
                    height: 4px;
                    width: 35px;
                    border-radius: 2px;
                    background-color: white;
                    position: absolute;
                    content: "";
                    transition: all .2s ease-in-out;
                }
            }

            &:hover span,
            &:hover span:before,
            &:hover span:after {
                background: #333332;
            }
        }

        input[type=checkbox] {
            display: none;
        }

        input[type=checkbox]:checked~#overlay {
            visibility: visible;
        }

        input[type=checkbox]:checked~#overlay-button {

            &:hover span,
            span {
                background: transparent;
            }

            span {
                &:before {
                    transform: rotate(45deg) translate(7px, 7px);
                    opacity: 1;
                }

                &:after {
                    transform: rotate(-45deg) translate(7px, -7px);
                }
            }
        }

        #overlay {
            height: 100vh;
            width: 100vw;
            background: #ec6451;
            z-index: 2;
            visibility: hidden;
            position: fixed;

            &.active {
                visibility: visible;
            }

            ul {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                text-align: center;
                height: 100vh;
                padding-left: 0;
                list-style-type: none;

                li {
                    padding: 1em;

                    a {
                        color: white;
                        text-decoration: none;
                        font-size: 1.5em;

                        &:hover {
                            color: #333332;
                        }
                    }
                }
            }
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

</head>

<body>
    <div class="row w-100 headerlogo">
        <div id="" class="col-sm-10 ">
            <div class="logosection">
                <img src="{{url('img/logo.png')}}" alt="" />
            </div>
        </div>
        <div class="col-sm-2 drpdwn desc-menu d-none">
            <ul class="menu">
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

        </div>
    </div>
    <div class="mobile-menu">
        <input type="checkbox" id="overlay-input" />
        <label for="overlay-input" id="overlay-button"><span></span></label>
        <div id="overlay">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <section>
        @yield('content')
    </section>
    <script type="text/javascript" src="{!!url('Validation/validation.js')!!}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
         Notiflix.Notify.Init({width:'350px',fontSize:'15px',timeout:8000,});
        @if (session()->has('error'))
            Notiflix.Notify.Failure("{{ session()->get('error') }}");
        @endif
        @if (session()->has('info'))
            Notiflix.Notify.Info("{{ session()->get('info') }}");
        @endif
        @if (session()->has('success'))
            Notiflix.Notify.Success("{{ session()->get('success') }}");
        @endif
        @if (session()->has('warning'))
            Notiflix.Notify.Warning("{{ session()->get('warning') }}");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Notiflix.Notify.Failure("{{ $error }}");
            @endforeach
        @endif
    });
    </script>
</body>

</html>
