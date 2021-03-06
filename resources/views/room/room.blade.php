@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoom.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
    <style>

        img{
            bottom: 0!important;
        }
        .bottom-img{
            width: 40px;
            height:40px;
            border-radius:50%;
            bottom:0!important;
            object-fit: scale-down;
        }

        .bottom-btn{
            width: 60px;
            height:60px;
            border-radius:50%;
            background-color:white;
            padding: 5px;
            border: 2px solid green;
        }
    </style>
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
            // "&nbsp <button id='" + participant.identity + "sound' class='btn btn-primary'>Mute</button>" +
            // "&nbsp <button id='" + participant.identity + "video' class='btn btn-success'>On</button>" +
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

    room.on('participantDisconnected', function (participant) {
        console.log("Disconnected: '" + participant.identity + "'");
        participantDisconnected(participant);
    });
});

function startTimer(duration, display)
{
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.innerText = minutes + ":" + seconds;

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
    let imageNames = [
        "{{asset('images/icons/Thiết kế không tên.png')}}",
        "{{asset('images/icons/Thiết kế không tên (1).png')}}",
        "{{asset('images/icons/Thiết kế không tên (2).png')}}",
        "{{asset('images/icons/Thiết kế không tên (3).png')}}",
        "{{asset('images/icons/Thiết kế không tên (5).png')}}",
        "{{asset('images/icons/Thiết kế không tên (6).png')}}"
    ];

    var htmlContent = '<div style="margin-left: -10px; margin-right: -10px">';

    htmlContent += '<div class="row" style="margin:0;">';

    for (let i = 0; i < topics.length; i += 2)
    {
        htmlContent += '<div class="col-lg-4 col-md-4 col-6 mb-4" onClick="topicChoose(' + i.toString() + ')"' + '>'
                    + '<div class="topicName"><h2 style="font-family:\'UVNHaiBaTrung\'">' + topics[i] + '</h3></div>'
                    + '<img class="topicIcon" src="' + imageNames[i] + '"></div>'
                    + '<div class="col-lg-4 col-md-4 col-6 mb-4" onClick="topicChoose(' + (i + 1).toString() + ')"' + '>'
                    + '<div class="topicName"><h2 style="font-family:\'UVNHaiBaTrung\'">' + topics[i + 1] + '</h3></div>'
                    + '<img class="topicIcon" src="' + imageNames[i + 1] + '"></div>'
    }

    htmlContent += "</div>";

    Swal.fire({
        showConfirmButton: false,
        html: '<h2 style="font-size: 25px; font-weight: bold">SOME TOPICS FOR YOU</h2>' + htmlContent
    })
}

</script>
@endsection


@section('content')
<div class="content" style='background-color:black'>
    <div class='container-fluid text-center'>

        <br/>

        <div style = "display: flex; flex-direction: row; margin-left: 15px;">
            <div>
                <a onClick = "topicClicked()">
            <img style="width: 50px; height: 50px;"
                    src="{{asset('images/icons/Asset 33@2x.png')}}" alt=""></a>
            </div>
            <div id="words" style="visibility: hidden; margin-left: 5px">
                <a href="javascript:void(0)">
                <img style="width: 48px; height: 48px;"
                    src="{{asset('images/icons/Group 71@2x.png')}}" alt=""></a>
            </div>
            <div id="questions" style="visibility: hidden; margin-left: 5px">
                <a href="javascript:void(0)">
                <img style="width: 48px; height: 48px;"
                    src="{{asset('images/icons/Group 70@2x.png')}}" alt=""></a>
            </div>

            <div style='margin-left:auto'>
                <a class="btn btn-outline-light" style='width: 60px; border-radius:20px; font-size:1.5em; background:white; color:black; font-family:"UVNHaiBaTrung"; font-weight:bold; text-decoration:none'
                 href='javascript:void(0)' id="time"></a>
            </div>
            <script type="text/javascript">
                display = document.querySelector('#time');
                startTimer({{$remainingTime}}, display);
            </script>

        </div>

        <div class='row' id="media-div">

        </div>

        <div class='row mt-1'>

            <div class='col-4'>
                <a href='javascript:void(0)' style='margin:auto;' id='sound'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin-left:auto;'>
                            <img src='{{ asset('images/icons/Asset 32@2x.png')}}' id='imgSound' class='bottom-img'/>
                        </div>
                    </div>
                    Unmute
                </a>
            </div>

            <div class='col-4'>
                <a href='{{route('room.end', $room)}}' style='margin:auto;'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin:auto;'>
                            <img src='{{ asset('images/icons/phone-call-end@2x.png')}}' class='bottom-img'>
                        </div>
                    </div>
                </a>
            </div>

            <div class='col-4'>
                <a href='javascript:void(0)' style='margin:auto;' id='video'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin-right:auto;'>
                            <img src='{{ asset('images/icons/Asset 4@2x.png')}}' id='imgVideo' class='bottom-img' />
                        </div>
                    </div>
                    On
                </a>
            </div>

        </div>
    </div>
</div>


@endsection



@section('scripts')

document.getElementById('sound').addEventListener("click", function () {
    if (document.getElementById('sound').innerText == 'Unmute') {
        localParticipant.audioTracks.forEach(function (audioTrack) {
            console.log('+++++ audioTrack ' + localParticipant.identity + ' Disable :  ' + audioTrack + ' +++++');
            audioTrack.disable();
        });
        document.getElementById('sound').innerHTML =  "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-left:auto;'>" +
                           "<img src='{{ asset('images/icons/Asset 7@2x.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>" +
                    "Mute";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Media Player is currently muted',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        localParticipant.audioTracks.forEach(function (audioTrack) {
            console.log('+++++ audioTrack ' + localParticipant.identity + ' Enable ' + audioTrack + ' +++++');
            audioTrack.enable();
        });
        document.getElementById('sound').innerHTML = "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-left:auto;'>" +
                           "<img src='{{ asset('images/icons/Asset 32@2x.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>" +
                    "Unmute";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Media Player is currently unmuted',
            showConfirmButton: false,
            timer: 3000
        });
    }
});

document.getElementById('video').addEventListener("click", function () {
    if (document.getElementById('video').innerText == 'On') {
        localParticipant.videoTracks.forEach(function (videoTrack) {
            console.log('+++++ videoTrack ' + localParticipant.identity + ' Disable :  ' + videoTrack + ' +++++');
            videoTrack.disable();
        });
        document.getElementById('video').innerHTML = "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-right:auto;'>" +
                           "<img src='{{ asset('images/icons/Asset 6@2x.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>" +
                    "Off";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Camera is currently off',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        localParticipant.videoTracks.forEach(function (videoTrack) {
            console.log('+++++ videoTrack ' + localParticipant.identity + ' Enable ' + videoTrack + ' +++++');
            videoTrack.enable();
        });
        document.getElementById('video').innerHTML = "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-right:auto;'>" +
                           "<img src='{{ asset('images/icons/Asset 4@2x.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>" +
                    "On";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Camera is currently on',
            showConfirmButton: false,
            timer: 1500
        });
    }
});

@endsection
