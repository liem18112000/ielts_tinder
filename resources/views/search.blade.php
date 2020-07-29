@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesSearch.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection



@section('content')
    <div class="content">
        <span class="row SearchTool">
            <div class="col-2 Icon">
                <a href=""> <i class="fas fa-search"></i></a>
            </div>
            <div class="col-8 inputBar">
                <input type="text" placeholder="Searching">
            </div>
        </span>
        <div class="category row">
            <div class="col-2 sharp">
                <span id="sharp">#</span>
            </div>
            <div class="col-10">
                <span id="category">Pet</span>
            </div>
        </div>
        <div class="row listVideo">
            <div class="col-2"></div>
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
        <div class="category row">
            <div class="col-2 sharp">
                <span id="sharp">#</span>
            </div>
            <div class="col-10">
                <span id="category">Family</span>
            </div>
        </div>
        <div class="row listVideo">
            <div class="col-2 "></div>
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
        <div class="category row">
            <div class="col-2 sharp">
                <span id="sharp">#</span>
            </div>
            <div class="col-10">
                <span id="category">Environment</span>
            </div>
        </div>
        <div class="row listVideo">
            <div class="col-2"></div>
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
        <div class="category row">
            <div class="col-2 sharp">
                <span id="sharp">#</span>
            </div>
            <div class="col-10">
                <span id="category">Environment</span>
            </div>
        </div>
        <div class="row listVideo">
            <div class="col-2"></div>
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
        <div class="icon">
            <div class="row align-items-center">
                <div class="col">
                    <a href="#"> <img id="iconNewsfeed" src="{{asset('image/iconNewsfeed.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <a href="{{route('search')}}"> <img id="iconSearch" src="{{asset('image/icon_search.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <div class="backgroundRound">
                        <a href="{{route('home')}}"> <img class="icon_Room" src="{{asset('image/iconRoom.png')}}"></a>
                    </div>
                </div>
                <div class="col">
                    <a href="{{route('notify.index')}}"> <img id="iconNoti" src="{{asset('image/notification.png')}}" alt=""></a>
                </div>
                <div class="col">
                    <a href="{{route('profile.show', Auth::user()->id)}}"> <img id="iconProfile" src="{{asset('image/icon_profile.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="backgroundBar"></div>
    </div>
@endsection



@section('scripts')

@endsection
