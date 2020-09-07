@extends('layouts/appWithoutNavbar');

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed-moment.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="content">
        <div class='container'>
        <div class="chamthan_menu">

            <div class="menu">
                <span><a href="{{route('feeds.index')}}" class="linkNewsfeed navlink following">Following</a></span> |
                <span><a href="{{route('feeds.moment')}}" class="linkNewsfeed navlink moments">Hot</a></span>
            </div>

            <div class="chamthan">
                     <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
         </div>
         
        </div>
        
            @for($i = 0; $i < 5; $i++)

            <div class="row status-1">
                <div class="col-2">
                    <img src="{{asset('image/avatar1.png')}}" alt="avatar" class="avatar">
                </div>
                <div class="col-10">
                    <div class="row username">
                        <div class="col-4">
                            <a href="" class="texxt">Hồ Điệp</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5">
                            <button type="button" id="btn1" class="btnFollow btn-expand-lg">+ FOLLOW</button>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row status">
                        <p>Today I'll talk about my hometown life</p>
                    </div>
                    <div class="multimedia">
                        <iframe src="https://www.youtube.com/embed/wzzOowpCryw" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="interact">
                        <i class="fas fa-headphones-alt"></i><span> 341</span>
                        <i class="far fa-comments"></i> <span>43</span>
                        <i class="far fa-thumbs-up"></i> <span>612</span>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row status-2">
                <div class="col-2">
                    <img src="{{asset('image/avatar2.png')}}" alt="avatar" class="avatar">
                </div>
                <div class="col-10">
                    <div class="row username">
                        <div class="col-4">
                            <a href="" class="texxt">Khả Hân</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5">
                            <button type="button" id="btn2" class="btnFollow btn-expand-lg">+ FOLLOW</button>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row status">
                        <p>What is love ?</p>
                    </div>
                    <div class="multimedia">
                        <iframe width="250" height="200" src="https://www.youtube.com/embed/m-M1AtrxztU" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="interact">
                        <i class="fas fa-headphones-alt"></i><span> 753</span>
                        <i class="far fa-comments"></i> <span>43</span>
                        <i class="far fa-thumbs-up"></i> <span>612</span>
                    </div>
                </div>
            </div>

            <hr>

            @endfor

        </div>
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
                    <a href="{{route('room.index')}}"> <img class="icon_Room" src="{{asset('image/iconRoom.png')}}"></a>
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

    <div class="backgroundBar"></div>
    </div>
@endsection

@section('scripts')

@endsection
