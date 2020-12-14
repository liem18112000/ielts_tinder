@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">

        <div class='container' style="padding-bottom: 15vh">

            <h2 class='text-center' style='padding-top: 8%'>Feed Upload</h2>

            <form action = '{{route('feeds.update-content', $feed)}}' method='post'>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Feeds Title</label>
                    <input type="text" name="title" id="title" class="form-control" value='{{ $feed->decrypt($feed->title) }}'
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
                        {!!$feed->decrypt($feed->content)!!}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Done</button>

                <a name="" id="" class="btn btn-secondary btn-block" style='color:white' href="{{route('feeds.index')}}" role="button">Back</a>
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
