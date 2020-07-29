@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection


@section('content')
<div class='content'>
    <div class="container">

        <div class='row'>

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 '>
                <div class="card">
                    <div class="card-header">
                        <h3>Create new room</h3>
                    </div>
                    <div class="card-body">
                        <form action = '{{route('room.create')}}' method='post'>
                                @csrf
                                <div class="form-group">
                                    <label for="room">Room Name</label>
                                    <input type="text" name="room" id="room" class="form-control" placeholder="Enter room name" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Create a new room</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Go!</button>
                            </form>
                    </div>
                </div>
            </div>


            @if($rooms)

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class="card">
                    <div class="card-header">
                        <h3>List of Rooms</h3>
                    </div>
                    <div class="card-body">
                            <table class='display' id='tableID'>
                                <thead class='thead-dark'>
                                    <tr align="center">
                                        <th>ID</th>
                                        <th>Room</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Action</>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1001;
                                    @endphp
                                    @foreach ($rooms as $room)
                                    <tr align="center">
                                        <td>{{$i}}</td>
                                        <td><b>{{$room->uniqueName}}</b></td>
                                        <td>{{$room->type}}</td>
                                        <td><b style='color:green'>{{$room->status}}</b></td>
                                        <td>{{ \Carbon\Carbon::parse($room->dateCreated) }}</td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary btn-block" href="{{ route('room.join', $room->uniqueName) }}" role="button">Join</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            @endif

        </div>

    </div>
</div>


@endsection



@section('scripts')
    $('#tableID').DataTable();
@endsection
