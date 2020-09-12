@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesSearch.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection



@section('content')
    <div class="content">

        <div class="container-fluid" style='padding-bottom: 15%'>

            <span class="row SearchTool">
                <div class="col-2 Icon">
                    <a href=""> <i class="fas fa-search"></i></a>
                </div>
                <div class="col-8 inputBar">
                    <input type="text" placeholder="Searching">
                </div>
            </span>
    <div class="centered">
            <div class="dropdown">
        <button class="dropbtn">Accent</button>
        <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        </div>
        </div>
        <div class="dropdown">
        <button class="dropbtn">Sex</button>
        <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        </div>
        </div>
        <div class="dropdown">
        <button class="dropbtn">Age</button>
        <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        </div>
        </div>
        <div class="dropdown">
        <button class="dropbtn">Time</button>
        <div class="dropdown-content">
        <a href="#">Newest </a>
        <a href="#">Oldest</a>

        </div>
        </div>
    </div>

            @for($i = 0; $i < 10; $i++)
            <div class="category row">
                <div class="col-1 sharp">
                    <span id="sharp">#</span>
                </div>
                <div class="col-11">
                    <span id="category">Pet</span>
                </div>
            </div>
            <div class="row listVideo">
                <div class="col-1"></div>
                <div class="col-re-3">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item multimedia"
                            src="https://www.youtube.com/embed/lHJN6IO6jYI"></iframe>
                    </div>
                </div>
                <div class="col-re-3">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lHJN6IO6jYI"></iframe>
                    </div>
                </div>
                <div class="col-re-3">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lHJN6IO6jYI"></iframe>
                    </div>
                </div>
                <div class="col-re-3">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lHJN6IO6jYI"></iframe>
                    </div>
                </div>
            </div>
            @endfor

        </div>

        <div class="icon">
            <div class="row align-items-center">
                <div class="col">
                    <a href="{{route('feeds.index')}}"> <img class="iconNewsfeed" src="{{asset('image/iconNewsfeed.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <a href="{{route('search')}}"> <img class="iconSearch" src="{{asset('image/icon_search.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <div class="backgroundRound">
                        <a href="{{route('home')}}"> <img class="icon_Room" src="{{asset('image/iconRoom.png')}}"></a>
                    </div>
                </div>
                <div class="col">
                    <a href="{{route('notify.index')}}"> <img class="iconNoti" src="{{asset('image/notification.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <a href="{{route('profile.show', Auth::user()->id)}}"> <img class="iconProfile" src="{{asset('image/icon_profile.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="backgroundBar"></div>
    </div>
@endsection



@section('scripts')

@endsection
