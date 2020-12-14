@extends('layouts/appWithoutNavbar')



@section('styles')
	<link rel="stylesheet" href="{{asset('css/stylesProfile.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
    <script src='https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js'></script>
    <script src='https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js'></script>
    <script>
        const dataSource = {
            chart: {
            showvalues: "0",
            caption: "Individual Evaluation",
            subcaption: "(2020)",
            plottooltext: "Score of $seriesName in $label was <b>$dataValue</b>",
            showhovereffect: "1",
            yaxisname: "Band Score",
            showsum: "1",
            theme: "fusion",
            animationEnabled: true,
            },
            categories: [
                {
                    category: [
                        {
                            label: "Jan"
                        },
                        {
                            label: "Feb"
                        },
                        {
                            label: "Mar"
                        },
                        {
                            label: "Apr"
                        },
                        {
                            label: "May"
                        },
                        {
                            label: "Jun"
                        },
                        {
                            label: "Jul"
                        },
                        {
                            label: "Aug"
                        },
                        {
                            label: "Sep"
                        },
                        {
                            label: "Oct"
                        },
                        {
                            label: "Nov"
                        },
                        {
                            label: "Dec"
                        }
                    ]
                }
            ],
            dataset: [
                {
                    seriesname: "Fluency and coherence",
                    data: [
                        {
                            value: 4/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 5/4
                        },
                        {
                            value: 5.5/4
                        },
                        {
                            value: 6/4
                        },
                        {
                            value: 6.5/4
                        },
                        {
                            value: 7.5/4
                        },
                        {
                            value: 8/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 9/4
                        }
                    ]
                },
                {
                    seriesname: "Lexical resource",
                    data: [
                        {
                            value: 4/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 5/4
                        },
                        {
                            value: 5.5/4
                        },
                        {
                            value: 6/4
                        },
                        {
                            value: 6.5/4
                        },
                        {
                            value: 7.5/4
                        },
                        {
                            value: 8/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 9/4
                        }
                    ]
                },
                {
                    seriesname: "Grammatical range and accuracy",
                    data: [
                        {
                            value: 4/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 5/4
                        },
                        {
                            value: 5.5/4
                        },
                        {
                            value: 6/4
                        },
                        {
                            value: 6.5/4
                        },
                        {
                            value: 7.5/4
                        },
                        {
                            value: 8/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 9/4
                        }
                    ]
                },
                {
                    seriesname: "Pronunciation",
                    data: [
                        {
                            value: 4/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 4.5/4
                        },
                        {
                            value: 5/4
                        },
                        {
                            value: 5.5/4
                        },
                        {
                            value: 6/4
                        },
                        {
                            value: 6.5/4
                        },
                        {
                            value: 7.5/4
                        },
                        {
                            value: 8/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 8.5/4
                        },
                        {
                            value: 9/4
                        }
                    ]
                },
                {
                    seriesname: "Speaking Score",
                    plottooltext: "Total Speaking Score in $label was <b>$dataValue</b>",
                    renderas: "Line",
                    data: [
                        {
                            value: "4.0"
                        },
                        {
                            value: "4.5"
                        },
                        {
                            value: "4.5"
                        },
                        {
                            value: "5.0"
                        },
                        {
                            value: "5.5"
                        },
                        {
                            value: "6.0"
                        },
                        {
                            value: "6.5"
                        },
                        {
                            value: "7.5"
                        },
                        {
                            value: "8.0"
                        },
                        {
                            value: "8.5"
                        },
                        {
                            value: "8.5"
                        },
                        {
                            value: "9"
                        }
                    ]
                }
            ]
        };

        FusionCharts.ready(function() {
        var myChart = new FusionCharts({
            type: "stackedcolumn2dline",
            renderAt: "chart-container",
            width: "100%",
            height: "100%",
            dataFormat: "json",
            dataSource
            }).render();
        });
    </script>
@endsection



@section('content')

	<div class="content">
        <div class="container">

            <div class="row">
                <div class="col-6 info">
                    <h2 style='margin-top:50px'>{{$profile->user->name}}</h2>
                    <div class="row">
                        <img src="{{asset('image/location.png')}}" class="age" alt="">
                        <span class="detail">
                            @if(!$profile->home)
                                Not Available
                            @else
                                {{$profile->home}}
                            @endif
                        </span>
                    </div>
                    <div class="row">

                        <span class="detail">
                            @if(!$profile->dob)
                                Not Available
                            @else
                                {{$profile->dob}}
                            @endif
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <a href='{{ route('profile.edit', $profile)}}' class="btn btnEdit">Edit</a>
                        </div>
                        <div class="col-4">
                            <a class="btn btnEdit" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row d-flex justify-content-center"> <img style='border-radius:50%' src="{{$profile->profile_image}}" class="avatar-profile" alt=""></div>
                </div>
            </div>
            <div class="row descrip">
                <span>
                    {!!$profile->intro!!}
                </span>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">
                    <span class="amount-follower">31</span> Follower
                </div>

                <div class="col-5">
                    <span class="amount-following">125</span> Following
                </div>
            </div>

            <hr>
            <div class="row descrip">
                <input type="button" class="button" value="Update New Audio">
            </div>
            <div class="row learn">
            <div class="grid_type">
                <div class="row score">
                    <img src="{{asset('image/score.png')}}" id="score" alt="">
                    <span class="score-detail">IELTS Band Scores: </span>
                    <span class="current-score">{{$profile->band_score}}</span>
                </div>

                <div class="row score1">
                    <img src="{{asset('image/playaudio.png')}}" id="score1" alt="">
                    <span class="score-detail"> My Audio: </span>

                </div>
                <div class="displayvideo">
                    <iframe width="180" height="220" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                    <iframe width="180" height="220" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>

                <div class="row score1">
                    <img src="{{asset('image/birthday.png')}}" id="score1" alt="">
                    <span class="score-detail"> Birthday: </span>
                     <span class="current-score">{{$profile->dob}}</span>   <!--profile-> đi qua đâu? -->
                </div>

                <div class="row score1">
                    <img src="{{asset('image/like.png')}}" id="score1" alt="">
                    <span class="score-detail"> Liked: </span>
                    <span class="current-score">{{$profile->band_score}}</span>   <!--profile-> đi qua đâu? -->
                </div>
        </div>
        <div class="row score1">
                    <span class="score-detail"> About me </span>
        </div>
        <div class="textne">
            <p> I am interested in talking about American TV series , books , travel , daily life events and street food.</p>
            <p>Wants to practice languages with: patient since I am still learning. Has interest in teaching the languages. </p>
         </div>
                <div class="row evalution">
                    <div id="chart-container"></div>
                </div>
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

    </div>

    <div class="backgroundBar"></div>
    </div>

@endsection



@section('scripts')

@endsection
