@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesAboutYourself.css')}}">
@endsection



@section('content')
<div class="anh"><img src="{{asset('image/profile.png')}}" alt=""></div>
<div class="content">
    <form>
        <input type="text" class="Input" placeholder="Full name">
        <input type="radio" id="male" name="gender" value="male">
        <label for="male" >Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female ">Female</label>
        <input type="text" class="Input " placeholder="Birthday">
        <input type="text" class="Input " placeholder="Hometown">
        <input type="text" class="Input " placeholder="Your native languages">
        <input type="text" class="Input " placeholder="IELTS Target">
        <input type="text" class="Input " placeholder="Estimate speaking band score">
        <input type="text" class="Input Practime" placeholder="Practime">
        <div class="mt-3 mx-auto" style="width: 200px;">
            <a href="{{route('about-partner')}}" id="linkBtn5"><button type="button" class="btn btn-lg btnLink" onclick="AboutPartner()">Next</button></a>
        </div>
    </form>
</div>

@endsection
