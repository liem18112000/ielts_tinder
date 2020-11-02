@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">

        <div class='container' style="padding-bottom: 8%">

            <h2 class='text-center' style='padding-top: 8%'>Edit Profile</h2>

            <form action = '{{route('profile.update', $profile)}}' method='post' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value='{{ $profile->name }}'
                        placeholder="Enter your name" aria-describedby="helpId" required="required">
                </div>
                <div class="form-group">
                    <label for="home">Hometown</label>
                    <input type="text" name="home" id="home" class="form-control" value='{{ $profile->home }}'
                        placeholder="Enter your hometown" aria-describedby="helpId" required="required">
                </div>
                <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" name="dob" id="dob" class="form-control" value='{{ $profile->dob }}'
                        placeholder="Enter your date of birth" aria-describedby="helpId" required="required">
                </div>
                <div class="form-group">
                    <label for="profile_image">Profile image</label>
                    <input type="file" class="form-control-file" name="profile_image" id="image"
                        onchange="PreviewImage();" placeholder="Choose a file to upload">
                </div>
                <div style="margin-left: auto; margin-right: auto; display: block" class="col-6">
                    <div class="row"> <img id="reviewImage" style='border-radius:50%; width: 100%;'
                    src="{{$profile->profile_image}}" class="avatar-profile" alt=""></div>
                </div>
                <script type="text/javascript">
                    function PreviewImage() {
                        var fileReader = new FileReader();
                        fileReader.readAsDataURL(document.getElementById("image").files[0]);

                        fileReader.onload = function (fileEvent) {
                            document.getElementById("reviewImage").src = fileEvent.target.result;
                        };
                    };
                </script>
                <div class="form-group">
                    <label for="band_score">Bandscore</label>
                    <input type="number" name="band_score" id="band_score" class="form-control" value='{{ $profile->band_score }}'
                        placeholder="Enter your bandscore" min="0.0" max="9.0" step="0.5" aria-describedby="helpId" required="required">
                </div>
                <div class="form-group">
                    <label for="achieve_time">Achieve time</label>
                    <input type="number" name="achieve_time" id="achieve_time" class="form-control" value='{{ $profile->achieve_time }}'
                        placeholder="Enter your achieve time" aria-describedby="helpId" required="required">
                </div>
                <div class="form-group">
                    <label for="">Tell about yourself</label>
                    <textarea class="form-control" name='intro' id="intro" placeholder='Tell about yourself'>{!!$profile->intro!!}
                    </textarea>
                </div>

                <button style="margin-bottom: 70px;"  type="submit" class="btn btn-primary btn-block">Done</button>
            </form>

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
