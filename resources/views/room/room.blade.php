@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoom.css')}}">
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

function topicChoose(id)
{
    console.log(id);
    SweetAlert.close();
    document.getElementById('words').style.visibility = 'visible'
    document.getElementById('questions').style.visibility = 'visible'
}

function topicClicked()
{
    document.getElementById('words').style.visibility = 'hidden'
    document.getElementById('questions').style.visibility = 'hidden'
    let topics = ['PET', 'FAMILY', 'DREAM', 'JOB', 'HEALTH', 'SPORT']
    let imageNames = ["{{asset('images/icons/Thiết kế không tên.png')}}",
    "{{asset('images/icons/Thiết kế không tên (1).png')}}",
    "{{asset('images/icons/Thiết kế không tên (2).png')}}",
    "{{asset('images/icons/Thiết kế không tên (3).png')}}",
    "{{asset('images/icons/Thiết kế không tên (5).png')}}",
    "{{asset('images/icons/Thiết kế không tên (6).png')}}"]
    
    var htmlContent = '<div class="col-md-4" style="margin-left: -10px; margin-right: -10px">';

    for (let i = 0; i < topics.length; i += 2)
    {
        htmlContent += '<div class="row" style="margin-bottom: 10px; margin-top: 10px">'
                    + '<div class="col" onClick="topicChoose(' + i.toString() + ')"' + '>' 
                    + '<div class="topicName"><h2 style="font-family:\'UVNHaiBaTrung\'">' + topics[i] + '</h3></div>'
                    + '<img class="topicIcon" src="' + imageNames[i] + '"></div>'
                    + '<div class="col" onClick="topicChoose(' + (i + 1).toString() + ')"' + '>'
                    + '<div class="topicName"><h2 style="font-family:\'UVNHaiBaTrung\'">' + topics[i + 1] + '</h3></div>'
                    + '<img class="topicIcon" src="' + imageNames[i + 1] + '"></div></div>'
    }

    Swal.fire({
                showConfirmButton: false,
                html: '<h2 style="font-size: 25px; font-weight: bold">SOME TOPICS FOR YOU</h2>' + htmlContent
            })
}

</script>
@endsection


@section('content')
<div class="content">
    <div class='container-fluid text-center'>

        <br/>

        <div style = "display: flex; flex-direction: row; margin-left: 15px;">
        <div>
            <a onClick = "topicClicked()"> 
        <img style="width: 50px; height: 50px" 
                src="{{asset('images/icons/Asset 33@2x.png')}}" alt=""></a>
        </div>
        <div id="words" style="visibility: hidden; margin-left: 5px">
            <a href=""> 
            <img style="width: 48px; height: 48px;" 
                src="{{asset('images/icons/Group 71@2x.png')}}" alt=""></a>
        </div>
        <div id="questions" style="visibility: hidden; margin-left: 5px">
            <a href=""> 
            <img style="width: 48px; height: 48px;"
                src="{{asset('images/icons/Group 70@2x.png')}}" alt=""></a>
        </div>
        </div>

        <div class='row' id="media-div">

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
