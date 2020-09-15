@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection


@section('content')
<div class='content'>
    <div class="container">

        <div class='row'>

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 mt-4'>

                <h3>Create new room</h3>

                <form action = '{{route('room.create')}}' method='post'>
                    @csrf
                    <div class="form-group">
                        <label for="room">Room Name</label>
                        <input type="text" name="room" id="room" class="form-control" value="{{$newRoomName}}"
                            placeholder="Enter room name" aria-describedby="helpId" required="required">
                        <small id="helpId" class="text-muted">You can change room name if you want</small>
                    </div>
                    <div class="form-group">
                        <label for="">Room Type</label>
                        <select class="form-control" name="type" id="type" aria-describedby="helpId2">
                            <option value='peer-to-peer'>Recommended : Private room with 2 users</option>
                            <option value='group-small'>Small room with 4 users </option>
                            <option value='group'> Regular room with 50 users or more </option>
                        </select>
                        <small id="helpId2" class="text-muted">Choose room type</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Go!</button>
                </form>

            </div>


            @if($rooms)

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

                <h3>List of Rooms</h3>

                <table class="table table-striped table-inverse table-responsive" >
                    <thead class="thead-inverse" >
                        <tr style="text-align:center">
                            <th style="width: 50%;">Name</th>
                            <th style="width: 50%;">Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr style="text-align:center">
                                <td scope="row">{{$room->uniqueName }}</td>
                                <td>
                                    @if($room->type == 'peer-to-peer')
                                        Private
                                    @elseif($room->type == 'group-small')
                                        Small
                                    @else
                                        Regular
                                    @endif
                                </td>
                                <td style='padding: 4px;'>
                                    <a class="btn btn-primary btn-block" style="margin: 0" href="{{route('room.join', $room->uniqueName)}}" role="button">Join</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>

            @endif
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

<div class="backgroundBar"></div>
</div>


@endsection