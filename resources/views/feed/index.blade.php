@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="content">
        <div class='container' style='min-height:90vh'>
            <div class="chamthan_menu">
            <div class="menu">
            <span><a href="{{route('feeds.index')}}" class="linkNewsfeed navlink following">Following</a></span> |
            <span><a href="{{route('feeds.moment')}}" class="linkNewsfeed navlink moments">Hot</a></span>
            </div>

            <div class="chamthan">
                  <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
            </div>
            </div>
            <div class= "boxcurved1">

                <div class="textcurved1">
            <span><a href="{{route('feeds.index')}}" >Speech</a></span> 
            </div>
            </div>
            <div class= "boxcurved2">
                 <div class="textcurved2">
                 <span><a href="{{route('feeds.index')}}" >Sharings</a></span> 
            </div>
            </div>

                <div class="chamthan">
                    <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
                </div>

            </div>

            <div class="row">
                <div class="col-12" style='padding:0'>

                    <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;"
                        href="{{ route('feeds.create')}}" role="button"> <i class="fa fa-plus" aria-hidden="true">
                            Post something now!</i></a>
                </div>
            </div>

            <hr/>

            @foreach($feeds as $feed)
            <div class="row status-1">
                <div class="col-2" style='padding:0; margin:0'>
                    <img style='border-radius: 50%' src="{{$feed->user->profile->profile_image}}" alt="avatar" class="avatar">
                </div>
                <div class="col-10">
                    <div class="row username">
                        <a href="">{{$feed->user->name}}</a>
                    </div>
                    <b><h5>{{$feed->title}}</h5></b>
                </div>
            </div>

            <div class="row multimedia mt-2">
                @if($feed->media_type == "video")
                    <video width="100%" height="100%" controls>
                        <source src="{{"storage/media/" . $feed->media}}" type="video/{{$feed->media_ext}}">
                        Your browser does not support the video tag.
                    </video>
                @elseif($feed->media_type == "audio")
                    <img style='object-fit:contain;' width="100%" height="80%" src="{{$feed->user->profile->profile_image}}" alt="media">
                    <audio style='width:100%' height="100%" controls>
                        <source src="{{"storage/media/" . $feed->media}}" type="audio/{{$feed->media_ext}}">
                        Your browser does not support the video tag.
                    </audio>
                @else
                    <img width="100%" height="100%" src="{{"storage/media/" . $feed->media}}" alt="media">
                @endif
            </div>

            <br/>

            @if(Auth::user()->id == $feed->user->id)
            <div class='row' style='margin:0; padding:0'>

                <div class='col-4' style='padding-left:0'>
                    <a class="btn btn-info btn-block" href="{{route('feeds.edit-media', $feed->id)}}" role="button">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"> Media</i>
                    </a>
                </div>

                <div class='col-4' style='padding-left:0;padding-right:0'>
                    <a class="btn btn-warning btn-block" href="{{route('feeds.edit-content', $feed->id)}}" role="button">
                        <i class="fa fa-pencil-square" aria-hidden="true"> Content</i>
                    </a>
                </div>

                <div class='col-4'  style='padding-right:0'>
                    <a class="btn btn-dark btn-block" href="#" role="button">
                        <i class="fa fa-trash-o" aria-hidden="true"> Delete</i>
                    </a>
                </div>
            </div>
            @endif

            <div class='row mt-2'>
                {!!$feed->content!!}
            </div>

            <div class="row interact px-4 mt-2">
                <i class="fas fa-headphones-alt"><span> {{$feed->view_count}}</span></i>
            </div>
            <hr>
            @endforeach
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
