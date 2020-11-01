@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">

        <div class='container' style="padding-bottom: 8%">

            <h2 class='text-center' style='padding-top: 8%'>Feed Upload</h2>

            <form action = '{{route('feeds.store')}}' method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Feeds Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        placeholder="Enter feed title" aria-describedby="helpId" required="required">
                </div>

                <script>
                    tinymce.init({
                    selector: 'textarea',
                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    toolbar_mode: 'floating',
                    });
                </script>
                <div class="form-group">
                    <label for="">What you want to tell?</label>
                    <textarea class="form-control" name='content' id="content" rows="15" cols="80" placeholder='Please tell us your story...'>
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">Upload your media</label>
                    <input type="file" onchange="PreviewImage();" class="form-control-file" name="media" id="media" placeholder="Choose a file to upload">
                </div>

                <div class="form-group mt-4">
                    <div class="row">
                        <img style='object-fit:contain; width: 100%; height: 100%;' id="reviewImage"class="avatar-profile" alt="">
                    </div>
                </div>

                <script type="text/javascript">
                    function PreviewImage() {
                        var fileReader = new FileReader();
                        fileReader.readAsDataURL(document.getElementById("media").files[0]);

                        fileReader.onload = function (fileEvent) {
                            document.getElementById("reviewImage").src = fileEvent.target.result;
                        };
                    };
                </script>

                <button type="submit" class="btn btn-primary btn-block">Done</button>
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
