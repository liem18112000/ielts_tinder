@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">
        <div class='container'>
            <div class="row">
                <i class="fas fa-info-circle info-icon"></i>
            </div>
            <div class="menu">
                <span><a href="{{route('feeds.index')}}" class="linkNewsfeed navlink following">Following</a></span> |
                <span><a href="{{route('feeds.moment')}}" class="linkNewsfeed navlink moments">Moments</a></span>
            </div>

            @for($i = 0; $i < 5; $i++)
                <div class="row status-1">
                    <div class="col-2">
                        <img src="{{asset('image/avatar1.png')}}" alt="avatar" class="avatar">
                    </div>
                    <div class="col-10">
                        <div class="row username"><a href="">Hồ Điệp</a></div>
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
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row status-1">
                    <div class="col-2">
                        <img src="{{asset('image/avatar2.png')}}" alt="avatar" class="avatar">
                    </div>
                    <div class="col-10">
                        <div class="row username"><a href="">Khả Hân</a></div>
                        <div class="row status">
                            <p>What is love ?</p>
                        </div>
                        <div class="multimedia">
                            <iframe width="250" height="200" src="https://www.youtube.com/embed/szu7Xf18cwA" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="interact">
                            <i class="fas fa-headphones-alt"></i><span> 753</span>
                        </div>
                    </div>
                </div>
                <hr>

            @endfor

            <div class="row status-2">
                <div class="col-2">
                    <img src="{{asset('image/avatar1.png')}}" alt="avatar" class="avatar">
                </div>
                <div class="col-10">
                    <div class="row username"><a href="">Hồ Điệp</a></div>
                    <div class="row status">
                        <p>Today I'll talk about my hometown life</p>
                    </div>
                    <div class="multimedia">
                        <iframe src="https://www.youtube.com/embed/m-M1AtrxztU" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="interact">
                        <i class="fas fa-headphones-alt"></i><span> 341</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
