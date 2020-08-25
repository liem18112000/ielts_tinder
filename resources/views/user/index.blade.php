@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection


@section('content')
<div class='content'>
    <div class="container">

        <br/><br/>
        <h3>User Management</h3>

        <table class="table table-hover table-inverse table-responsive" style='height: 70vh; overflow-y: scroll;'>
            <thead class="thead-dark">
                <tr align='center'>
                    <th class='desktop-view'>ID</th>
                    <th>Name</th>
                    <th class='desktop-view'>Email</th>
                    <th class='desktop-view'>OAuth</th>
                    <th>Status</th>
                    <th>Last seen</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @for($i = 0; $i < 10; $i++) --}}
                    @foreach($users['online'] as $user)
                    <tr align='center'>
                        <td scope="row" class='desktop-view'>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td class='desktop-view'>
                            @if(!$user->email)
                                Not Available
                            @else
                                {{$user->email}}
                            @endif
                        </td>
                        <td class='desktop-view'>
                            @if(!$user->provider)
                                System
                            @else
                                {{$user->provider}}
                            @endif
                        </td>
                        <td><b style='color:green'>Online</b></td>
                        <td>{{\Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</td>
                    </tr>
                    @endforeach

                    @foreach($users['offline'] as $user)
                    <tr align="center">
                        <td scope="row" class='desktop-view'>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td class='desktop-view'>
                            @if(!$user->email)
                                Not Available
                            @else
                                {{$user->email}}
                            @endif
                        </td>
                        <td class='desktop-view'>
                            @if(!$user->provider)
                                System
                            @else
                                {{$user->provider}}
                            @endif
                        </td>
                        <td><b style='color:red'>Offline</b></td>
                        <td>{{\Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    {{-- @endfor --}}
                </tbody>
        </table>
    </div>

    <div class="icon">
        <div class="row align-items-center">
            <div class="col">
                <a href="{{route('feeds.index')}}"> <img id="iconNewsfeed" src="{{asset('image/iconNewsfeed.png')}}" alt=""></a>
            </div>
            <div class="col">
                <a href="{{route('search')}}"> <img id="iconSearch" src="{{asset('image/icon_search.png')}}" alt=""></a>
            </div>
            <div class="col">
                <div class="backgroundRound">
                    <a href="{{route('room.index')}}"> <img class="icon_Room" src="{{asset('image/iconRoom.png')}}"></a>
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

