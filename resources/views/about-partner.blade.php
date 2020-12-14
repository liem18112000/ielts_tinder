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
        <div class="form-group">
            <label for="">Partner's Gender</label>
            <select class="form-control" name="gender" id="" style='background:none; border: black 0 0 2px 0; color:white'>
                <option style='color:black' value='male'>Male</option>
                <option style='color:black' value='female'>Female</option>
                <option style='color:black' value='other'>Other</option>
            </select>
        </div>
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
