@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection



@section('head')
{{-- <script src="http://media.twiliocdn.com/sdk/js/video/releases/1.20.1/twilio-video.min.js"></script> --}}

<script src="http://media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>

<script>
function trackAdded(div, track) {
    div.appendChild(track.attach());
    var video = div.getElementsByTagName("video")[0];
    if (video) {
        video.setAttribute("style", "width: 100%;");
    }
}
function trackRemoved(track) {
    track.detach().forEach(function (element) { element.remove() });
}
function participantConnected(participant) {
    console.log('Participant "%s" connected', participant.identity);
    const div = document.createElement('div');
    div.id = participant.sid;
    div.classList.add("col-lg-6", 'col-md-6', 'col-sm-12');
    content = "<div class='card-header' style='display:flex; justify-content: space-around; ;clear:both; padding:6px'>";
    if (participant.identity == '{{$identity}}') {
        localParticipant = participant;
        content += "<button class='btn btn-dark btn-block'> You </button>" +
            "&nbsp <button id='" + participant.identity + "sound' class='btn btn-primary'>Mute</button>" +
            "&nbsp <button id='" + participant.identity + "video' class='btn btn-success'>On</button>"
        "</div>";
    } else {
        content += "<button class='btn btn-dark btn-block'> Partner : " + participant.identity + " </button>" + "</div>";
    }
    div.innerHTML = content;
    participant.tracks.forEach(function (track) {
        trackAdded(div, track)
    });
    participant.on('trackAdded', function (track) {
        trackAdded(div, track)
    });
    participant.on('trackRemoved', trackRemoved);
    document.getElementById('media-div').appendChild(div);
}
function participantDisconnected(participant) {
    console.log('Participant "%s" disconnected', participant.identity);
    participant.tracks.forEach(trackRemoved);
    document.getElementById(participant.sid).remove();
}
var localParticipant = null;
Twilio.Video.createLocalTracks({
    audio: true,
    video: { width: 800 }
}).then(function (localTracks) {
    return Twilio.Video.connect('{{ $accessToken }}', {
        name: '{{ $room }}',
        tracks: localTracks,
        video: { width: 800 }
    });
}).then(function (room) {
    console.log('Successfully joined a Room: ', room.name);
    room.participants.forEach(participantConnected);
    var previewContainer = document.getElementById(room.localParticipant.sid);
    if (!previewContainer || !previewContainer.querySelector('video')) {
        participantConnected(room.localParticipant);
    }
    room.on('participantConnected', function (participant) {
        console.log("Joining: '" + participant.identity + "'");
        participantConnected(participant);
    });
    document.getElementById(localParticipant.identity + 'video').addEventListener("click", function () {
        if (document.getElementById(localParticipant.identity + 'video').innerText == 'On') {
            localParticipant.videoTracks.forEach(function (videoTrack) {
                console.log('+++++ videoTrack ' + localParticipant.identity + ' Disable :  ' + videoTrack + ' +++++');
                videoTrack.disable();
            });
            document.getElementById(localParticipant.identity + 'video').innerText = "Off";
        } else {
            localParticipant.videoTracks.forEach(function (videoTrack) {
                console.log('+++++ videoTrack ' + localParticipant.identity + ' Enable ' + videoTrack + ' +++++');
                videoTrack.enable();
            });
            document.getElementById(localParticipant.identity + 'video').innerText = "On";
        }
    });
    document.getElementById(localParticipant.identity + 'sound').addEventListener("click", function () {
        if (document.getElementById(localParticipant.identity + 'sound').innerText == 'Mute') {
            localParticipant.audioTracks.forEach(function (audioTrack) {
                console.log('+++++ audioTrack ' + localParticipant.identity + ' Disable :  ' + audioTrack + ' +++++');
                audioTrack.disable();
            });
            document.getElementById(localParticipant.identity + 'sound').innerText = "Unmute";
        } else {
            localParticipant.audioTracks.forEach(function (audioTrack) {
                console.log('+++++ audioTrack ' + localParticipant.identity + ' Enable ' + audioTrack + ' +++++');
                audioTrack.enable();
            });
            document.getElementById(localParticipant.identity + 'sound').innerText = "Mute";
        }
    });
    room.on('participantDisconnected', function (participant) {
        console.log("Disconnected: '" + participant.identity + "'");
        participantDisconnected(participant);
    });
});

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.innerHTML = '<i class="fa fa-clock-o" aria-hidden="true"> Clock ' + minutes + ":" + seconds +' </i>';

        if (--timer < 0) {
            timer = duration;
            window.location.href = "{{ route('room.end', $room) }}";
            clearInterval(interval);
        }
    }, 1000);
}

</script>
@endsection


@section('content')
<div class="content">
    <div class='container-fluid text-center'>

        <br/>

        <h3>{{$room}}</h3>




        <div class='row' id="media-div">

        </div>

        <div class='topic row'>
            <div class='col-12'>
                <a class="btn btn-info btn-block"
                style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;"
                role="button"> <i class="fa fa-eye" aria-hidden="true"
                onclick="
                    Swal.fire(
                        'Here your topic!',
                        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                    )
                ">
                    View topic</i></a>
            </div>
        </div>

        <div class='row mt-1'>
            <div class='col-6'>
                <a class="btn btn-outline-dark btn-block"
                 href='javascript:void(0)' id="time"></a>
            </div>
            <script type="text/javascript">
                display = document.querySelector('#time');
                startTimer({{$remainingTime}}, display);
            </script>
            <div class='col-6'>
                <a name="" id="" class="btn btn-outline-danger btn-block"
                href='{{route('room.end', $room)}}'
                role="button"> Close Room</a>
            </div>
        </div>

    </div>
</div>

{{-- <div class="icon">
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
</div> --}}

{{-- <div class="backgroundBar"></div>
</div> --}}


@endsection
