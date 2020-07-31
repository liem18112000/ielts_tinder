@extends('layouts.app')


@section('content')
<div class='content'>
    <div class="container">
        <h3>Media Downloads</h3>

        <table class='display' id='tableID'>
            <thead class='thead-dark'>
                <tr align="center">
                    <th>ID</th>
                    <th>RoomSid</th>
                    <th>Links</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr align="center">
                        <td scope="row">{{$record->RecordingSid}}</td>
                        <td>
                            {{$record->RoomSid}}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-block" href="{{$mediaLocation[$record->RecordingSid]}}" role="button">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>

    {{-- <div class="icon">
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
    </div> --}}

</div>

{{-- <div class="backgroundBar"></div>
</div> --}}

@endsection

@section('scripts')
    $('#tableID').DataTable();
@endsection
