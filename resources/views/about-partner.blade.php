@extends('layouts/appWithoutNavbar')

@section('styles')
<link rel="stylesheet" href="{{asset('css/stylesAboutPartner.css')}}">
@endsection

@section('content')
<div class="content">
    <form action="#" method="post">
        @csrf
        @method('POST')
        <h3>About your partner</h3>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female ">Female</label>
        <input type="number" class="Input " placeholder="Age">
        <input type="text" class="Input " placeholder="Hometown">
        <input type="text" class="Input " placeholder="Practime">
        <input type="text" class="Input " placeholder="Estimate speaking band score">
        <div class="mt-3 mx-auto" style="width: 200px;">
            <a href="#" id="linkBtn3"><button type="button" class="btn btn-lg btnLink" onclick="SignIn()">Done </button></a>
        </div>
    </form>
</div>
@endsection
